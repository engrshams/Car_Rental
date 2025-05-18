<?php
namespace App\Http\Controllers;
use App\Models\Car;
use Inertia\Inertia;
use App\Models\Rental;
use Illuminate\Http\Request;
use App\Mail\RentalConfirmationMail;
use App\Mail\RentalNotificationAdminMail;
use Illuminate\Support\Facades\Mail;
use App\Models\User; // For admin lookup
use Carbon\Carbon;  // Make sure Carbon is imported
use Illuminate\Support\Facades\Log;  // Import Log facade

class CarController extends Controller{
    public function index(){//
    }

    public function create(){//
    }

    public function store(Request $request){//
    }

    // Show car details page
    public function show(string $id){
        $car = Car::findOrFail($id);
        return Inertia::render('Cars/CarDetailsPage', [
            'car' => $car,
        ]);
    }

    // Handle the booking
    public function bookCar(Request $request, $id){
        // Validate the dates
        $validated = $request->validate([
            'start_date' => 'required|date',
            //'end_date' => 'required|date|after:start_date',
            'end_date' => 'required|date|after_or_equal:start_date', // Allow same day booking
        ]);

        // Find the car
        $car = Car::findOrFail($id);

        // Check if there's any existing booking for the selected dates
        $existingBooking = Rental::where('car_id', $id)
            ->where('status', '!=', 'Cancelled')
            ->where(function ($query) use ($validated) {
                $query->where(function ($q) use ($validated) {
                    $q->where('start_date', '<=', $validated['end_date'])
                    ->where('end_date', '>=', $validated['start_date']);
                });
            })
            ->exists();

        // If a booking already exists, show an error message
        if ($existingBooking) {
            return back()->withErrors(['message' => 'Sorry! The car is not available for the selected dates.']);
        }

        // auth()->user() থেকে Customer রেকর্ড নিয়ে আসুন
        $customer = auth()->user()->customer;
        if (!$customer) {
            return back()->withErrors(['message' => 'Customer profile not found for the user.']);
        }

        // If no existing booking, create a new rental record
        try {
            $rental = new Rental();
            $rental->customer_id = $customer->id;  // এখানে অবশ্যই Customer id দিতে হবে
            $rental->car_id = $car->id;
            $rental->start_date = $validated['start_date'];
            $rental->end_date = $validated['end_date'];
            $rental->total_cost = $this->calculateTotalCost($car, $validated['start_date'], $validated['end_date']);
            $rental->status = 'Booked'; // Set status to Booked
            $rental->save();

            $rental->load('customer.user', 'car');  // eager load relations

            // Send email to customer if email exists
            if (!empty($rental->customer->user->email)) {
                Mail::to($rental->customer->user->email)->send(new RentalConfirmationMail($rental));
            } else {
                Log::warning('Rental customer user has no email: Rental ID ' . $rental->id);
            }

            // Send email to admins
            $admins = User::where('role', 'admin')->get();
            foreach ($admins as $admin) {
                if (!empty($admin->email)) {
                    Mail::to($admin->email)->send(new RentalNotificationAdminMail($rental));
                } else {
                    Log::warning('Admin user with no email: User ID ' . $admin->id);
                }
            }

            // Return success response
            // return redirect()->route('car.show', ['car' => $id])->with('message', 'Booking successful!');
            // session()->flash('message', 'Booking successful!');
            //return Inertia::location(route('car.show', ['car' => $id]));
            session()->flash('message', 'Booking successful!');
            return redirect()->route('car.show', ['car' => $id]);

        } catch (\Exception $e) {
            // Log the error and show an error message if the rental creation fails
            Log::error('Booking failed: ' . $e->getMessage());
            return back()->withErrors(['message' => 'An error occurred while processing your booking.']);
        }
    }

    // Calculate total cost for the rental (example)
    private function calculateTotalCost(Car $car, $startDate, $endDate){
        // Parse start and end dates
        $start = Carbon::parse($startDate);
        $end = Carbon::parse($endDate);

        // Ensure that start date is earlier than end date
        if ($start->gt($end)) {
            throw new \Exception("Start date cannot be greater than end date.");
        }

        // Calculate the number of days between start and end dates (inclusive)
        $days = $start->diffInDays($end) + 1; // Add 1 to include the end date

        // Ensure the result is non-negative
        if ($days <= 0) {
            throw new \Exception("Invalid date range.");
        }

        // Calculate and return the total cost
        return $days * $car->daily_rent_price;
    }


    
    public function edit(string $id){//
    }

    public function update(Request $request, string $id){//
    }

    public function destroy(string $id){//
    }
}

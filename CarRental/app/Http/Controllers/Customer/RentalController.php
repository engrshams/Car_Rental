<?php
namespace App\Http\Controllers\Customer;
use App\Models\Car;
use Inertia\Inertia;
use App\Models\Rental;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class RentalController extends Controller{
    public function index(){
        $user = Auth::user();
        // Ensure customer relationship exists
        if (!$user->customer) {
            return Inertia::render('Customer/RentalList', [
                'rentals' => [],
                'message' => 'No rental data available.'
            ]);
        }
        // Get rentals for this customer
        $rentals = Auth::user()->customer->rentals()->with('car')->whereNotIn('status', ['Cancelled', 'Completed'])->latest()->get();
        // dd($rentals);
        return Inertia::render('Customer/RentalList', [
            'rentals' => $rentals
        ]);
    }

    public function show(string $id){
        $rental = Rental::with(['car', 'customer.user'])->findOrFail($id);
    
        return Inertia::render('Customer/RentalDetails', [
            'rental' => $rental,
        ]);
    }
    
    public function history(){
        $user = Auth::user();
        // Ensure customer relationship exists
        if (!$user->customer) {
            return Inertia::render('Customer/RentalHistory', [
                'rentals' => [],
                'message' => 'No rental data available.'
            ]);
        }
        // Get rentals for this customer
        $rentals = Auth::user()->customer->rentals()->with('car')->whereIn('status', ['Cancelled', 'Completed'])->latest()->get();
        // dd($rentals);
        return Inertia::render('Customer/RentalHistory', [
            'rentals' => $rentals
        ]);
    }

    public function search(Request $request){
        $query = Car::query();
    

        // Filter by car_type if provided
        if ($request->filled('car_type')) {
            $query->where('car_type', $request->input('car_type'));
        }
    
        // Filter by brand if provided
        if ($request->filled('brand')) {
            $query->where('brand', $request->input('brand'));
        }
    
        // Filter by max daily rent price if provided
        if ($request->filled('max_price')) {
            $query->where('daily_rent_price', '<=', $request->input('max_price'));
        }
    
        $cars = $query->get();
    
        // Fetch distinct car types for dropdown
        $car_types = Car::select('car_type')->distinct()->pluck('car_type');

        // Fetch distinct brands filtered by selected car_type if given, else all brands
        if ($request->filled('car_type')) {
            $brands = Car::where('car_type', $request->input('car_type'))
                        ->select('brand')
                        ->distinct()
                        ->pluck('brand');
        } else {
            $brands = Car::select('brand')->distinct()->pluck('brand');
        }
    
        return Inertia::render('Home/Rental', [
            'cars' => $cars,
            'filterOptions' => [
                'car_type' => $car_types,
                'brands' => $brands,
            ],
            'filters' => $request->only(['car_type', 'brand', 'max_price']),
        ])->withViewData('title', 'Car Rental');
    }
    

    public function cancel($id){
        $rental = Rental::where('id', $id)
            ->whereHas('customer', function ($query) {
                $query->where('user_id', Auth::id());
            })->firstOrFail();
        if (in_array($rental->status, ['Completed', 'Cancelled'])) {
            return back()->withErrors(['Rental already completed or cancelled.']);
        }
        $rental->status = 'Cancelled';
        $rental->save();
        return back()->with('success', 'Rental cancelled successfully.');
    }
}

<?php
namespace App\Http\Controllers;
use App\Models\Car;
use Inertia\Inertia;
use App\Models\Rental;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminRentalController extends Controller{

    public function index(){
        $rentals = Rental::all()->load('car', 'customer');
        return Inertia::render('Rentals/RentalList', [
            'rentals' => $rentals,
        ]);
    }
    public function create(){//
    }

    public function store(Request $request){//
    }
    public function show(string $id){
        $rental = Rental::with(['car', 'customer.user'])->findOrFail($id);
    
        return Inertia::render('Rentals/RentalDetails', [
            'rental' => $rental,
        ]);
    }
    public function edit(string $id){
        $cars = Car::all();
        $customers = Customer::all();
        $rental = Rental::with(['car', 'customer'])->findOrFail($id); // eager load

            // Format dates for input[type=date]
        $rental->start_date = $rental->start_date->format('Y-m-d');
        $rental->end_date = $rental->end_date->format('Y-m-d');
        
        return Inertia::render('Rentals/EditRental', [
            'cars' => $cars,
            'customers' => $customers,
            'rental' => $rental,
        ]);
    }

    public function update(Request $request, string $id){
        try {
            $request->validate([
                'customer_id' => 'required|exists:customers,id',
                'car_id' => 'required|exists:cars,id',
                'start_date' => 'required|date',
                'end_date' => 'required|date',
                'total_cost' => 'required|numeric',
                'status' => 'required|string|in:Booked,Ongoing,Completed,Cancelled',                
            ]);

            $rental = Rental::findOrFail($id);

            $rental->update([
                // 'customer_id' => $request->customer_id,
                'car_id' => $request->car_id,
                'start_date' => $request->start_date,  
                'end_date' => $request->end_date,
                'total_cost' => $request->total_cost,
                'status' => $request->status,                                                              
            ]);

            return redirect()->route('rentals.index', $rental->id)->with('success', 'Rental updated successfully');
        } catch (\Throwable $th) {
            return back()->with('error', $th->getMessage());
        }
    }

    public function destroy(string $id){
        $rental = Rental::find($id);
        $rental->delete();
        return redirect()->route('rentals.index')->with('success', 'Rental deleted successfully');
    }
}

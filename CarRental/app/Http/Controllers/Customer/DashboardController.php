<?php
namespace App\Http\Controllers\Customer;
use App\Models\Car;
use Inertia\Inertia;
use App\Models\Rental;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller{
    public function index() {
        $totalCars = Car::count();        
        $availableCarsCount = Car::where('availability', 1)->count();
        $totalRentals = Rental::where('status', '!=', 'Cancelled')->count();        
        return inertia('Customer/Dashboard',[
            'totalCars' => $totalCars,
            'availableCarsCount' => $availableCarsCount,
            'totalRentals'=> $totalRentals,
        ])->withViewData('title', 'Customer Dashboard');
        // It's mainly used to pass extra metadata (like a page title) to the layout or head section of your HTML.
    }
}

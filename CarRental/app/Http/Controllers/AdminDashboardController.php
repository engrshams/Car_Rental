<?php
namespace App\Http\Controllers;
use App\Models\Car;
use App\Models\Rental;
use Illuminate\Http\Request;

class AdminDashboardController extends Controller{
    public function index() {
        $totalCars = Car::count();        
        $availableCarsCount = Car::where('availability', 1)->count();
        $totalRentals = Rental::where('status', '!=', 'Cancelled')->count();
        // $totalRentals = Rental::where('status',  'Completed')->count();
        $rentEarning = Rental::where('status', 'Completed')->sum('total_cost');
        $role = auth()->user()->role;
        return inertia('Dashboard',[
            'totalCars' => $totalCars,
            'availableCarsCount' => $availableCarsCount,
            'totalRentals'=> $totalRentals,
            'rentEarning' => $rentEarning,
            'role' => $role,
        ])->withViewData('title', 'Dashboard');
        // It's mainly used to pass extra metadata (like a page title) to the layout or head section of your HTML.
    }
}

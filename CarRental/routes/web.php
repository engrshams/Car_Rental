<?php
namespace App\Http\Controllers\Admin;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminCarController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\AdminRentalController;
use App\Http\Controllers\AdminSliderController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\Customer\RentalController;
use App\Http\Controllers\Customer\DashboardController;

//Route::redirect("/", '/admin/dashboard');  // this is not dashboard page
Route::get('/', [HomeController::class, 'index']);

Route::get('/about', [HomeController::class, 'about']);

Route::get('/contact', [HomeController::class, 'show']);
Route::post('/contact', [HomeController::class, 'send']);

// Login routes
Route::get('/login', [AuthController::class, 'loginPage'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');

Route::get('/signup', [AuthController::class, 'signupPage'])->name('signup');
Route::post('/signup', [AuthController::class, 'signup'])->name('signup.post');

Route::resource('/car', CarController::class);

// Admin Routes
Route::middleware(['auth', 'RoleMiddleware:admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');
    // Add more admin-only routes here
    Route::resource('/admin/sliders', AdminSliderController::class);
    Route::resource('/admin/cars', AdminCarController::class);
    Route::resource('/admin/rentals', AdminRentalController::class);
    Route::resource("/users", UserController::class);
    Route::resource("/customers", CustomerController::class);
});

// Customer Routes
Route::middleware(['auth', 'RoleMiddleware:customer'])->group(function () {
    Route::get('/customer/dashboard', [DashboardController::class, 'index'])->name('customer.dashboard');
    // Add more customer-only routes here
    Route::get('/customer/rentals', [RentalController::class, 'index'])->name('customer.rentals');
    Route::put('/customer/rentals/{id}/cancel', [RentalController::class, 'cancel'])->name('rental.cancel');
    Route::get('/customer/rentals/{id}', [RentalController::class, 'show'])->name('rental.show');
    Route::get('/customer/rental-history', [RentalController::class, 'history'])->name('customer.history');
    Route::get('/rentals', [RentalController::class, 'search'])->name('rentals.search');
    Route::post('/car/{id}/book', [CarController::class, 'bookCar'])->name('car.book');
});

Route::get('/logout', [AuthController::class, 'logout'])->name('logout');





<?php
namespace App\Http\Controllers;
use App\Models\User;
use Inertia\Inertia;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller{
    public function loginPage(Request $request){
        return Inertia::render("Auth/Login");
    }   
    public function login(Request $request){
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);
        $email = $request->email;
        $password = $request->password;
        if(!Auth::attempt(['email'=>$email,'password'=>$password])){
            return redirect()->back()->with('error','Invalid credentials');
        }   
        $role= Auth::user()->role;
        if ($role === 'admin') {
            return redirect()->route('admin.dashboard');
        } else {
            return redirect()->route('customer.dashboard');
        }
    }

    public function signupPage(){
        return Inertia::render('Auth/Signup');
    }

    public function signup(Request $request){
        $request->validate([
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:4',
        ]);
        // Create User
        $user = User::create([
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'customer',
        ]);
        // Create Customer linked to User
        Customer::create([
            'user_id' => $user->id,
            'cus_name' => $request->cus_name,
            'cus_add' => $request->cus_add,
            'cus_state' => $request->cus_state,
            'cus_city' => $request->cus_city,
            'cus_postcode' => $request->cus_postcode,
            'cus_country' => $request->cus_country,
            'cus_phone' => $request->cus_phone,
        ]);
        return redirect()->route('login')->with('success', 'Signup successful. Please login.');
    }
    
    public function logout(){
        Auth::logout();
        return redirect()->route('login');
    }
}
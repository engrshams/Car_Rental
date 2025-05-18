<?php
namespace App\Http\Controllers;
use App\Models\Car;
use Inertia\Inertia;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactMessageToAdmin;
use App\Mail\AutoReplyToUser;

class HomeController extends Controller{
    public function index(Request $request){
        $sliders  = Slider::all();
        $cars = Car::all();
        // dd(Slider::all());
        return Inertia::render("Home/Home",[
            'sliders' => $sliders,
            'cars' => $cars,
        ])->withViewData('title', 'Rental Dashboard');        
    }
    public function about(){
        return Inertia::render('Home/About');
    }

    public function show(){
        return Inertia::render('Home/Contact');
    }

    public function send(Request $request){
        $request->validate([
            'name'    => 'required|string|max:255',
            'email'   => 'required|email',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        $data = $request->only('name', 'email', 'subject', 'message');

        // Mail to Admin
        Mail::to('engr.shams@yahoo.com')->send(new ContactMessageToAdmin($data));

        // Auto-reply to User
        Mail::to($data['email'])->send(new AutoReplyToUser($data));

        return redirect()->back()->with('success', 'Your message has been sent successfully!');
    }
}

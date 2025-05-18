<?php
namespace App\Http\Middleware;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware{
    public function handle(Request $request, Closure $next, $role): Response{
        // Log::info('User role in middleware: ' . auth()->user()->role);
        // Log::info('Authenticated in middleware: ' . Auth::check());
        if(!Auth::check() || Auth::user()->role != $role){
            return redirect()->route('login')->with('error', 'You do not have permission to access this page.');}
        return $next($request);
    }
}

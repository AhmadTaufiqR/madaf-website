<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class isTamu
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if (Auth::check()) {
            $userLevel = Auth::user()->level;
    
            if ($userLevel === 'owner') {
                return redirect('dashboard')->withErrors('Anda sudah login sebagai owner');
            } elseif ($userLevel === 'admin') {
                return redirect('toko-admin')->withErrors('Anda sudah login sebagai admin');
            }
        }
    
        return $next($request);
    }
}

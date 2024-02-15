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
            $userLavel = Auth::user();
            if ($userLavel->level === 'admin') {
                return redirect('dashboard')->withErrors('Anda sudah login sebagai admin');
            } else if ($userLavel->level === 'pengurus') {
                return redirect('dashboard')->withErrors('Anda sudah login sebagai pengurus');
            }
        }

        return $next($request);
    }
}

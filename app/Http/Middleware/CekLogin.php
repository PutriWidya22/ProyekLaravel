<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CekLogin
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
        // cek apakah user sudah login atau belum
        if (Auth::check()){
            //ketika sudah login , lanjut ke route berikutnya
            return $next($request);
        } 
        echo "belum login";
        // jika tidak, pindah ke halaman login dan muncul pesan error
        return redirect('/login')->withErrors('Anda harus login terlebih dahulu');
        
    }
}

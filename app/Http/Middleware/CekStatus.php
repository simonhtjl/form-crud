<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Models\User;

class CekStatus
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
        $user = User::where('email', $request->email)->first();
        if ($user->kategori == 'Tamu') {
            return redirect('/user');
        } elseif ($user->katefori == 'Supervisi') {
            return redirect('/admin');
        }
    }
}

<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if (Auth::check()) {
            $user = Auth::user();
            Log::info('AdminMiddleware check', [
                'user_id' => $user->id,
                'email' => $user->email,
                'role' => $user->role,
            ]);

            if ($user->role === 'admin') {
                return $next($request);
            }
        } else {
            Log::info('AdminMiddleware: user not logged in');
        }

        Log::warning('AdminMiddleware: non-admin blocked', [
            'user_id' => Auth::id(),
            'url' => $request->fullUrl(),
        ]);

        return redirect('/')->with('error', 'Anda tidak memiliki akses ke halaman ini.');
    }
}

<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CustomAuthenticate
{
    public function handle($request, Closure $next, $guard = null)
    {
        if (!Auth::guard($guard)->check()) {
            return redirect()->route($guard . '.login');
        }

        // Set session khusus untuk guard ini
        session(['guard' => $guard]);

        return $next($request);
    }
}

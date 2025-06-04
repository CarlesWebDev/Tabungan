<?php
namespace App\Http\Middleware;

use App\Models\User;
use Carbon\Carbon;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CekAktivitas
{public function handle(Request $request, Closure $next)
{
    $guard = null;
    $user = null;
    $timeout = 15; // default untuk siswa

    if (Auth::guard('guru')->check()) {
        $guard = 'guru';
        $user = Auth::guard('guru')->user();
        $timeout = 0;
    } elseif (Auth::guard('siswa')->check()) {
        $guard = 'siswa';
        $user = Auth::guard('siswa')->user();
        $timeout = 0;
    }

    if (!$user) {
        return $next($request);
    }

    // Jika belum pernah aktif, set sekarang
    if (!$user->last_active_at) {
        $user->last_active_at = Carbon::now();
        $user->is_active = true;
        $user = User::findOrFail($user->id);
        $user->save();
        return $next($request);
    }

    // Cek timeout
    if ($user->last_active_at->diffInMinutes(Carbon::now()) > $timeout) {
        $user->is_active = false;
        $user = User::findOrFail($user->id);
        $user->save();
        Auth::guard($guard)->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('landingpage')->with([
            'message' => 'Sesi Anda telah habis karena tidak aktif.',
            'alert' => 'warning'
        ]);
    }

    // Update aktivitas
    $user->last_active_at = Carbon::now();
    $user->is_active = true;
    $user = User::findOrFail($user->id);
    $user->save();

    return $next($request);
}
}
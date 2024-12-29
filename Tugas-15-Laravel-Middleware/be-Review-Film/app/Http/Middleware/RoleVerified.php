<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\Role;

class RoleVerified
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = auth()->user();
    
         if (!$user->email_verified_at) {
            return response()->json([
                'message' => 'User belum terverifikasi, silahkan verifikasi terlebih dahulu'
            ], 403); // 403 Forbidden
        }

        return $next($request);
    }
}

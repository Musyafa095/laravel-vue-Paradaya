<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\roles;


class RoleAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
         $user = auth()->user();
         if (!$user){
                return response()->json([
                    'message' => 'unauthorized'
                ], 401);
         }

         $roleAdmin = roles::where('name', 'admin')->first();
         if (!$roleAdmin->id) {
             return response()->json([
                'message' => 'Role admin not found, please contact your admin' 
             ], 500);
         }
         if ($user->role_id != $roleAdmin->id) {
            return response()->json([
                'message' => 'User tidak memiliki akses halaman ini'
            ], 403); // Forbidden
        }
        
        return $next($request);
    }
}

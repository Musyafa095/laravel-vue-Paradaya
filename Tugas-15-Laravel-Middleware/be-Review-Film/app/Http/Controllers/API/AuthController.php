<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\roles;


class AuthController extends Controller
{
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|min:2',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8|confirmed',
        ],[
            'required' => 'inputan :attribute wajib diisi',
            'min' => 'inputan :attribute minimal :min karakter',
            'email' => 'inputan :attribute harus berformat email',
            'unique' => 'inputan :attribute sudah terdaftar',
            'confirmed' => 'inputan password tidak sama dengan confirmation password',
        ]);

        $user = new User;
        $roleUser = Roles::where('name', 'user')->first();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('password'));
        $user->role_id = $roleUser->id;
        $user->save();

        return response()->json([   
            'message' => 'register berhasil',
            'user' => $user,
        ], 200);
    }
        public function login (Request $request)
{
    $request->validate([
 
        'email' => 'required',
        'password' => 'required',
    ],[
        'required' => 'inputan :attribute wajib diisi',
    ]);

          $credentials = request(['email', 'password']);

            if (!$token = auth ()->attempt($credentials)){
                return response()->json(['eror' => 'Invalid User'], 401);
            }
            $user = User::where('email', $request->input ('email'))->first();
              return response()->json ([
                'message' => 'User berhasil register',
                'user' => $user,
                'token' => $token

              ], 200);

}
public function currentuser(){
    $user = auth()->user();
    
return response()->json([
    'user' => $user
]);
}
public function logout(){
    auth()->logout();

    return response()->json([
        'message' => 'logout berhasil'
    ]);
}


}

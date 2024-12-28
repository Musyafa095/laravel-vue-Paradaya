<?php
  
namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\roles;
use Tymon\JWTAuth\Facades\JWTAuth;


class AuthController extends Controller
{
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|min:2',
            'email' => 'required|email|unique:users,id',
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
          $user = User::where('email', $request->input ('email'))->with(['profile' => function($query) {
            $query->select('user_id', 'age', 'bio');
        }, 'roles' => function($query) {
            $query->select('id', 'name'); 
        },'listMovies' => function($query) { $query->select('critic', 'rating', 'user_id', 'movie_id'); }])->first();
              return response()->json ([
                'message' => 'User berhasil register',
                'user' => $user,
                'token' => $token

              ], 200);

}
public function currentuser(){
    $user = auth()->user();
    $userData = User::with('listMovies')->find($user->id);
return response()->json([
    'user' => $userData
]);
}
public function logout(){
    auth()->logout();

    return response()->json([
        'message' => 'logout berhasil'
    ]);
}


}

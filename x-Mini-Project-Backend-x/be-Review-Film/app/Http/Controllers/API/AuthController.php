<?php
  
namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\roles;
use App\Models\otpCode;
use Tymon\JWTAuth\Facades\JWTAuth;
use Illuminate\Support\Facades\Mail;
use App\Mail\UserRegisterMail;
use App\Mail\GenerateEmailMail;
use Carbon\Carbon;

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
        Mail::to($user->email)->send(new UserRegisterMail($user));
        
        return response()->json([ 
            'message' => 'User berhasil register, silahkan cek email anda',
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
                'message' => 'User berhasil login register ',
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
public function generateOtp(Request $request)
{
  $request->validate([
    'email' => 'required|email',
  ],[
    'required' => 'inputan :attribute wajib diisi',
    'email' => 'inputan :attribute harus berformat email'
  ]);
  $user = User::where('email', $request->input('email'))->first();
  $user->generate_otp();

  Mail::to($user->email)->send(new GenerateEmailMail($user));
  return response()->json([
    'message' => 'OTP berhasil di generate, silahkan cek email anda'
  ]);
}
public function verifikasi(Request $request)
{
$request->validate([
    'otp' => 'required|min:6',
],[
    'required' => 'inputan :attribute wajib diisi',
    'min' => 'inputan maksimal :min karakter '
]);
   $user = auth()->user();
   //if OTP note found
   $otp_code = otpCode::where('otp', $request->input('otp'))->where('user_id', $user->id)->first();
   if (!$otp_code){
    return response()->json([
        'message' => 'OTP anda tidak ditemukan'
    ], 404);
   }
    //if OTP expired
    $now = Carbon::now();
    if ($now > $otp_code->valid_until){
        return response()->json([
            'message' => 'OTP anda sudah kadaluarsa, silahkan generate ulang OTP anda'
        ], 400);
    }
    //update user
    $user =User::find($otp_code->user_id);
    $user->email_verified_at = $now;
    $user->save();
    $otp_code->delete();
    return response()->json([
      'message' => 'Verifikasi anda berhasil'
    ]);
}
   


}

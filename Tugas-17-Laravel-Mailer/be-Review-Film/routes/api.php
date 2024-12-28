<?php


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\CastController;
use App\Http\Controllers\API\GenreController;
use App\Http\Controllers\API\MovieController;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\RoleController;
use App\Http\Controllers\API\ProfileController;
use App\Http\Controllers\API\ReviewController;
use App\Http\Controllers\API\CastMovieController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// middleware $ auth:api (Admin) kecuali : All, Detail(Public)
Route::prefix('v1')->group(function() {
    Route::apiResource('/cast', CastController::class);
    Route::apiResource('/genre', GenreController::class);
    Route::apiResource('/movie', MovieController::class);
    Route::apiResource('/cast_movie', CastMovieController::class);
    
     //middleware roleAdmin
     Route::middleware(['auth:api', 'admin'])->group(function() {
        Route::resource('role', RoleController::class);
    });
        // Auth
       Route::prefix('auth')->group(function(){
        Route::post('/register', [AuthController::class, 'register']);
        Route::post('/login', [AuthController::class, 'login']);
        Route::get('/me', [AuthController::class, 'currentuser'])->middleware('auth:api');
        Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:api');
        Route::post('/account_verification', [AuthController::class, 'verifikasi'])->middleware('auth:api');
        Route::post('/generate_otp_code', [AuthController::class, 'generateOtp'])->middleware('auth:api');
        })->middleware('api');
        //middleware Profile & Review
        Route::post('/profile', [ProfileController::class, 'storeupdate'])->middleware(['auth:api', 'verifiedAccount']);
        Route::post('/review', [ReviewController::class, 'storeupdate'])->middleware(['auth:api', 'verifiedAccount']);
    });

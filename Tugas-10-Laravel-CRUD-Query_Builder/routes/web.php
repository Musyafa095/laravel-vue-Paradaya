<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookController;

Route ::get('/', [IndexController::class, 'home']);
Route ::get('/register', [AuthController::class, 'register']);
Route ::post('/welcome', [AuthController::class, 'welcome']);

Route ::get('/master', function(){
  return view('layouts.master');
});

Route ::get('/data-table', [IndexController::class, 'table']);



//C => Create data
Route::get('/book/create', [BookController::class, 'create']);
//Route simpan data
Route::post('/book', [BookController::class, 'store']);

//R => Read data
Route::get('/book', [BookController::class, 'index']);
//R detail id
Route::get('/book/{book_id}', [BookController::class, 'show']);
// U => Update data
//Route => form edit
Route::get('/book/{book_id}/edit', [BookController::class, 'edit']);
//update data id
Route::put('/book/{book_id}', [BookController::class, 'update' ]);
//D => Delete
Route::delete('/book/{book_id}', [BookController::class, 'destroy']);
?>
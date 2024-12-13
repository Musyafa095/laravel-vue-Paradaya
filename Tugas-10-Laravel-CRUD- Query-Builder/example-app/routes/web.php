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



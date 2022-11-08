<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\SiswaController;

use App\Http\Controllers\BookController;

use App\Http\Controllers\AuthController;

use App\Http\Controllers\HeloController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

// Route::get('halo',function(){
//     return ['me' => 'Dhemaz'];
// });

// route::resource('halcontroller',HeloController::class);

// route::resource('siswa',SiswaController::class);

// route::resource('books',BookController::class);

Route::middleware('auth:sanctum')->get('/user', function(Request $request) {
    return $request->user();
  });
  
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
  
  
Route::resource('siswa', SiswaController::class);
Route::resource('books', BookController::class)->except('store', 'update');
  
Route::middleware('auth:sanctum')->group(function() {
    Route::resource('books', BookController::class)->except('create', 'show', 'index');
    Route::post('/logout', [AuthController::class, 'logout']);
  });
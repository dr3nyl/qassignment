<?php

use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BookController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});


Route::group(['middleware' => 'token.auth'], function(){

    Route::get('/dashboard', [AuthorController::class, 'index'])->name('dashboard');
    Route::get('/author', [AuthorController::class, 'create']);
    Route::post('/author', [AuthorController::class, 'store']);
    Route::get('/author/{id}', [AuthorController::class, 'show']);
    Route::delete('/author/{id}', [AuthorController::class, 'destroy']);

    Route::get('/book', [BookController::class, 'create']);
    Route::post('/book', [BookController::class, 'store']);
    Route::delete('/book/{id}', [BookController::class, 'destroy']);
});


require __DIR__.'/auth.php';

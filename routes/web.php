<?php

use App\Http\Controllers\AuthorController;
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


Route::get('/dashboard', [AuthorController::class, 'index'])->middleware(['token.auth'])->name('dashboard');
Route::delete('/author/{id}', [AuthorController::class, 'destroy'])->middleware(['token.auth']);

require __DIR__.'/auth.php';

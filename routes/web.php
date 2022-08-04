<?php

use Inertia\Inertia;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Application;

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

//****************************************************************************** */

Auth::routes();

Route::get('/', [App\Http\Controllers\internauteController::class, 'index'])->name('home');
Route::get('/', [App\Http\Controllers\internauteController::class, 'index'])->name('internaute.home');
Route::get('/login', [App\Http\Controllers\internauteController::class, 'index'])->name('login');

Route::get('/register', function () {
    return redirect()->route('internaute.home');
})->name('register');;

Route::middleware(['auth'])->prefix('admin')->group(function () {
    // home route
    Route::get('/home', [App\Http\Controllers\AdminController::class, 'index'])->name('admin.home');
});




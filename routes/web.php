<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

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

/*
|--------------------------------------------------------------------------
| Frontend
|--------------------------------------------------------------------------
*/
Route::get('/', function () {
    return view('welcome');
});

/*
|--------------------------------------------------------------------------
| Admin
|--------------------------------------------------------------------------
*/
Route::get('/admin', function () {
    return redirect('/admin/dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

/*
|--------------------------------------------------------------------------
| Admin - Dashboard
|--------------------------------------------------------------------------
*/
Route::get('/admin/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

/*
|--------------------------------------------------------------------------
| Admin -> Profile
|--------------------------------------------------------------------------
*/
Route::get('/admin/profile/{id}', 
    [UserController::class, 'getUser']
)->middleware(['auth', 'verified'])->name('profile');

Route::post('/admin/profile/{id}', [UserController::class, 'updateUser'])
    ->middleware(['auth', 'verified'])->name('profile');

require __DIR__.'/auth.php';

<?php

use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Auth\SocialliteController;
use Illuminate\Support\Facades\Auth;
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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// google
Route::get('login/google/redirect', [SocialliteController::class, 'redirect'])
    ->middleware(['guest'])
    ->name('redirect');

// Untuk callback dari Google
Route::get('login/google/callback', [SocialliteController::class, 'callback'])
    ->middleware(['guest'])
    ->name('callback');

// Password
Route::get('/admin/change-password', [HomeController::class, 'changePassword'])->name('admin-change-password');
Route::post('/admin/change-password', [HomeController::class, 'updatePassword'])->name('admin-update-password');
// Profile
Route::get('/admin/change-profile', [HomeController::class, 'changeProfile'])->name('admin-change-profile');
Route::patch('/admin/change-profile/{id}', [HomeController::class, 'updateProfile'])->name('admin-update-profile');

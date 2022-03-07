<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\CommunityController;
use App\Http\Controllers\TopicsController;

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

Route::get('/', [AuthController::class, 'login'])->name('login');
Route::post('login', [AuthController::class, 'loginUser'])->name('loginUser');
Route::get('logout', [AuthController::class, 'logout'])->name('logout');

//Auth::routes();

Route::group(['middleware' => 'auth'], function () {
    Route::get('home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('users', [UsersController::class, 'index'])->name('users');
    Route::post('users-listing', [UsersController::class, 'listing'])->name('usersListing');
    Route::get('users/change-status/{id}/{status}', [UsersController::class, 'changeStatus'])->name('changeStatus');
    Route::get('community', [CommunityController::class, 'index'])->name('community');
    Route::get('topics', [TopicsController::class, 'index'])->name('topics');
});

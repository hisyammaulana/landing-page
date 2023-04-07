<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\HeroController;
use App\Http\Controllers\AboutUsController;
use App\Http\Controllers\FeatureController;
use App\Http\Controllers\CareerController;
use App\Http\Controllers\StoreCategoryController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [LandingController::class, 'index'])->name('landing');

// Auth::routes();
Route::prefix('auth')->name('auth.')->group(function () {
    Route::get('/adm', [AuthController::class, 'index'])->name('login');
    Route::post('/adm/proccess', [AuthController::class, 'store'])->name('post');
    // Route::post('/logout', [AuthSessionController::class, 'logout'])->name('logout');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
//Route::resources('/settings', [App\Http\Controllers\SettingController::class])->name('home');
Route::resource('settings', SettingController::class);
Route::resource('heroes', HeroController::class);
Route::resource('about-us', AboutUsController::class);
Route::resource('features', FeatureController::class);
Route::resource('careers', CareerController::class);
Route::resource('categories', StoreCategoryController::class);

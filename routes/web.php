<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\AgentController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\PropertyController;
use App\Http\Controllers\UserPropertyController;
use App\Http\Controllers\RequestPropertyController;
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

// Route::get('/', function () {
//     return view('home.index');
// });

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about', [HomeController::class, 'about'])->name('about');
Route::get('/services', [HomeController::class, 'services'])->name('services');
Route::get('/agent', [HomeController::class, 'agent'])->name('agents');
Route::get('/search', [HomeController::class, 'search'])->name('search');

Route::get('/request/{property:title}', [RequestPropertyController::class, 'index'])->name('property.request');
Route::post('/request/{property}', [RequestPropertyController::class, 'store'])->name('request.save');

Route::get('/register', [AgentController::class, 'register'])->name('agent.register');
Route::post('/register', [RegisterController::class, 'store'])->name('register');
Route::get('/login', [AgentController::class, 'login'])->name('agent.login');
Route::post('/login', [LoginController::class, 'store'])->name('login');
Route::post('/logout', [LogoutController::class, 'store'])->name('logout');

Route::get('property/{property}', [HomeController::class, 'singleListing'])->name('show');
Route::get('/agent/property/{user:firstname}', [UserPropertyController::class, 'mylisting'])->name('agent.listing');

Route::get('/listing', [PropertyController::class, 'index'])->name('listing');

Route::group(['middleware' => 'auth'], function(){

    Route::group(['prefix' => 'admin', 'middleware' => 'is_admin'], function(){

        Route::delete('agent/{agent}', [AgentController::class, 'destroy'])->name('remove.agent');  

    });

    Route::group(['prefix' => 'agent'], function(){

        Route::get('property', [PropertyController::class, 'create'])->name('agent.create');
        Route::post('property', [PropertyController::class, 'store']);
        Route::get('property/{property}/edit', [PropertyController::class, 'edit'])->name('edit');
        Route::put('property/{property}/edit', [PropertyController::class, 'update']);
        Route::delete('property/{property}', [PropertyController::class, 'destroy'])->name('destroy');

    });

});
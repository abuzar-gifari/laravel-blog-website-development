<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\TagController;
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
//     return view('welcome');
// });

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('/', function () {
    return view('website.home');
})->name('website');

Route::get('/post', function () {
    return view('website.post');
});


//login and registration routes

Route::get('login',[LoginController::class,'login'])->name('login');
Route::post('login',[LoginController::class,'doLogin']);
Route::get('registration',[LoginController::class,'registration'])->name('registration');
Route::post('registration',[LoginController::class,'doRegistration']);
Route::get('logout',[LoginController::class,'doLogout'])->name('logout');


// admin routes

Route::middleware('auth')->group(function(){
    Route::middleware('isAdmin')->group(function(){
        Route::group(['prefix'=>'admin'],function(){
            Route::get('/dashboard',[HomeController::class,'see_dashboard'])->name('admin.dashboard');
        
            Route::resource('/category',CategoryController::class);
            Route::resource('/tag',TagController::class);
            Route::resource('/post',PostController::class);
        });
        
    });
    
});


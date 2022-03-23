<?php

use App\Http\Controllers\CategoryController;
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
// Route::get('/category', function () {
//     return view('website.category');
// });


// Route::get('/test', function () {
//     return view('admin.dashboard.index');
// });

Route::group(['prefix'=>'admin'],function(){
    Route::get('/dashboard',function(){
        return view('admin.dashboard.index');
    });

    Route::resource('/category',CategoryController::class);
});

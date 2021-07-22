<?php

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
Route::get('/admin',[App\Http\Controllers\AdminController::class,'index'])->name('admin.dashboard');
Route::get('/admin/query',[App\Http\Controllers\AdminController::class,'query'])->name('query.dashboard');
Route::get('/admin/all',[App\Http\Controllers\AdminController::class,'all'])->name('query.all');
Route::get('/admin/userList',[App\Http\Controllers\AdminController::class,'userList'])->name('query.userList');
//Wallpaper
Route::post('/image',[App\Http\Controllers\WallpaperController::class,'store'])->name('wallpaper.store');
Route::post('/activate',[App\Http\Controllers\WallpaperController::class,'activate'])->name('wallpaper.activate');
Route::delete('/image/{id}',[App\Http\Controllers\WallpaperController::class,'delete'])->name('delete.store');
Route::delete('/user/{email}', [App\Http\Controllers\AdminController::class,'deleteUser'])->name('delete.user');

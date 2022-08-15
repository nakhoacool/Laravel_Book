<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\danhmuccontroller;
use App\Http\Controllers\truyencontroller;
use App\Http\Controllers\chaptercontroller;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\theloaicontroller;

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

Route::get('/', [IndexController::class, 'home']);
Route::get('/danh-muc/{tag}', [IndexController::class, 'danhmuc']);
Route::get('/xem-truyen/{tag}', [IndexController::class, 'xemtruyen']);
Route::get('/xem-chapter/{tag}', [IndexController::class, 'xemchapter']);
Route::get('/the-loai/{tag}', [IndexController::class, 'theloai']);
Route::get('tim-kiem', [IndexController::class, 'timkiem']);

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::resource('/danhmuc', danhmuccontroller::class);

Route::resource('/truyen', truyencontroller::class);

Route::resource('/chapter', chaptercontroller::class);

Route::resource('/theloai', theloaicontroller::class);
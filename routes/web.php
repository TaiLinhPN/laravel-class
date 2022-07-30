<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminPRDController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\DB;
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

Route::get('/trangchu', [HomeController::class , 'getIndex']);
Route::get('/type/{id}', [HomeController::class , 'getLoaiSp']);
Route::get('/contact', [HomeController::class , 'getContact']);
Route::get('/about', [HomeController::class , 'getAbout']);
Route::get('/detail/{id}',[HomeController::class,'getDetail']);

Route::resource('/admin', AdminPRDController::class);

Route::post('/search', [AdminController::class , 'findProduct']);

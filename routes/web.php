<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;  
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

Route::get('/',[HomeController::class,"index"]);
Route::get('/users',[AdminController::class,"user"]);
Route::get('/foodmenu',[AdminController::class,"foodmenu"]);
Route::Post('/uploadfood',[AdminController::class,"uploadfood"]);
Route::get('/deleteuser/{id}',[AdminController::class,"destroy"]);





Route::get('/redirects',[HomeController::class,"redirects"]);

Route::middleware([
    'auth:sanctum',
    'verified'
])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

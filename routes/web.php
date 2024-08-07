<?php

use App\Http\Controllers\admin\AdminController;
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

Route::get('/', function () {
    return view('welcome');
});

//Admin Login Route

//dashboard Route

Route::group(['prefix'=>'admin'],function(){
    Route::group(['middleware'=>'admin.guest'],function(){

        Route::get('/login',[AdminController::class,'login'])->name('admin.login');
        Route::post('/authenticate',[AdminController::class,'authenticate'])->name('admin.authenticate');
        
    });
    Route::group(['middleware'=>'admin.auth'],function(){

        Route::get('/dashboard',[AdminController::class,'create'])->name('admin.dashboard');
        Route::get('/logout',[AdminController::class,'logout'])->name('dashboard.logout');

    }); 

});
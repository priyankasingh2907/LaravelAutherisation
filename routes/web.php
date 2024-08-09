<?php

use Illuminate\Http\Request as HttpRequest;


use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\admin\BrandController;
use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\DiscountController;
use App\Http\Controllers\admin\PageController;
use App\Http\Controllers\admin\ProductController;
use App\Http\Controllers\admin\ShippingController;
use App\Http\Controllers\admin\SubCategoryController;
use App\Http\Controllers\admin\UsersController;
use App\Http\Controllers\productSubcategoryController;
// use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;
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
//login Route
        Route::get('/login',[AdminController::class,'login'])->name('admin.login');
        Route::post('/authenticate',[AdminController::class,'authenticate'])->name('admin.authenticate');
        
    });
    Route::group(['middleware'=>'admin.auth'],function(){
//dashboard Route
        Route::get('/dashboard',[AdminController::class,'create'])->name('admin.dashboard');
        Route::get('/logout',[AdminController::class,'logout'])->name('dashboard.logout');

//slug Route
  
     Route::get('/getSlug',function(HttpRequest $request){

        $slug = "";
        // dd($request);
        if(!empty($request->title)){
            $slug=str::slug($request->title);
        //    dd($slug);
         }
         return response()->json([
            'status'=>true,
            'slug'=>$slug,
        ]);

     })->name('getSlug');
//brands route

Route::get('/brands', [BrandController::class, 'index'])->name('brands.index');
Route::get('/brands/create', [BrandController::class, "create"])->name('brands.create');
Route::post('/brands/store', [BrandController::class, "store"])->name('brands.store');
Route::get('/brands/edit/{id}', [BrandController::class, "edit"])->name('brands.edit');
Route::post('/brands/update/{id}', [BrandController::class, "update"])->name('brands.update');
Route::get('/brands/delete/{id}', [BrandController::class, "destory"])->name('brands.delete');

//order Route

Route::get('/order', [BrandController::class, 'index'])->name('order.index');
Route::get('/order/create', [BrandController::class, "create"])->name('order.create');
Route::post('/order/store', [BrandController::class, "store"])->name('order.store');
Route::get('/order/edit/{id}', [BrandController::class, "edit"])->name('brands.edit');
Route::post('/order/update/{id}', [BrandController::class, "update"])->name('order.update');
Route::get('/braordernds/delete/{id}', [BrandController::class, "destory"])->name('order.delete');



//category Route

Route::get('/category', [CategoryController::class, 'index'])->name('category.index');
Route::get('/category/create', [CategoryController::class, "create"])->name('category.create');
Route::post('/category/store', [CategoryController::class, "store"])->name('category.store');
Route::get('/category/edit/{id}', [CategoryController::class, "edit"])->name('category.edit');
Route::post('/category/update/{id}', [CategoryController::class, "update"])->name('category.update');
Route::get('/category/delete/{id}', [CategoryController::class, "destory"])->name('category.delete');

//discount Route

Route::get('/discount', [DiscountController::class, 'index'])->name('discount.index');
Route::get('/discount/create', [DiscountController::class, "create"])->name('discount.create');
Route::post('/discount/store', [DiscountController::class, "store"])->name('discount.store');
Route::get('/discount/edit/{id}', [DiscountController::class, "edit"])->name('discount.edit');
Route::post('/discount/update/{id}', [DiscountController::class, "update"])->name('discount.update');
Route::get('/discount/delete/{id}', [DiscountController::class, "destory"])->name('discount.delete');



//pages route

Route::get('/pages', [PageController::class, 'index'])->name('pages.index');
Route::get('/pages/create', [PageController::class, "create"])->name('pages.create');
Route::post('/pages/store', [PageController::class, "store"])->name('pages.store');
Route::get('/pages/edit/{id}', [PageController::class, "edit"])->name('pages.edit');
Route::post('/pages/update/{id}', [PageController::class, "update"])->name('pages.update');
Route::get('/pages/delete/{id}', [PageController::class, "destory"])->name('pages.delete');



//proucts route

Route::get('/proucts', [ProductController::class, 'index'])->name('proucts.index');
Route::get('/proucts/create', [ProductController::class, "create"])->name('proucts.create');
Route::post('/proucts/store', [ProductController::class, "store"])->name('proucts.store');
Route::get('/proucts/edit/{id}', [ProductController::class, "edit"])->name('proucts.edit');
Route::post('/proucts/update/{id}', [ProductController::class, "update"])->name('proucts.update');
Route::get('/proucts/delete/{id}', [ProductController::class, "destory"])->name('proucts.delete');
Route::get('/productsubcategory', [productSubcategoryController::class, "index"])->name('productSubcategory');


// shipping route

Route::get('/shipping', [ShippingController::class, 'index'])->name('shipping.index');
Route::get('/shipping/create', [ShippingController::class, "create"])->name('shipping.create');
Route::post('/shipping/store', [ShippingController::class, "store"])->name('shipping.store');
Route::get('/branshippingds/edit/{id}', [ShippingController::class, "edit"])->name('shipping.edit');
Route::post('/shipping/update/{id}', [ShippingController::class, "update"])->name('shipping.update');
Route::get('/shipping/delete/{id}', [ShippingController::class, "destory"])->name('shipping.delete');


//subcategory

Route::get('/subcategory', [SubCategoryController::class, 'index'])->name('subcategory.index');
Route::get('/subcategory/create', [SubCategoryController::class, "create"])->name('subcategory.create');
Route::post('/subcategory/store', [SubCategoryController::class, "store"])->name('subcategory.store');
Route::get('/subcategory/edit/{id}', [SubCategoryController::class, "edit"])->name('subcategory.edit');
Route::post('/subcategory/update/{id}', [SubCategoryController::class, "update"])->name('subcategory.update');
Route::get('/subcategory/delete/{id}', [SubCategoryController::class, "destory"])->name('subcategory.delete');


//users

Route::get('/users', [UsersController::class, 'index'])->name('users.index');
Route::get('/users/create', [UsersController::class, "create"])->name('users.create');
Route::post('/users/store', [UsersController::class, "store"])->name('users.store');
Route::get('/users/edit/{id}', [UsersController::class, "edit"])->name('users.edit');
Route::post('/users/update/{id}', [UsersController::class, "update"])->name('users.update');
Route::get('/users/delete/{id}', [UsersController::class, "destory"])->name('users.delete');





    }); 

});
<?php

use App\Http\Controllers\AboutUsController;
use App\Http\Controllers\AccountController;
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
use App\Http\Controllers\CartController;
use App\Http\Controllers\ChanhePasswordController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\ContactUsController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\FrontendsProductController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MyOrdersController;
use App\Http\Controllers\OrderDetailController;
use App\Http\Controllers\PrivacyController;
use App\Http\Controllers\productSubcategoryController;
use App\Http\Controllers\RefundPolicyController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\TermsandconditionsController;
use App\Http\Controllers\WhihlistController;
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

// Route::get('/', function () {
//     return view('welcome');
// });
//
//frontend Routes
//home Route
Route::get('/',[FrontController::class,'index'])->name('front.home');

//shop Route
Route::get('/shop/{categorySlug?}/{subCategorySlug?}',[ShopController::class,'index'])->name('front.shop');
Route::get('/product/{slug}',[ShopController::class,'product'])->name('Front.product');

//wishlist route
Route::get('/wishlist',[WhihlistController::class,'index'])->name('wishlist.index');

//register Route
Route::get('/register',[RegisterController::class,'index'])->name('register.index');
Route::post('/register/store',[RegisterController::class,'store'])->name('register.store');

//FrontendProduct Route 
Route::get('/FrontendProduct',[FrontendsProductController::class,'index'])->name('FrontendProduct.index');

//order-detainls Route
Route::get('/orderDetails',[OrderDetailController::class,'index'])->name('orderDetails.index');

//myorder Route
Route::get('/myorder',[MyOrdersController::class,'index'])->name('myorder.index');

//login Route 
Route::get('/login',[LoginController::class,'index'])->name('login.index');
Route::post('/login/store',[LoginController::class,'store'])->name('login.store');
Route::get('/logout/{id}',[LoginController::class,'logout'])->name('login.logout');
//contactUs Route
Route::get('/contactUs',[ContactUsController::class,'index'])->name('contactUs.index');
Route::post('/contactUs/store',[ContactUsController::class,'store'])->name('contactUs.store');

//checkout Route
Route::get('/checkout',[CheckoutController::class,'index'])->name('checkout.index');

//changePassword
Route::get('/changePassword',[ChanhePasswordController::class,'index'])->name('changePassword.index');

//cart Route
Route::get('/cart',[CartController::class,'index'])->name('cart.index');

Route::post('/addtocart',[CartController::class,'addtocart'])->name('cart.addtocart');

Route::post('/cartUpdate',[CartController::class,'update'])->name('cart.update');

Route::delete('/deleteCart',[CartController::class,'deleteCart'])->name('cart.deleteCart');

//Account Route 
Route::get('/Account',[AccountController::class,'index'])->name('Account.index');

//about Route 
Route::get('/aboutUs',[AboutUsController::class,'index'])->name('aboutUs.index');

//RefundPolicy
Route::get('/RefundPolicy',[RefundPolicyController::class,'index'])->name('RefundPolicy.index');

//Tearms & Conditions
Route::get('/terms',[TermsandconditionsController::class,'index'])->name('terms.index');

//Privacy
Route::get('/Privacy',[PrivacyController::class,'index'])->name('Privacy.index');



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
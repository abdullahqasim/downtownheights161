<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\StudentController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something greaft!
|
*/
Route::get('/datarefresh',function(){
    Artisan::call("optimize:clear");
    
});
Route::get('/',[AuthController::class,'cat_index'])->name('cat_index');
Route::get('/land_categories/',[AuthController::class,'land_categories']);
Route::get('/product-detail/{id}',[AuthController::class,'product_detail'])->name('product_detail');
Route::get('/filter_products/',[AdminController::class,'filter_products']);
Route::get('/products/{id}',[AuthController::class,'product_data'])->name('product_data');
Route::get('cart', [AuthController::class, 'cart'])->name('cart');
Route::get('/add-to-cart',[AuthController::class,'addToCart'])->name('add_to_cart');
Route::patch('update-cart', [AuthController::class, 'update'])->name('update_cart');
Route::delete('remove-from-cart', [AuthController::class, 'remove'])->name('remove_from_cart');
Route::match(['get','post'],'checkout', [AuthController::class, 'checkout'])->name('checkout');
Route::get('success', [AuthController::class, 'success']);
Route::get('error', [AuthController::class, 'error']);
Route::get('/book_order/',[AdminController::class,'book_order']);
Route::get('/get_price/',[AdminController::class,'get_price']);
Route::get('/double_price/',[AdminController::class,'double_price']);
Route::get('/single_price/',[AdminController::class,'single_price']);

Route::group(['middleware'=>['web','guest']],function(){
// Route::get('/', function () {
//     // return redirect('login');
//     return view('index');
// });

    Route::get('admin/register',[AuthController::class,'register'])->name('view_register');
    Route::post('register',[AuthController::class,'register_store'])->name('store_register');
    
    Route::get('admin/login',[AuthController::class,'login'])->name('login');
    Route::post('login',[AuthController::class,'login_store'])->name('store_login');

});

Route::group(['middleware'=>['web','auth']],function(){
Route::get('dashboard',[AuthController::class,'dashboard'])->name('dashboard');
Route::get('logout',[AuthController::class,'logout'])->name('logout');

Route::group(['middleware'=>['web','admin']],function(){
    Route::get('admin/dashboard',[AdminController::class,'index'])->name('admin');
    // Main Catefory
    Route::get('admin/add-parent_category',[AdminController::class,'add_main_category'])->name('add_main_category');
    Route::post('admin/store-parent_category',[AdminController::class,'store_main_category'])->name('store_main_category');
    Route::get('admin/list-parent-category',[AdminController::class,'list_main_category'])->name('list_main_category');
    Route::get('edit-parent-category/{id}',[AdminController::class,'edit_parent_category'])->name('edit_parent_category');
    Route::get('delete-parent-category/{id}',[AdminController::class,'delete_parent_category'])->name('delete_parent_category');
    Route::post('admin/update-parent-category',[AdminController::class,'update_parent_category'])->name('update_parent_category');
    
    // Category
    Route::get('admin/add-category',[AdminController::class,'add_category'])->name('add_category');
    Route::post('admin/store-category',[AdminController::class,'store_category'])->name('store_category');
    Route::get('admin/list-category',[AdminController::class,'list_category'])->name('list_category');
    Route::get('edit-category/{id}',[AdminController::class,'edit_category'])->name('edit_category');
    Route::get('delete-category/{id}',[AdminController::class,'delete_category'])->name('delete_category');
    Route::post('admin/update-category',[AdminController::class,'update_category'])->name('update_category');
    // Product
    Route::get('admin/add-product',[AdminController::class,'add_product'])->name('add_product');
    Route::post('admin/store-product',[AdminController::class,'store_product'])->name('store_product');
    Route::get('admin/list-product',[AdminController::class,'list_product'])->name('list_product');
    Route::get('edit-product/{id}',[AdminController::class,'edit_product'])->name('edit_product');
    Route::get('delete-product/{id}',[AdminController::class,'delete_product'])->name('delete_product');
    Route::post('admin/update-product',[AdminController::class,'update_product'])->name('update_product');
    
      // variants
      Route::get('admin/add-variants',[AdminController::class,'add_variants'])->name('add_variants');
      Route::post('admin/store-variants',[AdminController::class,'store_variants'])->name('store_variants');
      Route::get('admin/list-variants',[AdminController::class,'list_variants'])->name('list_variants');
      Route::get('edit-variants/{id}',[AdminController::class,'edit_variants'])->name('edit_variants');
      Route::get('delete-variants/{id}',[AdminController::class,'delete_variants'])->name('delete_variants');
      Route::post('admin/update-variants',[AdminController::class,'update_variants'])->name('update_variant');

      // measurment
      Route::get('admin/add-measurment',[AdminController::class,'add_measurment'])->name('add_Measurment');
      Route::post('admin/store-measurment',[AdminController::class,'store_measurment'])->name('store_measurment');
      Route::get('admin/list-measurment',[AdminController::class,'list_measurment'])->name('list_measurment');
      Route::get('edit-measurment/{id}',[AdminController::class,'edit_measurment'])->name('edit_measurment');
      Route::get('delete-measurment/{id}',[AdminController::class,'delete_measurment'])->name('delete_measurment');
      Route::post('admin/update-measurment',[AdminController::class,'update_measurment'])->name('update_measurment');

      Route::get('admin/list-order',[AdminController::class,'order_list'])->name('order_list');
      Route::get('edit-order/{id}',[AdminController::class,'edit_order'])->name('edit_order');
      Route::get('delete-order/{id}',[AdminController::class,'delete_order'])->name('delete_order');
      Route::post('admin/update-order',[AdminController::class,'update_order'])->name('update_order');


      
      
      

});



});






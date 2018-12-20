<?php

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
Route::get('/email-test', function () {
    return view('email');
});
Route::get('/', 'HomeController@index')->name('home');
Route::get('/profile', 'HomeController@profile')->name('profile');
Route::post('/profile', 'HomeController@profile');
Route::post('/profile-img', 'HomeController@profile_update');
Route::get('/about', 'HomeController@about')->name('about');
Route::get('/contact', 'HomeController@contact')->name('contact');
Route::post('/contact-us', 'HomeController@addContact');
Route::get('/terms-and-conditions', 'HomeController@termsConditions')->name('terms');
Route::get('/privacy-policy', 'HomeController@privacyPolicy')->name('policy');
Route::get('/cart', 'CartController@cart')->name('cart');
Route::post('/add-to-cart', 'CartController@addToCart');
Route::get('/search', 'ProductController@search')->name('search');
Route::get('/remove-from-cart/{id}', 'CartController@removeItem');
Route::post('/update-cart', 'CartController@updatecart');
Route::get('/product/{slug}', 'ProductController@productDetail')->name('products');
Route::get('/add-to-wishlist/{id}', 'ProductController@wishlist');
Route::get('wishlist', 'ProductController@view_wishlist')->name('wishlist');
Route::get('remove-wishlist/{id}', 'ProductController@removeWishlist');
Route::get('sort-by', 'ProductController@sortBy');
Route::get('checkout', 'CartController@checkout')->name('checkout');
Route::post('/checkout', 'CartController@proceedCheckout')->name('proceed-checkout');
Route::post('/place-order', 'OrderController@order')->name('place-order');
Route::get('/my-order', 'OrderController@MyOrder')->name('my-order');
Route::get('/view-order/{id}', 'OrderController@ViewOrder')->name('view-order');
Route::get('/thankyou', 'OrderController@thankyou')->name('thankyou');
Route::get('/gift/plants', 'ProductController@wishGift')->name('gift.plants');
Route::get('/gift/flowers', 'ProductController@wishGift')->name('gift.flowers');
// Route::get('/flowers', 'ProductController@flower')->name('flower');
Route::get('facebook/{provider}', 'Auth\AuthController@redirectToProvider');
Route::get('facebook/{provider}/callback', 'Auth\AuthController@handleProviderCallback');
Route::get('google/{provider}', 'Auth\AuthController@redirectToProvider');
Route::get('google/{provider}/callback', 'Auth\AuthController@handleProviderCallback');
Route::get('twitter/', 'Auth\AuthController@redirectTwitter');
Route::get('twitter/callback', 'Auth\AuthController@handleTwitterCallback');


// ================================= Flowers ===========================================//
Route::get('products','ProductController@allproduct')->name('product');


Route::get('flowers/{slug}','ProductController@flowercat')->name('flower');



Route::get('flowers', 'ProductController@allFlower')->name('flowers');
Route::get('/flower/{slug}', 'ProductController@productDetail')->name('flowerss');

// ================================= Plants ===========================================//




Route::get('plants/{slug}','ProductController@plantcat')->name('plant');
Route::get('/plant/{slug}', 'ProductController@productDetail')->name('plantss');
Route::get('plants', 'ProductController@allPlant')->name('plants');

// ================================= Cakes ===========================================//


Route::get('cakes/{slug}','ProductController@cakecat')->name('cake');
Route::get('/cake/{slug}', 'ProductController@productDetail')->name('cakess');


Route::get('cakes', 'ProductController@allCake')->name('cakes');

// ================================= Gifts ===========================================//

Route::get('gifts/{slug}', 'ProductController@gifts')->name('gift');
Route::get('gifts', 'ProductController@allgifts')->name('gifts');
Route::get('/gift/{slug}', 'ProductController@productDetail')->name('giftss');







//=========================Admin routes=================================//

// Route::get('admin/login', 'AdminController@index');
Route::get('test', 'ProductController@test');
Auth::routes();







Route::prefix('admin')->group(function () {
  Route::get('/', 'AdminController@index')->name('admin.dashboard');
  Route::get('dashboard', 'AdminController@index')->name('admin.dashboard');
  Route::get('register', 'AdminController@create')->name('admin.register');
  Route::post('register', 'AdminController@store')->name('admin.register.store');
  Route::get('login', 'Auth\Admin\LoginController@login')->name('admin.auth.login');
  Route::post('login', 'Auth\Admin\LoginController@loginAdmin')->name('admin.auth.loginAdmin');
  Route::post('logout', 'Auth\Admin\LoginController@logout')->name('admin.auth.logout');
  
  
  //Products 
  
  // Route::get('all-products', 'Auth\Admin\ProductController@allproducts')->name('admin.all-products');
  // Route::get('add-product',  'Auth\Admin\ProductController@addProduct')->name('admin.add-product');
  // Route::post('add-product',  'Auth\Admin\ProductController@addProduct')->name('admin.add-product');
  
  
  
  Route::get('all-flowers', 'Auth\Admin\ProductController@allproducts')->name('admin.all-flowers');
  Route::get('flower-categories', 'Auth\Admin\ProductController@allCategories')->name('admin.flower-categories');
  Route::get('add-flower-category',  'Auth\Admin\ProductController@addProductCategory')->name('admin.add-flower-category');
  Route::post('add-flower-category',  'Auth\Admin\ProductController@addProductCategory')->name('admin.add-flower-category');
  Route::get('edit-flower-category/{id}',  'Auth\Admin\ProductController@editProductCategory')->name('admin.edit-flower-category');
  Route::post('edit-flower-category/',  'Auth\Admin\ProductController@updateProductCategory')->name('admin.edit-flower-category');
  Route::get('add-flower',  'Auth\Admin\ProductController@addProduct')->name('admin.add-flower');
  Route::post('add-flower',  'Auth\Admin\ProductController@addProduct')->name('admin.add-flower');
  
  Route::get('all-plants', 'Auth\Admin\ProductController@allproducts')->name('admin.all-plants');
  Route::get('plant-categories', 'Auth\Admin\ProductController@allCategories')->name('admin.plant-categories');
  Route::get('add-plant-category',  'Auth\Admin\ProductController@addProductCategory')->name('admin.add-plant-category');
  Route::post('add-plant-category',  'Auth\Admin\ProductController@addProductCategory')->name('admin.add-plant-category');
  Route::get('edit-plant-category/{id}',  'Auth\Admin\ProductController@editProductCategory')->name('admin.edit-plant-category');
  Route::post('edit-plant-category',  'Auth\Admin\ProductController@updateProductCategory')->name('admin.edit-plant-category');
  Route::get('add-plant',  'Auth\Admin\ProductController@addProduct')->name('admin.add-plant');
  Route::post('add-plant',  'Auth\Admin\ProductController@addProduct')->name('admin.add-plant');
  
  Route::get('all-cakes', 'Auth\Admin\ProductController@allproducts')->name('admin.all-cakes');
  Route::get('cake-categories', 'Auth\Admin\ProductController@allCategories')->name('admin.cake-categories');
  Route::get('add-cake-category',  'Auth\Admin\ProductController@addProductCategory')->name('admin.add-cake-category');
  Route::post('add-cake-category',  'Auth\Admin\ProductController@addProductCategory')->name('admin.add-cake-category');
  Route::get('edit-cake-category/{id}',  'Auth\Admin\ProductController@editProductCategory')->name('admin.edit-cake-category');
  Route::post('edit-cake-category/',  'Auth\Admin\ProductController@updateProductCategory')->name('admin.edit-cake-category');
  Route::get('add-cake',  'Auth\Admin\ProductController@addProduct')->name('admin.add-cake');
  Route::post('add-cake',  'Auth\Admin\ProductController@addProduct')->name('admin.add-cake');
  
  Route::get('all-occasions', 'Auth\Admin\ProductController@allproducts')->name('admin.all-occasions');
  Route::get('occasion-categories', 'Auth\Admin\ProductController@allCategories')->name('admin.occasion-categories');
  Route::get('add-occasion',  'Auth\Admin\ProductController@addProduct')->name('admin.add-occasion');
  Route::post('add-occasion',  'Auth\Admin\ProductController@addProduct')->name('admin.add-occasion');
  
  Route::get('all-gifts', 'Auth\Admin\ProductController@allproducts')->name('admin.all-gifts');
  Route::get('gift-categories', 'Auth\Admin\ProductController@allCategories')->name('admin.gift-categories');
  Route::get('add-gift-category',  'Auth\Admin\ProductController@addProductCategory')->name('admin.add-gift-category');
  Route::post('add-gift-category',  'Auth\Admin\ProductController@addProductCategory')->name('admin.add-gift-category');
  Route::get('edit-gift-category/{id}',  'Auth\Admin\ProductController@editProductCategory')->name('admin.edit-gift-category');
  Route::post('edit-gift-category/',  'Auth\Admin\ProductController@updateProductCategory')->name('admin.edit-gift-category');
  Route::get('add-gift',  'Auth\Admin\ProductController@addProduct')->name('admin.add-gift');
  Route::post('add-gift',  'Auth\Admin\ProductController@addProduct')->name('admin.add-gift');
  Route::post('add-gift',  'Auth\Admin\ProductController@addProduct')->name('admin.add-gift');

  Route::get('delete-category/{id}',  'Auth\Admin\ProductController@deleteCategory')->name('admin.delete-category');
  
  // Route::get('edit-product/{id}',  'Auth\Admin\ProductController@editProduct')->name('admin.edit-product');
  Route::get('edit-flower/{id}',  'Auth\Admin\ProductController@editProduct')->name('admin.edit-flower');
  Route::get('edit-plant/{id}',  'Auth\Admin\ProductController@editProduct')->name('admin.edit-plant');
  Route::get('edit-gift/{id}',  'Auth\Admin\ProductController@editProduct')->name('admin.edit-gift');
  Route::get('edit-cake/{id}',  'Auth\Admin\ProductController@editProduct')->name('admin.edit-cake');
  Route::post('edit-flower',  'Auth\Admin\ProductController@updateProduct')->name('admin.edit-flower');
  Route::post('edit-plant',  'Auth\Admin\ProductController@updateProduct')->name('admin.edit-plant');
  Route::post('edit-gift',  'Auth\Admin\ProductController@updateProduct')->name('admin.edit-gift');
  Route::post('edit-cake',  'Auth\Admin\ProductController@updateProduct')->name('admin.edit-cake');
  Route::post('update-product',  'Auth\Admin\ProductController@updateProduct')->name('admin.update-product');
  Route::get('delete-product/{id}',  'Auth\Admin\ProductController@deleteProduct')->name('admin.delete-product');
  // Route::post('add-product', 'Auth\Admin\ProductController@add')->name('admin.add-product');
  Route::post('filter-products', 'Auth\Admin\ProductController@filterproducts')->name('admin.filter-products');
  Route::post('filter-categories', 'Auth\Admin\ProductController@filtercategories')->name('admin.filter-categories');
  
  
  // backend Pages========

  Route::get('all-pages', 'Auth\Admin\PageController@allPages')->name('admin.all-pages');
  Route::post('all-pages', 'Auth\Admin\PageController@pageFilter')->name('admin.all-pages');
  Route::get('add-page',  'Auth\Admin\PageController@index')->name('admin.add-page');
  Route::post('add-page',  'Auth\Admin\PageController@savePage')->name('admin.add-page');
  Route::get('edit-page/{id}',  'Auth\Admin\PageController@editPage')->name('admin.edit-page');
  Route::post('update-page',  'Auth\Admin\PageController@updatePage')->name('admin.update-page');
  Route::get('delete-page/{id}',  'Auth\Admin\PageController@deletePage')->name('admin.delete-page');


  // cities ==============
    Route::post('all-cities',  'Auth\Admin\CityController@filterCities')->name('admin.all-cities');
    Route::get('all-cities',  'Auth\Admin\CityController@allCities')->name('admin.all-cities');
    Route::get('add-city',  'Auth\Admin\CityController@index')->name('admin.add-city');
    Route::post('add-city',  'Auth\Admin\CityController@index')->name('admin.add-city');
   
    Route::get('edit-city/{id}',  'Auth\Admin\CityController@editCity')->name('admin.edit-city');
    Route::post('update-city',  'Auth\Admin\CityController@updateCity')->name('admin.update-city');
    Route::get('delete-city/{id}',  'Auth\Admin\CityController@deleteCity')->name('admin.delete-city');


    // Order Management =============

    Route::get('all-orders',  'Auth\Admin\OrderController@index')->name('admin.all-orders');
    Route::post('all-orders',  'Auth\Admin\OrderController@filterOrder')->name('admin.all-orders');
    Route::get('view-order/{id}',  'Auth\Admin\OrderController@viewOrder')->name('admin.view-order');
    Route::post('/approve-order',  'Auth\Admin\OrderController@approveOrder')->name('admin.approve-order');
  
  // User ===========================

  Route::get('all-users', 'Auth\Admin\UserController@index')->name('admin.all-users');
  Route::post('all-users', 'Auth\Admin\UserController@filterUser')->name('admin.all-users');
  Route::get('add-user',  'Auth\Admin\UserController@addUser')->name('admin.add-user');
  Route::post('add-user',  'Auth\Admin\UserController@addUser')->name('admin.add-user');
  Route::get('edit-user/{id}',  'Auth\Admin\UserController@editUser')->name('admin.edit-user');
  Route::post('update-user',  'Auth\Admin\UserController@updateUser')->name('admin.update-user');
  Route::get('delete-user/{id}',  'Auth\Admin\UserController@deleteUser')->name('admin.delete-user');
  
  //==========================Attributes==============================//
Route::get('add-attribute', 'Auth\Admin\ProductController@addAttribute')->name('add-attribute');
Route::post('add-attribute', 'Auth\Admin\ProductController@addAttribute')->name('add-attribute');
Route::post('list-attributes', 'Auth\Admin\ProductController@filterAttribute')->name('admin.list-attributes');
Route::get('list-attributes', 'Auth\Admin\ProductController@listAttribute')->name('admin.list-attributes');
Route::get('edit-attribute/{id}', 'Auth\Admin\ProductController@editAttribute')->name('admin.edit-attributes');
Route::post('edit-attribute', 'Auth\Admin\ProductController@updateAttribute')->name('admin.edit-attributes');
Route::get('delete-attribute/{id}', 'Auth\Admin\ProductController@deleteAttribute')->name('admin.delete-attributes');
  
  
  
});




















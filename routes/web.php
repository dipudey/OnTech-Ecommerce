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

Route::get('/', 'FrontendController@index');
Route::get('shop', 'FrontendController@shop');
Route::get('contact', 'FrontendController@contact');
Route::post('contact/store', 'FrontendController@contactStore');
Route::get('blog','FrontendController@blog');
Route::get('blog/post/{id}','FrontendController@blogPost');
Route::get('product/details/{id}', 'FrontendController@productDetails');
Route::get('product/category/{category_id}', 'FrontendController@');
Route::get('/add/wishlist/{id}', 'FrontendController@addWishlist');
Route::get('/product/view/{id}','FrontendController@productView');
Route::get('change/language/english','FrontendController@changeEnglishLanguage');
Route::get('change/language/bangla','FrontendController@changeBanglaLanguage');
Route::post('order/tracking','FrontendController@orderTracking');
Route::get('search/{name}','FrontendController@searchProduct');
Route::get('category/{id}','FrontendController@showProductByCategory');
Route::get('subcategory/{subcategory_id}','FrontendController@showProductBySubcategory');


Auth::routes();

//SocialController Routes
Route::get('/auth/redirect/{provider}', 'SocialController@redirect');
Route::get('/callback/{provider}', 'SocialController@callback');


//AdminController Routes
Route::get('admin/home', 'AdminController@index');
Route::get('admin', 'Admin\LoginController@showLoginForm');
Route::post('admin', 'Admin\LoginController@login')->name('admin.login');
Route::prefix('admin')->group(base_path('routes/admin.php'));

//HomeController Routes
Route::get('/home', 'HomeController@index')->name('home');
Route::get('user/change/password','HomeController@changePassword');
Route::post('user/change/password/post','HomeController@changePasswordPost')->name('change.password.post');
Route::get("user/profile/edit",'HomeController@profileEdit');
Route::post("user/profile/update",'HomeController@profileUpdate');
//WishlistController Routes
Route::get('wishlist','WishlistController@index');
Route::get('wishlist/remove/{id}','WishlistController@removeWishlist');
//CartController Roures
Route::get('cart', 'CartController@index');
Route::get('cart/{cupon_name}', 'CartController@index');
Route::get('/add/cart/{id}', 'CartController@addCart');
Route::get('/cart/check', 'CartController@check');
Route::post('add/to/cart', 'CartController@store');
Route::post('update/cart', 'CartController@update')->name('update.cart');
Route::get('cart/remove/{rowId}', 'CartController@removeCart');
Route::get('checkout','CartController@checkout');

//PaymentController Routes
Route::post('payment','PaymentController@addPayment')->name('add.payment');
Route::post('stripe', 'PaymentController@stripePost')->name('stripe.post');
Route::get('/mollie','PaymentController@preparePayment')->name('mollie.payment');

//ReviewController Routes
Route::post('review','ReviewController@storeReview');

//NewsLatterController Routes
Route::get('newsletter','NewsletterController@create');
Route::post('newsletter','NewsletterController@store');

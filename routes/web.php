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

//menu nav
Route::get('/index', 'HomeController@index');
Route::get('/product', 'ProductFrontController@product');
Route::get('/contac', 'HomeController@contac');
Route::get('/help', 'HomeController@help');
Route::get('/login', 'HomeController@login');

// frontend
Route::get('/', 'HomeController@index');

// frontend product
Route::get('/product-category/{category_id}','ProductFrontController@viewcategory');
Route::get('/view-product/{product_id}','ProductFrontController@product_detail');

//frontend cart
// Route::get('/cartt', 'CartController@index');
Route::post('/add-to-cart', 'CartController@add_cart');
Route::get('/show-cart', 'CartController@show_cart');
Route::get('/delete-cart/{rowId}','CartController@delete_cart');
Route::POST('/update-cart', 'CartController@update_cart');

//checkout frontend
Route::get('/login-check', 'CheckoutController@login_check');
Route::get('/checkout', 'CheckoutController@checkoutt');

Route::post('/registrasi-customer', 'CheckoutController@registrasi_customer');
Route::post('/save-checkout', 'CheckoutController@save_checkout');
Route::post('/customer-login', 'CheckoutController@customer_login');
Route::get('/customer-logout', 'CheckoutController@customer_logout');
Route::get('/customer-payment', 'CheckoutController@customer_payment');
Route::post('/place-order', 'CheckoutController@place_order');
Route::get('/direct', 'CheckoutController@direct');



//backend
Route::get('/adminHerbs', 'AdminloginController@index');

Route::get('/admindashboard', 'AdminloginController@dashboard');
Route::post('/admindashboard2', 'AdminloginController@dashboard2');
Route::get('/logout','AdminController@logout');

// category
Route::get('/add-category','CategoryController@add');
Route::get('/all-category','CategoryController@all');
Route::get('/editt','CategoryController@editt');
Route::post('/save-category','CategoryController@save');
Route::get('/status-aktif/{category_id}','CategoryController@status_aktif');
Route::get('/status-nonaktif/{category_id}','CategoryController@status_nonaktif');
Route::get('/edit-category/{category_id}','CategoryController@edit');
Route::post('/update-category/{category_id}','CategoryController@update');
Route::get('/delete-category/{category_id}','CategoryController@delete');

// product
Route::get('/add-product','ProductController@index');
Route::post('/save-product','ProductController@save');
Route::get('/all-product','ProductController@all');
Route::get('/status-aktiff/{product_id}','ProductController@status_aktif');
Route::get('/status-nonaktiff/{product_id}','ProductController@status_nonaktif');
Route::get('/edit-product/{product_id}','ProductController@edit');
Route::post('/update-product/{product_id}','ProductController@update');
Route::get('/delete-product/{product_id}','ProductController@delete');

// Transaksi
Route::get('/transaksi-product', 'CheckoutController@transaksi');
Route::get('/view-order/{order_id}', 'CheckoutController@view_order');
Route::get('/status-success/{order_id}','ProductController@status_success');
Route::get('/status-pending/{order_id}','ProductController@status_pending');
<?php


Route::Get('/','WelcomeController@index');
Route::Get('/category/{id}', 'WelcomeController@category');
Route::Get('/register', 'WelcomeController@register');
Route::Get('/login', 'WelcomeController@login');
Route::Get('/wishlist', 'WelcomeController@wishlist');
Route::Get('/category-details/{id}', 'WelcomeController@categoryDetails');
Route::Get('/blog', 'WelcomeController@blog');
Route::Get('/category-description', 'WelcomeController@blogs_single');

Route::post('/add-to-cart', 'AddtocartController@showtoCart');

Route::get('/checkout', 'checkoutController@index');
Route::post('/new-customer', 'checkoutController@saveCustomerInfo');
Route::get('/shipping-info', 'checkoutController@shippingCustomerInfo');
Route::get('/logout', 'checkoutController@customerLogout');
Route::post('/login-customer', 'checkoutController@loginCustomer');
Route::post('/new-shipping', 'checkoutController@saveShipping');
Route::get('/payment-info', 'checkoutController@showpaymentForm');



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/category/add-category', 'CategoryController@addCategory');
Route::post('category/add-newCategory', 'CategoryController@addNewCategory');
Route::get('/category/manage-category', 'CategoryController@manageCategory')->middleware('AuthenicateMiddileware');;
Route::get('/category/edit-category/{id}','CategoryController@editCategory');
Route::post('/category/updateCategory','CategoryController@Updateategory');
Route::get('/category/deleteCategory/{id}','CategoryController@deleteCategory');


Route::get('/brand/add-brand','BrandController@addBrand');
Route::post('/brand/new-brand','BrandController@addNewBrand');
Route::get('/brand/manage-brand','BrandController@manageBrand')->middleware('AuthenicateMiddileware');
Route::get('/brand/edit-brand/{id}','BrandController@EditBrand');
Route::post('/brand/updateBrand','BrandController@updateBrand');
Route::get('/brand/delete-brand/{id}','BrandController@deleteBrand');



Route::get('/product/add-product','ProductController@addProdct');
Route::post('/product/new-product','ProductController@saveProductInfo');
Route::get('/product/manage-product','ProductController@ManageProductInfo')->middleware('AuthenicateMiddileware');;
Route::get('/product/edit-product/{id}','ProductController@editProductInfo');
Route::post('/product/update-product','ProductController@updateProductInfo');

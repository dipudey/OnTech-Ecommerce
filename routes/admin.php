<?php

//CategoryController Routes
Route::get('category','Admin\CategoryController@index');
Route::get('category/add','Admin\CategoryController@addCategory');
Route::post('category/add/post','Admin\CategoryController@storeCategory');
Route::get('category/edit/{id}','Admin\CategoryController@editCategory');
Route::post('category/update','Admin\CategoryController@updateCategory');
Route::get('category/delete/{id}','Admin\CategoryController@deleteCategory');
/* SubCategory Routes */
Route::get('subcategory','Admin\CategoryController@subcategoryList');
Route::get('subcategory/add','Admin\CategoryController@subcategoryAdd');
Route::post('subcategory/store','Admin\CategoryController@subcategoryStore');
Route::get('subcategory/edit/{id}','Admin\CategoryController@editSubcategory');
Route::post('subcategory/update','Admin\CategoryController@subcategoryUpdate');
Route::get('subcategory/delete/{id}','Admin\CategoryController@deleteSubcategory');

//BrandController Routes
Route::get('brand','Admin\BrandController@index');
Route::get('brand/add','Admin\BrandController@create');
Route::post('brand/add/post','Admin\BrandController@storeBrand');
Route::get('brand/edit/{id}','Admin\BrandController@editBrand');
Route::post('brand/update','Admin\BrandController@updateBrand');
Route::get('brand/delete/{id}','Admin\BrandController@deleteBrand');

//CuponController Routes
Route::get('cupon','Admin\CuponController@index');
Route::get('cupon/add','Admin\CuponController@addCupon');
Route::post('cupon/add/post','Admin\CuponController@cuponStore');
Route::get('cupon/edit/{id}','Admin\CuponController@editCupon');
Route::post('cupon/update','Admin\CuponController@updateCupon');
Route::get('cupon/delete/{id}','Admin\CuponController@deleteCupon');

//ProductController Routes
Route::get('product','Admin\ProductController@index');
Route::get('product/add','Admin\ProductController@create');
Route::post('product/store','Admin\ProductController@store');
/*ajax request to subcategory*/
Route::get('product/subcategory/{id}','Admin\ProductController@findSubcategory');
/*end ajax request to subcategory*/
Route::get('product/view/{id}','Admin\ProductController@view');
Route::get('product/deactive/{id}','Admin\ProductController@deactiveProduct');
Route::get('product/active/{id}','Admin\ProductController@activeProduct');
Route::get('product/edit/{id}','Admin\ProductController@editProduct');
Route::post('product/update','Admin\ProductController@updateProduct');
Route::get('product/delete/{id}','Admin\ProductController@deleteProduct');
Route::get('product/change/multipale/picture/{product_id}','Admin\ProductController@changeMultipalePicture');

//BlogController Routes
Route::get('blog/category','Admin\BlogController@showCategories');
Route::get('blog/category/add','Admin\BlogController@addcategory');
Route::post('blog/category/add/post','Admin\BlogController@storeCategory');
Route::get('blog/category/edit/{id}','Admin\BlogController@editCategory');
Route::post('blog/category/update','Admin\BlogController@updateCategory');
Route::get('blog/category/delete/{id}','Admin\BlogController@deleteCategory');
/* Blog Post Routes */
Route::get('blog/post','Admin\BlogController@showPost');
Route::get('blog/post/add','Admin\BlogController@createPost');
Route::post('blog/post/add/store','Admin\BlogController@storePost');
Route::get('blog/post/view/{id}','Admin\BlogController@viewPost');
Route::get('blog/post/edit/{id}','Admin\BlogController@editPost');
Route::post('blog/update/post',"Admin\BlogController@postUpdated")->name('blog.post.update');
Route::get('blog/post/delete/{id}','Admin\BlogController@deletePost');

// Orders Routes
Route::get('order/new/orders','Admin\OrderController@newOrders');
Route::get('order/accept/payment','Admin\OrderController@acceptPayment')->name('admin.payment.accept');
Route::get('order/prosess/to/delevery','Admin\OrderController@progressDelevery')->name('admin.progress.delevery');
Route::get('order/delevery/success','Admin\OrderController@deleverySuccess')->name('admin.delevery.success');
Route::get('order/cancel','Admin\OrderController@cancelOrder')->name('admin.order.cancel');
Route::get('order/view/{id}','Admin\OrderController@orderView');
Route::get('order/payment/accept/{id}','Admin\OrderController@paymentAccept');
Route::get('order/delevery/process/{id}','Admin\OrderController@deleveryProcess');
Route::get('order/delevery/done/{id}','Admin\OrderController@deleveryDone');
Route::get('order/cancel/{id}','Admin\OrderController@paymentCancel');

//StockController here
Route::get('product/stock','Admin\StockController@stock');
Route::get('/stock/edit/{product_id}','Admin\StockController@editQuantity');
Route::post('/stock/update','Admin\StockController@updateQuantity');

//ReportController here
Route::get('report/today','Admin\ReportController@todayReport');
Route::get('report/month','Admin\ReportController@monthReport');
// Route::get('report/year','Admin\ReportController@yearReport');

//ContactController Routes
Route::get('contact/list',"Admin\ContactController@index");
Route::get('contact/view/{id}','Admin\ContactController@view');
Route::get('contact/seen/{id}','Admin\ContactController@seen');
Route::get('contact/unseen/{id}','Admin\ContactController@unseen');
Route::get('contact/delete/{id}','Admin\ContactController@deleteContact');

//UserController Routes
Route::get('user','Admin\UserController@index');
Route::get('user/add','Admin\UserController@create');
Route::post('user/store','Admin\UserController@store');
Route::get('user/edit/{id}','Admin\UserController@edit');
Route::post('user/update','Admin\UserController@updateUser')->name('user.update');
Route::get("user/delete/{id}",'Admin\UserController@deleteUser');

//SettingController Routes
Route::get('seo','Admin\SettingController@seo');
Route::post('seo/update','Admin\SettingController@seoUpdate');
Route::get('site/setting','Admin\SettingController@siteSetting');
Route::post('site/setting/update','Admin\SettingController@settingUpdate');

//ProfileController Routes
Route::get('profile',"Admin\ProfileController@profile");
Route::get('profile/edit',"Admin\ProfileController@profileEdit");
Route::post('profile/update',"Admin\ProfileController@profileUpdate");
Route::get('change/password',"Admin\ProfileController@changePassword");
Route::post('password/update',"Admin\ProfileController@passwordUpdate");

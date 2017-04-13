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
/*
    Route Client
 */
Route::get('/', function () {
    return view('client.views.index');
});
// ==================== Client ====================================


Route::get('/index',[
    'as'=>'index',
    'uses'=>'PageController@getIndex'
]);
Route::group(['prefix' => 'product-type'],function () {
    Route::get('',[
        'as' => 'product-type',
        'uses' =>'PageController@getProductType'
    ]);
    Route::get('hot',[
        'as' => 'hot',
        'uses' =>'PageController@getProductTypeHot'
    ]);
    Route::get('promotion',[
        'as' => 'promotion',
        'uses' =>'PageController@getProductTypePromotion'
    ]);
});


Route::get('/product-type-detail/{type}',[
    'as' => 'product-type-detail',
    'uses' =>'PageController@getProductTypeDetail'
]);
Route::get('/add-to-cart/{id}',[
    'as'=>'add-to-cart',
    'uses'=>'PageController@getAddToCart'
    ]);
Route::get('/add-to-cart-count/{productId}',[
    'as'=>'add-to-cart-count',
    'uses'=>'PageController@getAddToCartCount'
]);
Route::get('/del-cart/{id}',[
   'as'=>'del-cart',
    'uses'=>'PageController@getDelItemCart'
]);
Route::get('/del-cart-all/{id}',[
    'as'=>'del-cart-all',
    'uses'=>'PageController@getDelAllItemCart'
]);
Route::get('/product/{id}',[
   'as'=>'product',
    'uses'=>'PageController@getProductDetail'
]);

Route::get('/loginCustomer',[
   'as' =>'loginCustomer',
    'uses'=>'PageController@getLogin'
]);

Route::post('/loginCustomer',[
   'as' => 'loginCustomer',
    'uses'=>'PageController@postLogin'
]);

Route::get('signup',[
   'as' =>'signup',
    'uses'=>'PageController@getSignup'
]);
Route::post('signup',[
    'as' =>'signup',
    'uses'=>'PageController@postSignup'
]);
/* route fix trước */
Route::get('checkout',[
    'as' => 'checkout',
    'uses'=>'PageController@getCheckout'
]);
Route::post('checkout',[
    'as' => 'checkout',
    'uses'=>'PageController@postCheckout'
]);
Route::get('checkout2',[
    'as' => 'checkout2',
    'uses'=>'PageController@getCheckoutCustomer'
]);
Route::post('checkout2',[
    'as' => 'checkout2',
    'uses'=>'PageController@postCheckoutCustomer'
]);
Route::get('logoutCustomer',[
    'as'=>'logout',
    'uses'=>'PageController@getLogout'
]);
Route::get('search-a',[
   'as'=>'search-a',
    'uses'=>'PageController@getSearch'
]);

/*
    Route Admin
 */

Route::group(['prefix' => 'admin', 'middleware' => 'adminLogin'], function () {

    /*
    Product
    ----------------------------------------------------------------------------
    */
    Route::get('index', "ProductController@index")->name("admin.index");
    Route::get('product', "ProductController@index")
        ->name("admin.product.list");
    Route::get('/product/add', "ProductController@add")
        ->name("admin.product.add");
    Route::get('/product/edit/{id}', "ProductController@update")
        ->name("admin.product.update");
    Route::get('/product/delete/{id}', "ProductController@destroy")
        ->name("admin.product.delete");
    Route::post('/product/store', "ProductController@store")
        ->name("admin.product.store");
    Route::get('/product/search', "ProductController@search")
        ->name("admin.product.search");


    /*
    Product  Type
    ----------------------------------------------------------------------------
    */
    Route::get('producttype', "ProductTypeController@index")
        ->name("admin.product_type.list");
    Route::get('producttype/add', "ProductTypeController@add")
        ->name("admin.product_type.add");
    Route::post('product_type/store', "ProductTypeController@store")
        ->name("admin.product_type.store");
    Route::get('/product_type/edit/{id}', "ProductTypeController@update")
        ->name("admin.product_type.update");
    Route::get('/product_type/delete/{id}', "ProductTypeController@destroy")
        ->name("admin.product_type.delete");
    Route::get('/producttype/search', "ProductTypeController@search")
        ->name("admin.producttype.search");
    Route::get('producttype/updateajax', "ProductTypeController@updateAjax")
        ->name("admin.product_type.updateajax");

    /*
    User
    ----------------------------------------------------------------------------
    */
    Route::get('user', "UserController@index")->name("admin.user.list");
    Route::get('user/add', "UserController@add")->name("admin.user.add");
    Route::post('user/store', "UserController@store")->name("admin.user.store");
    Route::get('user/edit/{id}', "UserController@update")
        ->name("admin.user.update");
    Route::get('user/delete/{id}', "UserController@destroy")
        ->name("admin.user.delete");
    Route::get('/user/search', "UserController@search")
        ->name("admin.user.search");

    /*
    Customer
    ----------------------------------------------------------------------------
    */
    Route::get('customer', "CustomerController@index")
        ->name("admin.customer.list");
    Route::get('customer/add', "CustomerController@add")
        ->name("admin.customer.add");
    Route::post('customer/store', "CustomerController@store")
        ->name("admin.customer.store");
    Route::get('customer/delete/{id}', "CustomerController@destroy")
        ->name("admin.customer.delete");
    Route::get('/customer/search', "CustomerController@search")
        ->name("admin.customer.search");

    /*
    Order
    ----------------------------------------------------------------------------
    */
    Route::get('order', "OrderController@sum")->name("admin.order.show");
    Route::get('order/list', "OrderController@index")->name("admin.order.list");
    Route::get('order/search', "OrderController@search")
        ->name("admin.order.search");
    Route::post('order/store', "OrderController@store")
        ->name("admin.order.store");
    Route::get('order/edit/{id}', "OrderController@update")
        ->name("admin.order.update");
    Route::get('order/editStatus', "OrderController@editStatus")
        ->name("admin.order.edit");
    Route::get('order/updateStatus', "OrderController@updateStatus")
        ->name("admin.order.updateStatus");
    Route::get('order/change', "OrderController@changeName")
        ->name("admin.order.change");

    /*
    Address
    ----------------------------------------------------------------------------
    */
    Route::get('address/edit/{id}', "AddressController@update")
        ->name("admin.address.update");
    Route::get('address', "AddressController@index")->name("admin.address.list");
    Route::post('address/store', "AddressController@store")
        ->name("admin.address.store");
    Route::get('address/updateajax', "AddressController@updateAjax")->name("admin.address.updateajax");

    /*
    PromotionProduct  Type
    ----------------------------------------------------------------------------
    */
    Route::get('promotion', "PromotionController@index")
        ->name("admin.promotion.list");
    Route::get('promotion/add', "PromotionController@add")
        ->name("admin.promotion.add");
    Route::post('promotion/store', "PromotionController@store")
        ->name("admin.promotion.store");
    Route::get('/promotion/edit/{id}', "PromotionController@update")->name("admin.promotion.update");
    Route::get('/promotion/delete/{id}', "PromotionController@destroy")->name("admin.promotion.delete");
    Route::get('/promotion/search', "PromotionController@search")
        ->name("admin.promotion.search");

     /*
    Slide
    ----------------------------------------------------------------slide------------
    */
    Route::get('slide', "SlideController@index")->name("admin.slide.list");
    Route::get('/slide/add', "SlideController@add")->name("admin.slide.add");
    Route::get('/slide/edit/{id}', "SlideController@update")
        ->name("admin.slide.update");
    Route::get('/slide/delete/{id}', "SlideController@destroy")
        ->name("admin.slide.delete");
    Route::post('/slide/store', "SlideController@store")->name("admin.slide.store");
    Route::get('/slide/edit-slide', "SlideController@updateSlide")
        ->name("admin.slide.updateSlide");
});

Auth::routes();

Route::get('/home', 'HomeController@index');

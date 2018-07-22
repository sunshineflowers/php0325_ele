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
//平台
Route::domain('admin.ele.com')->namespace('Admin')->group(function () {
    #后台用户登录
    Route::any('admin/login', "AdminController@login")->name('admin.login');
    //店铺分类 App\Http\Controllers\Admin
    Route::get('shop_category/index', "ShopCategoryController@index")->name('shop_cate.index');

    //店铺管理
    Route::get('shop/index', "ShopController@index")->name('admin.shop.index');
    //通过审核
    Route::get('shop/changeStatus/{id}', "ShopController@changeStatus")->name('admin.shop.changeStatus');
});

//商户
Route::domain('shop.ele.com')->namespace('Shop')->group(function () {

    # 商家注册
    Route::any('user/reg', "UserController@reg");
    # 商家登录
    Route::any('user/login', "UserController@login")->name('user.login');
    #商家退出
    Route::get('user/logout', "UserController@logout")->name('user.logout');
    //商家首页
    Route::get('user/index', "UserController@index")->name('user.index');

});


<?php

use App\Notifications\Telegram;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Notification;


//Route::get('/admin/login/Erw12sd', function () {
//    return view('auth.login');
//})->name('login');
Route::get('/login', function () {
    return view('auth.login');
})->name('login');
Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//
Route::group(['namespace' => '\App\Http\Controllers\Admin', 'prefix' => 'admin', 'middleware' => 'admin'], function (){

    Route::get('/', IndexController::class)->name('admin.index');

    Route::group(['namespace' => '\App\Http\Controllers\Admin\Profile','prefix' => 'profiles'], function (){

        Route::get('/{profile:slug}', 'ProfileController@index')->name('admin.profiles.index');
        Route::patch('/{profile:slug}/{user}', 'ProfileController@update')->name('admin.profiles.update');
    });

    Route::group(['namespace' => '\App\Http\Controllers\Admin\User', 'prefix' => 'users'], function (){

        Route::get('/', 'UserController@index')->name('admin.users.index');
        Route::get('/create', 'UserController@create')->name('admin.users.create');
        Route::post('/', 'UserController@store')->name('admin.users.store');
    });

    Route::group(['namespace' => '\App\Http\Controllers\Admin\Category', 'prefix' => 'categories'], function (){

        Route::get('/', 'CategoryController@index')->name('admin.categories.index');
        Route::get('/create', 'CategoryController@create')->name('admin.categories.create');
        Route::post('/', 'CategoryController@store')->name('admin.categories.store');
        Route::get('/{category:slug}', 'CategoryController@show')->name('admin.categories.show');
        Route::get('/{category:slug}/edit', 'CategoryController@edit')->name('admin.categories.edit');
        Route::patch('/{category:slug}', 'CategoryController@update')->name('admin.categories.update');
        Route::delete('/{category:slug}', 'CategoryController@destroy')->name('admin.categories.destroy');
    });

    Route::group(['namespace' => '\App\Http\Controllers\Admin\Brand', 'prefix' => 'brands'], function (){

        Route::get('/', 'BrandController@index')->name('admin.brands.index');
        Route::get('/create', 'BrandController@create')->name('admin.brands.create');
        Route::post('/', 'BrandController@store')->name('admin.brands.store');
        Route::get('/{brand:slug}', 'BrandController@show')->name('admin.brands.show');
        Route::get('/{brand:slug}/edit', 'BrandController@edit')->name('admin.brands.edit');
        Route::patch('/{brand:slug}', 'BrandController@update')->name('admin.brands.update');
        Route::delete('/{brand:slug}', 'BrandController@destroy')->name('admin.brands.destroy');

    });

    Route::group(['namespace' => '\App\Http\Controllers\Admin\Tag', 'prefix' => 'tags'], function (){

        Route::get('/', 'TagController@index')->name('admin.tags.index');
        Route::get('/create', 'TagController@create')->name('admin.tags.create');
        Route::post('/', 'TagController@store')->name('admin.tags.store');
        Route::get('/{tag:slug}', 'TagController@show')->name('admin.tags.show');
        Route::get('/{tag:slug}/edit', 'TagController@edit')->name('admin.tags.edit');
        Route::patch('/{tag:slug}', 'TagController@update')->name('admin.tags.update');
        Route::delete('/{tag:slug}', 'TagController@destroy')->name('admin.tags.destroy');

    });

    Route::group(['namespace' => '\App\Http\Controllers\Admin\Product', 'prefix' => 'products'], function (){

        Route::get('/', 'ProductController@index')->name('admin.products.index');
        Route::get('/create', 'ProductController@create')->name('admin.products.create');
        Route::post('/', 'ProductController@store')->name('admin.products.store');
        Route::get('/{product:slug}/edit', 'ProductController@edit')->name('admin.products.edit');
        Route::patch('/{product:slug}', 'ProductController@update')->name('admin.products.update');
        Route::get('/{product:slug}', 'ProductController@show')->name('admin.products.show');

        Route::get('/{product:slug}/{variant_slug}', 'ProductController@variant_show')->name('admin.products.variant_show');
        Route::get('/{product:slug}/{variant_slug}/edit', 'ProductController@variant_edit')->name('admin.products.variant_edit');
        Route::patch('/{product:slug}/{variant_slug}', 'ProductController@variant_update')->name('admin.products.variant_update');
        Route::delete('/{product:slug}', 'ProductController@destroy')->name('admin.products.destroy');
        Route::delete('/{product:slug}/{variant_slug}', 'ProductController@variant_destroy')->name('admin.products.variant_destroy');

        Route::group(['namespace' => '\App\Http\Controllers\Admin\Product\Property', 'prefix' => 'properties'], function (){
            Route::get('/', 'PropertyController@index')->name('admin.properties.index');
            Route::get('/create', 'PropertyController@create')->name('admin.properties.create');
            Route::post('/', 'PropertyController@store')->name('admin.properties.store');
            Route::get('/{property:slug}', 'PropertyController@show')->name('admin.properties.show');
            Route::get('/{property:slug}/edit', 'PropertyController@edit')->name('admin.properties.edit');
            Route::patch('/{property:slug}', 'PropertyController@update')->name('admin.properties.update');
            Route::delete('/{property:slug}', 'PropertyController@destroy')->name('admin.properties.destroy');
        });
    });
//
//    Route::group(['namespace' => '\App\Http\Controllers\Admin\Order', 'prefix' => 'orders'], function (){
//
//        Route::get('/', IndexController::class)->name('orders.index');
////        Route::get('/create', CreateController::class)->name('orders.create');
////        Route::post('/', StoreController::class)->name('orders.store');
//    });
//
});


//Notification::route('telegram', env('TELEGRAM_CHAT_ID'))
//    ->notify(new Telegram);
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

Route::get('seed', function () {
    Artisan::call('migrate',['--seed'=>true]);
});

Route::get('/migrate', function(){
    Artisan::call('migrate');
});

Auth::routes();

Route::group(['namespace'=>'User','as'=>'user.'], function () {
    Route::get('/', 'HomeController@index')->name('home');

    Route::get('category/{id}/posts', 'HomeController@postsByCategory')->name('category.posts');
    Route::get('city/{id}/posts', 'HomeController@postsByCity')->name('city.posts');
    Route::get('search', 'HomeController@postsBySearch')->name('posts.search');

    Route::get('post/{id}/details', 'HomeController@postDetail')->name('post.show');

    Route::group(['middleware'=>['user']], function () {
        Route::resource('post', 'PostController')->except('show');
    });
});

Route::group(['prefix' => 'admin','namespace'=>'Admin','middleware'=>['admin']], function () {
    Route::get('/home', 'HomeController@index')->name('admin.home');

    /**
     * Users routes
     */
    Route::resource('user', 'UserController');

    /**
     * City Routes
     */
    Route::resource('city', 'CityController');

    /**
     * Category Routes
     */
    Route::resource('category', 'CategoryController');

    /**
     * Post routes
     */
    Route::resource('post', 'PostController');

    /**
     * Profile Routes
     */
    Route::get('profile', 'ProfileController@index')->name('profile.index');
    Route::put('profile/update', 'ProfileController@update')->name('profile.update');
});


Route::get('media/posts/{name}', function ($name) {
    $path = storage_path('app/posts/images/'.$name);

    if (file_exists($path)) {
        return response()->download($path, $name, [], 'inline');
    }
    return response("Not Found", 404);
})->name('post.image');

Route::get('media/user/{name}', function ($name) {
    $path = storage_path('app/user/images/'.$name);

    if (file_exists($path)) {
        return response()->download($path, $name, [], 'inline');
    }
    return response("Not Found", 404);
})->name('user.image');

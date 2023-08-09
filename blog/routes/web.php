<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Панель администратора
$groupData = [
    'namespace' => 'App\Http\Controllers\Blog\Admin',
    'prefix' => 'admin/blog',
    'middleware'=>['auth','admin']
];

route::group($groupData, function () {
    $Categorymethods = ['index', 'edit', 'store', 'update', 'create'];
    Route::resource('catogiries', 'CategoryController')->only($Categorymethods)->names('blog.admin.catogiries');
    $Postmethods = ['index', 'edit', 'store', 'update', 'create','destroy'];
    Route::resource('posts', 'PostController')->only( $Postmethods)->names('blog.admin.posts');
});

route::group(['middleware'=>['auth'],'namespace' => 'App\Http\Controllers\Blog\Admin'], function () {
    Route::get('admin/blog/posts/{post}', 'PostController@show')->name('blog.admin.posts.show');
});

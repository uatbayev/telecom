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

Route::get('/', [\App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/page/{id}', [\App\Http\Controllers\PageController::class, 'list'])->name('page');


Route::middleware('guest')->group(function(){
    Route::namespace('Auth')->group(function(){
        Route::get('/signup', [\App\Http\Controllers\Auth\AuthController::class, 'getSignup'])->name('auth.signup');
        Route::post('/signup', [\App\Http\Controllers\Auth\AuthController::class, 'postSignup']);
        Route::get('/signin', [\App\Http\Controllers\Auth\AuthController::class, 'getSignin'])->name('auth.signin');
        Route::post('/signin', [\App\Http\Controllers\Auth\AuthController::class, 'postSignin']);
    });
});
Route::get('/signout', [\App\Http\Controllers\Auth\AuthController::class, 'getSignout'])->name('auth.signout');

Route::group(['prefix'=>'admin', 'middleware'=> ['auth']], function (){
    Route::get('/main', [\App\Http\Controllers\Admin\MainController::class, 'index'])->name('admin.main');
    Route::resource('/tvlist', \App\Http\Controllers\TvlistController::class);
    Route::resource('/servicetype', \App\Http\Controllers\ServicetypeController::class);
    Route::resource('/users', \App\Http\Controllers\Admin\UserController::class);
    Route::resource('/service', \App\Http\Controllers\ServiceController::class);
    Route::get('/servicelist', [\App\Http\Controllers\ServiceController::class, 'service_list'])->name('service_list');
    Route::get('/serviceedit/{user_service_id}', [\App\Http\Controllers\ServiceController::class, 'service_edit'])->name('service_edit');
    Route::post('/serviceeditsave', [\App\Http\Controllers\ServiceController::class, 'service_edit_save'])->name('serviceeditsave');
    Route::get('/servicereport', [\App\Http\Controllers\ServiceController::class, 'service_report'])->name('service_report');
});
Route::group(['middleware'=> ['auth']], function (){
    Route::get('/add_service/{user_id}/{service_id}', [\App\Http\Controllers\PageController::class, 'add_service'])->name('add_service');
    Route::get('/application/{user_id}', [\App\Http\Controllers\PageController::class, 'get_application'])->name('application');

});

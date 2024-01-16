<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;


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

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix' => LaravelLocalization::setLocale(),
    'namespace' => 'App\Http\Controllers\Dashboard'], function() {


    Route::group(['middleware'=>'auth'],function(){

        Route::get('/home', function () {
            return view('Dashboard.index');
        })->name('home');

        Route::resource('user', 'UserController');
        Route::resource('category', 'CategoryController');
        Route::resource('product', 'ProductController');
        Route::get('permission/add/{id}','PermissionController@add')->name('permission.add');
        Route::post('permission/store','PermissionController@store')->name('permission.store');
        Route::resource('client', 'ClientController');
        Route::resource('stock', 'StockController');
        Route::resource('invoice','InvoiceController');






    Route::get('/dashboard', function () {
        return view('Dashboard.index');
    })->middleware(['auth', 'verified'])->name('dashboard');


        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    });

});
require __DIR__ . '/auth.php';

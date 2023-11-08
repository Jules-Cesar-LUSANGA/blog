<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return view('home');
})->name('home');

Route::controller(PostController::class)->prefix('/post')->name('post.')->group(function(){
   Route::get('/all','all')->name('all');

   Route::get('/all/category/{category}','category')->name('category');

   Route::get('/create','create')->name('create');
   Route::post('/create','store')->name('store');

   Route::get('/show/{post:slug}','show')->name('show');
   Route::post('/show/{post:slug}','add_comment')->name('add_comment');

   Route::get('/update/{post:slug}','update')->name('update');
   Route::post('/update/{post:slug}','store_update');
   
   Route::get('/delete/{post:slug}','delete')->name('delete');

});

Auth::routes();

Route::controller(CategoryController::class)->group(function(){
   Route::get('categories','index')->name('category.index');

   Route::post('category','create')->name('category.create');

   Route::get('category/{category}/update','update')->name('category.update');
   Route::post('category/{category}/update','store_update')->name('category.store_update');
});

Route::controller(App\Http\Controllers\HomeController::class)->group(function(){
   Route::get('/home', 'index')->name('home'); 
   Route::get('/about','about')->name('about');  
});

Route::controller(\App\Http\Controllers\ContactController::class)->group(function(){
   Route::post('/about','contact')->name('contact');  
   Route::get('/messages','messages')->name('messages');  
});
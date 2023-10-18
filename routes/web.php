<?php

use App\Http\Controllers\PostController;
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

   Route::get('/create','create')->name('create');
   Route::post('/create','store')->name('store');

   Route::get('/{post}/show','show')->name('show');
   Route::post('/{post}/show','add_comment')->name('add_comment');

   Route::get('/{post}/update','update')->name('update');
   Route::post('/{post}/update','store_update')->name('update');
   
   Route::get('/{post}/delete','delete')->name('delete');

});

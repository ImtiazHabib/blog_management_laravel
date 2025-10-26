<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\SiteController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/',[SiteController::class,'index_page'])->name('index.name');


// post route
Route::get('/manage_post',[PostController::class,'manage_post'])->name('manage_post');
Route::post('/create_post',[PostController::class,'create_post'])->name('create_post');
Route::get('/create_post_page',[PostController::class,'create_post_page'])->name('create_post_page');
Route::get('/manage_store',[PostController::class,'store_post'])->name('post.store');
Route::get('/edit_post/{id}',[PostController::class,'edit_post'])->name('edit_post');
Route::post('/update_post',[PostController::class,'update_post'])->name('update_post');
Route::get('/delete_post/{id}',[PostController::class,'delete_post'])->name('delete_post');

// Authentication 
Route::get('/login_page',[AuthController::class,'login_page'])->name('login_page');
Route::get('/register_page',[AuthController::class,'register_page'])->name('register_page');

Route::post('/register',[AuthController::class,'register'])->name('register');

Route::post('/login',[AuthController::class,'login'])->name('login');
Route::get('/logout',[AuthController::class,'logout'])->name('logout');
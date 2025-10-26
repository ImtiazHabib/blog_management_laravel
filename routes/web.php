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
Route::get('/manage_post',[PostController::class,'manage_post'])->name('post.manage');
Route::get('/manage_create',[PostController::class,'create_post'])->name('post.create');
Route::get('/manage_store',[PostController::class,'store_post'])->name('post.store');
Route::get('/manage_edit',[PostController::class,'edit_post'])->name('post.edit');
Route::get('/manage_update',[PostController::class,'update_post'])->name('post.update');
Route::get('/manage_delete',[PostController::class,'delete_post'])->name('post.delete');

// Authentication 
Route::get('/login_page',[AuthController::class,'login_page'])->name('login_page');
Route::get('/register_page',[AuthController::class,'register_page'])->name('register_page');

Route::post('/register',[AuthController::class,'register'])->name('register');

Route::post('/login',[AuthController::class,'login'])->name('login');
Route::get('/logout',[AuthController::class,'logout'])->name('logout');
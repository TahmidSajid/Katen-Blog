<?php

use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\CommentsController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\UserManagementController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Route::get('/', [\App\Http\Controllers\FrontendController::class,'view'])->name('index');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// *********** Dashboard route Start ***********

/**
 * Get the profile view.
 *
 * Add the user's profile picture.
 *
 * Change the user's name.
 *
 * Change the user's email.
 *
 * Verify the user's OTP.
 */
Route::get('/profile', [App\Http\Controllers\ProfileController::class, 'view'])->name('profile');
Route::post('/profile/picture/add', [App\Http\Controllers\ProfileController::class, 'profile_picture'])->name('profile_picture');
Route::post('/profile/name/change', [App\Http\Controllers\ProfileController::class, 'name_change'])->name('name_change');
Route::post('/profile/email/change', [App\Http\Controllers\ProfileController::class, 'email_change'])->name('email_change');
Route::post('/profile/otp/verify', [App\Http\Controllers\ProfileController::class, 'otp_verify'])->name('otp_verify');



/**
 * Define RESTful resource routes for the CategoryController.
 *
 * This will generate the standard CRUD routes for the given controller.
 */
Route::resource('category', CategoriesController::class);
Route::get('/category/make/showcase/{showcase}/{category_id}', [App\Http\Controllers\CategoriesController::class, 'make_showcase'])->name('make_showcase');


Route::resource('users', UserManagementController::class);

Route::get('/user/list/{role}',[App\Http\Controllers\UserManagementController::class, 'list'])->name('list');
Route::get('/user/list/make/{role}/{id}',[App\Http\Controllers\UserManagementController::class, 'change_role'])->name('change_role');


// *********** Dashboard route Start ***********



// *********** Front end route Start ***********

/**
 * User authentication routes.
 *
 * - 'user/' - Show login view
 * - 'user/register' - Handle user registration
 * - 'user/login' - Handle user login
 * - 'user/logout' - Log user out
 */
Route::get('user/', [App\Http\Controllers\UsersController::class, 'login_view'])->name('login_view');
Route::post('user/register', [App\Http\Controllers\UsersController::class, 'user_register'])->name('user_register');
Route::post('user/login', [App\Http\Controllers\UsersController::class, 'user_login'])->name('user_login');
Route::get('user/logout', [App\Http\Controllers\UsersController::class, 'user_logout'])->name('user_logout');


/**
 * User profile routes.
 *
 * - 'user/profile' - Show user profile view
 * - 'user/picture/add' - Handle user profile picture upload
 * - 'user/name/change' - Handle user name change
 * - 'user/email/change' - Handle user email change
 * - 'user/otp/verify' - Verify OTP for user profile changes
 */
Route::get('user/profile', [App\Http\Controllers\UserProfileController::class, 'user_profile'])->name('user_profile');
Route::post('/user/picture/add', [App\Http\Controllers\UserProfileController::class, 'profile_picture'])->name('user_profile_picture');
Route::post('/user/name/change', [App\Http\Controllers\UserProfileController::class, 'name_change'])->name('user_name_change');
Route::post('/user/email/change', [App\Http\Controllers\UserProfileController::class, 'email_change'])->name('user_email_change');
Route::post('/user/otp/verify', [App\Http\Controllers\UserProfileController::class, 'otp_verify'])->name('user_otp_verify');



Route::resource('post', PostsController::class);
Route::get('post/single/view/{id}', [App\Http\Controllers\PostsController::class, 'single_view'])->name('post_view');
Route::get('post/make/feature/{id}', [App\Http\Controllers\PostsController::class, 'make_feature'])->name('make_feature');
Route::get('post/make/editor/{id}', [App\Http\Controllers\PostsController::class, 'make_editor'])->name('make_editor');
Route::get('post/make/trending/{id}', [App\Http\Controllers\PostsController::class, 'make_trending'])->name('make_trending');
Route::get('post/delete/speciality/{id}', [App\Http\Controllers\PostsController::class, 'delete_speciality'])->name('delete_speciality');


Route::resource('comment' , CommentsController::class);



Route::get('category/post/{category_id}/{category_name}', [App\Http\Controllers\CategoryPostController::class, 'view'])->name('category_post');

Route::get('contact/page',[App\Http\Controllers\ContactController::class, 'view'])->name('contact_page');
Route::post('contact/page/from',[App\Http\Controllers\ContactController::class, 'contact_form'])->name('contact_form');


Route::post('search/',[App\Http\Controllers\SearchController::class, 'search'])->name('search');



Route::get('special/post/{special}',[App\Http\Controllers\SpecialPostController::class, 'view'])->name('special_post');
Route::get('posts/all',[App\Http\Controllers\FrontendController::class, 'post_all'])->name('post_all');


// *********** Front end route End ***********

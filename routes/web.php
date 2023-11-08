<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthenticationController as auth;
use App\Http\Controllers\DashboardController as dash;
use App\Http\Controllers\Settings\UserController as user;
use App\Http\Controllers\Settings\AdminUserController as admin;
use App\Http\Controllers\SettingController as settings;
use App\Http\Controllers\CategoryController as category;
use App\Http\Controllers\PostController as post;
use App\Http\Controllers\FrontendController as frontend;
use App\Http\Controllers\LocalizationController;

/* Middleware */
use App\Http\Middleware\isMember;
use App\Http\Middleware\isAdmin;
use App\Http\Middleware\isOwner;
use App\Http\Middleware\isSalesmanager;
use App\Http\Middleware\isSalesman;

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


Route::get('/', [frontend::class,'home'])->name('home');
Route::get('/home', [frontend::class,'home'])->name('home');
Route::get('/about', [frontend::class,'about'])->name('about');
Route::get('/poem/{id}', [frontend::class,'poem'])->name('single_page');
Route::get('/poem_cat', [frontend::class,'poem_cat'])->name('poem_cat');
Route::get('/login', [auth::class,'signInForm'])->name('login');
Route::get('/register', [auth::class,'signUpForm'])->name('register');
Route::post('/register', [auth::class,'signUpStore'])->name('register.store');
Route::get('/admin', [auth::class,'signInForm'])->name('signIn');
Route::get('/login', [auth::class,'signInForm'])->name('login');
Route::post('/login', [auth::class,'signInCheck'])->name('login.check');
Route::get('/logout', [auth::class,'singOut'])->name('logOut');
Route::get('/language', [LocalizationController::class,'lang_change'])->name('LangChange');

Route::group(['middleware'=>isAdmin::class],function(){
    Route::prefix('admin')->group(function(){
        Route::get('/dashboard', [dash::class,'adminDashboard'])->name('admin.dashboard');
        /* settings */
        Route::resource('users',user::class,['as'=>'admin']);
        Route::resource('admin',admin::class,['as'=>'admin']);


        /* Category */
        Route::resource('category',category::class,['as'=>'admin']);
        /* Post */
        Route::resource('post',post::class,['as'=>'admin']);
    });
});

Route::group(['middleware'=>isOwner::class],function(){
    Route::prefix('owner')->group(function(){
        Route::get('/dashboard', [dash::class,'ownerDashboard'])->name('owner.dashboard');
        Route::resource('users',user::class,['as'=>'owner']);
    });
});

Route::group(['middleware'=>isSalesmanager::class],function(){
    Route::prefix('salesmanager')->group(function(){
        Route::get('/dashboard', [dash::class,'salesmanagerDashboard'])->name('salesmanager.dashboard');

    });
});

Route::group(['middleware'=>isSalesman::class],function(){
    Route::prefix('salesman')->group(function(){
        Route::get('/dashboard', [dash::class,'salesmanDashboard'])->name('salesman.dashboard');

    });
});
Route::group(['middleware'=>isMember::class],function(){
    Route::prefix('member')->group(function(){
        Route::get('/loggedMem', [dash::class,'memDashboard'])->name('member.memdashboard');
    });
});



<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthenticationController as auth;
use App\Http\Controllers\DashboardController as dash;
use App\Http\Controllers\Settings\UserController as user;
use App\Http\Controllers\Settings\AdminUserController as admin;
use App\Http\Controllers\Settings\Location\CountryController as country;
use App\Http\Controllers\Settings\Location\DivisionController as division;
use App\Http\Controllers\Settings\Location\DistrictController as district;
use App\Http\Controllers\Settings\Location\UpazilaController as upazila;
use App\Http\Controllers\Settings\Location\ThanaController as thana;
use App\Http\Controllers\SettingController as settings;
use App\Http\Controllers\Home\HomeArticleController as home;
use App\Http\Controllers\Home\HeaderCardController as HeaderCard;
use App\Http\Controllers\Home\HomeCardController as HomeCard;
use App\Http\Controllers\Home\HeaderArticleController as HeaderArticle;
use App\Http\Controllers\CategoryController as category;
use App\Http\Controllers\PostController as post;
use App\Http\Controllers\LinkController as link;
use App\Http\Controllers\FrontendController as frontend;
use App\Http\Controllers\About\TextController as about;
use App\Http\Controllers\About\CollageTextController as collage;
use App\Http\Controllers\About\CollageSecondController as collageSecond;
use App\Http\Controllers\About\CollageThirdController as collageThird;
use App\Http\Controllers\About\CollageFourController as collageFour;
use App\Http\Controllers\About\MissionController as mission;
use App\Http\Controllers\About\AboutImageController as aboutImage;
use App\Http\Controllers\Footer\ContactController as contact;
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
// Route::get('/app', function () {
//     return view('frontend.app');
// });

// Route::get('/about', function () {
//     return view('frontend.about');
// });

// Route::get('/poem_cat', function () {
//     return view('frontend.poem_cat');
// });
// Route::get('/poem', function () {
//     return view('frontend.poem');
// });
// Route::get('/', function () {
//     return view('frontend.poem');
// });


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
        Route::resource('country',country::class,['as'=>'admin']);
        Route::resource('division',division::class,['as'=>'admin']);
        Route::resource('district',district::class,['as'=>'admin']);
        Route::resource('upazila',upazila::class,['as'=>'admin']);
        Route::resource('thana',thana::class,['as'=>'admin']);
        Route::resource('unit',unit::class,['as'=>'admin']);
       
        /* Home */
        Route::resource('homeArticle',home::class,['as'=>'admin']);
        Route::resource('headerCard',HeaderCard::class,['as'=>'admin']);
        Route::resource('homeCard',HomeCard::class,['as'=>'admin']);
        Route::resource('headerArticle',HeaderArticle::class,['as'=>'admin']);


        /* Category */
        Route::resource('category',category::class,['as'=>'admin']);
        /* Post */
        Route::resource('post',post::class,['as'=>'admin']);


        /* Link */
        Route::resource('link',link::class,['as'=>'admin']);
        /* About Page*/ 
        Route::resource('text',about::class,['as'=>'admin']);
        Route::resource('collage',collage::class,['as'=>'admin']);
        Route::resource('collageSecond',collageSecond::class,['as'=>'admin']);
        Route::resource('collageThird',collageThird::class,['as'=>'admin']);
        Route::resource('collageFour',collageFour::class,['as'=>'admin']);
        Route::resource('mission',mission::class,['as'=>'admin']);
        Route::resource('aboutImage',aboutImage::class,['as'=>'admin']);
        /*  Footer Route */
        Route::resource('contact',contact::class,['as'=>'admin']);
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



<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ResortController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\HomepageController;
use App\Http\Controllers\SubCategoryController;


//homepage resort
 Route::get('/', HomepageController::class)->name('homepage');
// Route::get('/',[FrontendController::class,'index']);

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


//user
Route::group(['middleware' => 'auth'], function() {

    Route::resource('users', UserController::class)->except('esit','update', 'show');

    Route::get('users/{id}/restore', [UserController::class, 'restore'])->name('users.restore');
    Route::get('users/{id}/force-delete', [UserController::class, 'forceDelete'])->name('users.forceDelete');
    Route::resource('categories', CategoryController::class)
    ->except('show');
    Route::resource('sub-categories', SubCategoryController::class)
    ->except('show')
    ->parameters(['sub-categories' => 'subCategory']);
});



//Resort
Route::group(['middleware' => 'auth'], function() {

    Route::resource('resorts', ResortController::class)->except('show');
    
    Route::get('resorts/{id}/restore', [ResortController::class, 'restore'])->name('resorts.restore');
    Route::get('resorts/{id}/force-delete', [ResortController::class, 'forceDelete'])->name('resorts.force-delete');
});



// booking
Route::group(['middleware' => 'auth'], function() {
    Route::get('bookings', [BookingController::class, 'index'])->middleware('auth')->name('bookings.index');
    Route::get('resorts/{resort}/bookings', [BookingController::class, 'create'])->name('bookings.create');
    Route::post('resorts/{resort}/bookings', [BookingController::class, 'store'])->name('bookings.store');
    // Route::post('resorts/{resort}/bookings/destroy', [BookingController::class, 'destroy'])->name('bookings.destroy');
});


//Front-End
Route::get('card', [ResortController::class, 'cards'])->name('resorts.cards');
Route::get('promotion', [FrontendController::class, 'promotions'])->name('resorts.promotions');
Route::get('contact', [FrontendController::class, 'contact'])->name('resorts.contact');
Route::get('onepage', [FrontendController::class, 'onepage'])->name('resorts.onepage');


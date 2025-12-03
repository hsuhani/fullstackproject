<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AdminController;

use App\Http\Controllers\Backend\ReviewController;


Route::get('/home', function () {
    return view('home.index');
});


Route::post('/admin/login', [AdminController::class, 'AdminLogin'])->name('admin.login');

Route::get('/admin/logout', [AdminController::class, 'AdminLogout'])->name('admin.logout');

Route::middleware('auth')->group(function () {

Route::get('/admin/profile', [AdminController::class, 'AdminProfile'])->name('admin.profile');
Route::post('/admin/profile/store', [AdminController::class, 'ProfileStore'])->name('admin.profile.store');

Route::post('/admin/password/update', [AdminController::class, 'PasswordUpdate'])->name('admin.password.update');





});

Route::middleware('auth')->group(function () {
Route::controller(ReviewController::class)->group(function(){
Route::get('/all/review','AllReview')->name('all.review');

Route::get('/add/review','AddReview')->name('add.review');

Route::post('/store/review','storeReview')->name('store.review');
Route::get('/edit/review/{id}','EditReview')->name('edit.review');

Route::post('/update/review','UpdateReview')->name('update.review');

Route::get('/delete/review/{id}','DeleteReview')->name('delete.review');



});

});

Route::get('/dashboard', function () {
    return view('admin.index');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
    
});


Route::get('/verify', [AdminController::class, 'ShowVerification'])->name('custom.verification.form');

Route::post('/verify', [AdminController::class, 'VerificationVerify'])->name('custom.verification.verify');


require __DIR__.'/auth.php';


<?php

use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\ContactUsController;
use App\Http\Controllers\Backend\BlogController;
use App\Http\Controllers\Backend\TrainingController;
use App\Http\Controllers\Backend\HomePageController;
use App\Http\Controllers\Backend\HomepageAdController;
use App\Http\Controllers\Backend\TrainingPageAdController;
use App\Http\Controllers\Backend\CompetitionPageAdController;
use App\Http\Controllers\Backend\MultipleAdController;

// All route names are prefixed with 'admin.'.
Route::redirect('/', '/admin/dashboard', 301);
Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::get('homepage', [HomePageController::class, 'index'])->name('homepage.index');
Route::post('homepage/store', [HomePageController::class, 'store'])->name('homepage.store');
Route::get('homepage/getdetails', [HomePageController::class, 'getdetails'])->name('homepage.getdetails');
Route::get('homepage/edit/{id}', [HomePageController::class, 'edit'])->name('homepage.edit');
Route::post('homepage/update', [HomePageController::class, 'update'])->name('homepage.update');
Route::get('homepage/delete/{id}', [HomePageController::class, 'destroy'])->name('homepage.destroy');

Route::get('contact_us', [ContactUsController::class, 'index'])->name('contact_us.index');
Route::get('contact_us/getdetails', [ContactUsController::class, 'getDetails'])->name('contact_us.getDetails');
Route::get('contact_us/edit/{id}', [ContactUsController::class, 'edit'])->name('contact_us.edit');
Route::post('contact_us/update', [ContactUsController::class, 'update'])->name('contact_us.update');
Route::get('contact_us/delete/{id}', [ContactUsController::class, 'destroy'])->name('contact_us.destroy');

Route::get('training', [TrainingController::class, 'index'])->name('training.index');
Route::get('training/getdetails', [TrainingController::class, 'getDetails'])->name('training.getDetails');
Route::get('training/edit/{id}', [TrainingController::class, 'edit'])->name('training.edit');
Route::post('training/update', [TrainingController::class, 'update'])->name('training.update');
Route::get('training/delete/{id}', [TrainingController::class, 'destroy'])->name('training.destroy');

Route::get('blog', [BlogController::class, 'index'])->name('blog.index');
Route::get('blog/create', [BlogController::class, 'create'])->name('blog.create');
Route::post('blog/store', [BlogController::class, 'store'])->name('blog.store');
Route::get('blog/getdetails', [BlogController::class, 'getdetails'])->name('blog.getdetails');
Route::get('blog/edit/{id}', [BlogController::class, 'edit'])->name('blog.edit');
Route::post('blog/update', [BlogController::class, 'update'])->name('blog.update');
Route::get('blog/delete/{id}', [BlogController::class, 'destroy'])->name('blog.destroy');



Route::get('advertisement', [HomepageAdController::class, 'index'])->name('advertisement.index');

Route::post('homepage_ad/store', [HomepageAdController::class, 'store_home'])->name('homepage_ad.store');
Route::post('homepage_ad/update', [HomepageAdController::class, 'update_home'])->name('homepage_ad.update');
Route::get('homepage_ad/delete/{id}', [HomepageAdController::class, 'delete_home'])->name('homepage_ad.delete');

Route::post('training_ad/store', [TrainingPageAdController::class, 'store_training'])->name('training_ad.store');
Route::post('training_ad/update', [TrainingPageAdController::class, 'update_training'])->name('training_ad.update');
Route::get('training_ad/delete/{id}', [TrainingPageAdController::class, 'delete_training'])->name('training_ad.delete');


Route::post('competition_ad/store', [CompetitionPageAdController::class, 'store_competition'])->name('competition_ad.store');
Route::post('competition_ad/update', [CompetitionPageAdController::class, 'update_competition'])->name('competition_ad.update');
Route::get('competition_ad/delete/{id}', [CompetitionPageAdController::class, 'delete_competition'])->name('competition_ad.delete');






Route::post('multiple_left/store', [MultipleAdController::class, 'multiple_left_store'])->name('multiple_left.store');
Route::post('multiple_left/update', [MultipleAdController::class, 'multiple_left_update'])->name('multiple_left.update');
Route::get('multiple_left/delete/{id}', [MultipleAdController::class, 'multiple_left_delete'])->name('multiple_left.delete');

Route::post('multiple_right/store', [MultipleAdController::class, 'multiple_right_store'])->name('multiple_right.store');
Route::post('multiple_right/update', [MultipleAdController::class, 'multiple_right_update'])->name('multiple_right.update');
Route::get('multiple_right/delete/{id}', [MultipleAdController::class, 'multiple_right_delete'])->name('multiple_right.delete');

Route::post('multiple_middle_top/store', [MultipleAdController::class, 'multiple_middle_top_store'])->name('multiple_middle_top.store');
Route::post('multiple_middle_top/update', [MultipleAdController::class, 'multiple_middle_top_update'])->name('multiple_middle_top.update');
Route::get('multiple_middle_top/delete/{id}', [MultipleAdController::class, 'multiple_middle_top_delete'])->name('multiple_middle_top.delete');

Route::post('multiple_middle_bottom/store', [MultipleAdController::class, 'multiple_middle_bottom_store'])->name('multiple_middle_bottom.store');
Route::post('multiple_middle_bottom/update', [MultipleAdController::class, 'multiple_middle_bottom_update'])->name('multiple_middle_bottom.update');
Route::get('multiple_middle_bottom/delete/{id}', [MultipleAdController::class, 'multiple_middle_bottom_delete'])->name('multiple_middle_bottom.delete');
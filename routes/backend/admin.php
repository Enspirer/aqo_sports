<?php

use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\ContactUsController;
use App\Http\Controllers\Backend\BlogController;
use App\Http\Controllers\Backend\TrainingController;

// All route names are prefixed with 'admin.'.
Route::redirect('/', '/admin/dashboard', 301);
Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

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



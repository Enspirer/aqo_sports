<?php

use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\ContactController;
use App\Http\Controllers\Frontend\User\AccountController;
use App\Http\Controllers\Frontend\User\ProfileController;
use App\Http\Controllers\Frontend\User\DashboardController;
use App\Http\Controllers\Frontend\User\MyCompetitionController;
use App\Http\Controllers\Frontend\User\PendingController;
use Modules\Competition\Http\Controllers\Frontend\MyJudgmentController;
/*
 * Frontend Controllers
 * All route names are prefixed with 'frontend.'.
 */
Route::get('/', [HomeController::class, 'index'])->name('index');
Route::get('contact', [ContactController::class, 'index'])->name('contact');
Route::post('contact/send', [ContactController::class, 'send'])->name('contact.send');

/*
 * These frontend controllers require the user to be logged in
 * All route names are prefixed with 'frontend.'
 * These routes can not be hit if the password is expired
 */
Route::group(['middleware' => ['auth', 'password_expires']], function () {
    Route::group(['namespace' => 'User', 'as' => 'user.'], function () {
        // User Dashboard Specific
        Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

        Route::get('my_competition', [MyCompetitionController::class, 'index'])->name('my_competition');
        Route::get('my_competition/details/{id}', [MyCompetitionController::class, 'performance_page'])->name('performance_page');
        Route::post('my_competition/performance', [MyCompetitionController::class, 'postPerformance'])->name('postPerformance');
        Route::get('my_competition/details_pending', [PendingController::class, 'pending_competition'])->name('details_pending');

        Route::post('my_competition/save_proformance', [MyCompetitionController::class, 'save_performance'])->name('save_performance');

        Route::get('my_judgement', [MyJudgmentController::class, 'index'])->name('details_judgement');
        Route::get('open_judgment/{id}', [MyJudgmentController::class, 'show'])->name('show_judgment');
        Route::get('viewCompetitor/{id}', [MyJudgmentController::class, 'viewCompetitor'])->name('show_competitor');
        Route::post('add_marks_judge', [MyJudgmentController::class, 'add_marks_judge'])->name('add_marks_judge');


        // User Account Specific
        Route::get('account', [AccountController::class, 'index'])->name('account');

        // User Profile Specific
        Route::patch('profile/update', [ProfileController::class, 'update'])->name('profile.update');
    });
});

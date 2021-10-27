<?php

use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\ContactController;
use App\Http\Controllers\Frontend\User\AccountController;
use App\Http\Controllers\Frontend\User\ProfileController;
use App\Http\Controllers\Frontend\User\DashboardController;
use App\Http\Controllers\Frontend\User\MyCompetitionController;
use App\Http\Controllers\Frontend\User\PendingController;
use Modules\Competition\Http\Controllers\Frontend\MyJudgmentController;
use Modules\Competition\Http\Controllers\Frontend\CreateEvenetController;
use Modules\Competition\Http\Controllers\Frontend\MyTeamController;
use Modules\Competition\Http\Controllers\Frontend\LeaderBoardController;
use App\Http\Controllers\Frontend\AboutController;
use App\Http\Controllers\Frontend\TermsController;
/*
 * Frontend Controllers
 * All route names are prefixed with 'frontend.'.
 */
Route::get('/', [HomeController::class, 'index'])->name('index');
Route::get('about-us', [AboutController::class, 'index'])->name('about_us');
Route::get('terms-and-conditions', [TermsController::class, 'index'])->name('terms_and_conditions');
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

        Route::get('create_event/register_as_organizer', [CreateEvenetController::class, 'index'])->name('register_as_organizer');
        Route::post('create_event/register_as_organizer_store', [CreateEvenetController::class, 'store'])->name('reuqst_organizer');
        Route::get('create_event/orz_create_competition', [CreateEvenetController::class, 'create_competition'])->name('orz_create_competition');
        Route::post('create_event/create_competition_orz', [CreateEvenetController::class, 'orz_create_competition_store'])->name('orz_create_competition_store');

        Route::get('create_event/edit_competition/{id}', [CreateEvenetController::class, 'orz_edit_competition'])->name('orz_edit_competition');
        Route::post('create_event/edit_competition_update', [CreateEvenetController::class, 'edit_competition_update'])->name('edit_competition_update');
        Route::get('create_event/destroy_competition/{id}', [CreateEvenetController::class, 'destroy'])->name('destroy_competition');
        Route::get('create_event/edit_judge_form/{id}', [CreateEvenetController::class, 'edit_judge_form'])->name('edit_judge_form');
        Route::post('create_event/edit_judge_form_update', [CreateEvenetController::class, 'edit_judge_form_update'])->name('edit_judge_form_update');

        Route::get('create_event/judges_list/{competition_id}', [CreateEvenetController::class, 'judges_list'])->name('judges_list');
        Route::get('create_event/judges_list_Details/{competition_id}', [CreateEvenetController::class, 'judgeRequetDetails'])->name('judgeRequetDetails');
        Route::get('create_event/judges_list/delete/{id}', [CreateEvenetController::class, 'judge_delete'])->name('judge_delete');
        Route::get('create_event/judges_list/show/{id}', [CreateEvenetController::class, 'judge_show'])->name('judge_show');
        Route::post('create_event/judges_list/update', [CreateEvenetController::class, 'judge_status'])->name('judge_status');

        Route::get('create_event/competitors_list/{competition_id}', [CreateEvenetController::class, 'competitors_list'])->name('competitors_list');
        Route::get('create_event/competitors_list_Details/{competition_id}', [CreateEvenetController::class, 'competitorsRequetDetails'])->name('competitorsRequetDetails');
        Route::get('create_event/competitors_list/delete/{id}', [CreateEvenetController::class, 'competitor_delete'])->name('competitor_delete');
        Route::get('create_event/competitors_list/show/{id}', [CreateEvenetController::class, 'competitor_show'])->name('competitor_show');
        Route::post('create_event/competitors_list/update', [CreateEvenetController::class, 'competitor_status'])->name('competitor_status');

        Route::get('my_competition', [MyCompetitionController::class, 'index'])->name('my_competition');
        Route::get('my_competition/details/{id}', [MyCompetitionController::class, 'performance_page'])->name('performance_page');
        Route::post('competition/performance', [MyCompetitionController::class, 'postPerformance'])->name('postPerformance');
        Route::get('pending_competition/details_pending', [PendingController::class, 'pending_competition'])->name('details_pending');
        Route::post('competition/save_proformance', [MyCompetitionController::class, 'save_performance'])->name('save_performance');
        Route::get('my_judgement', [MyJudgmentController::class, 'index'])->name('details_judgement');
        Route::get('my_judgement/open_judgment/{id}', [MyJudgmentController::class, 'show'])->name('show_judgment');
        Route::get('viewCompetitor/{id}', [MyJudgmentController::class, 'viewCompetitor'])->name('show_competitor');
        Route::post('add_marks_judge', [MyJudgmentController::class, 'add_marks_judge'])->name('add_marks_judge');

        Route::get('my_team', [MyTeamController::class, 'index'])->name('my_team');
        Route::get('my_leader_board', [MyTeamController::class, 'index'])->name('my_leader_board');


        // User Account Specific
        Route::get('account', [AccountController::class, 'index'])->name('account');
        // User Profile Specific
        Route::patch('profile/update', [ProfileController::class, 'update'])->name('profile.update');
    });
});

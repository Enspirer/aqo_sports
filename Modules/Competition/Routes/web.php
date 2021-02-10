<?php

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

Route::prefix('competition')->group(function() {

    /*
 * Frontend Routes
 * Namespaces indicate folder structure
 */
    Route::group(['namespace' => 'Frontend', 'as' => 'frontend.'], function () {
        include_route_files(__DIR__.'/frontend/');
    });

    /*
     * Backend Routes
     * Namespaces indicate folder structure
     */
    Route::group(['namespace' => 'Backend', 'prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'admin'], function () {
        /*
         * These routes need view-backend permission
         * (good if you want to allow more than one group in the backend,
         * then limit the backend features by different roles or permissions)
         *
         * Note: Administrator has all permissions so you do not have to specify the administrator role everywhere.
         * These routes can not be hit if the password is expired
         */
        include_route_files(__DIR__.'/backend/');
    });
});


Breadcrumbs::for('admin.competition', function ($trail) {
    $trail->push('Competitions', route('admin.competition'));
});


Breadcrumbs::for('admin.competition.create', function ($trail) {
    $trail->push('Create Competition', route('admin.competition.create'));
});

Breadcrumbs::for('admin.competition.edit', function ($trail) {
    $trail->push('Edit Competition', route('admin.competition.edit',1));
});


Breadcrumbs::for('admin.category.index', function ($trail) {
    $trail->push('Categories', route('admin.category.index'));
});

Breadcrumbs::for('admin.category.create', function ($trail) {
    $trail->push('Create Categories', route('admin.category.create'));
});


Breadcrumbs::for('admin.category.edit', function ($trail) {
    $trail->push('Edit Categories', route('admin.category.edit',1));
});


Breadcrumbs::for('admin.competitior.index', function ($trail) {
    $trail->push('View Competitor', route('admin.competitior.index',1));
});

Breadcrumbs::for('admin.competitior.show', function ($trail) {
    $trail->push('Competition Details', route('admin.competitior.show',1));
});

Breadcrumbs::for('admin.competition.register_judge.edit', function ($trail) {
    $trail->push('', route('admin.competition.register_judge.edit',1));
});







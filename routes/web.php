<?php


use Illuminate\Support\Facades\Route;

Auth::routes();
//Route::get('register', function () {
//    return redirect('login');
//});
/**
 * Home page
 */
Route::get('/', 'HomeController@index')->name('home');
//Trans
Route::get('/translate/{locale}', 'HomeController@translate')->name('translate');
/**
 * Set user info
 */

Route::get('/register', 'RegisterController@index')->name('register');
Route::post('/register/set-info', 'RegisterController@setInfo')->name('register.set.info');

/**
 * Test
 */

Route::get('/step/{id}', 'StepController@index')->name('step');
Route::post('/step/{id}/set-info', 'StepController@setInfo')->name('step.set.info');
Route::get('/hero', 'StepController@hero')->name('step.hero');
Route::get('/great-job', 'StepController@greatJob')->name('step.great-job');
Route::get('/finish', 'StepController@finish')->name('step.finish');

/**
 * Admin routes
 */
Route::group([
    'prefix' => 'admin',
    'middleware' => ['auth']
], function () {

    /**
     * Home page
     */
    Route::get('/', 'AdminController@index')->name('admin.index');

    /**
     * Export results
     */
    Route::post('/export', 'AdminController@csv_export')->name('admin.ratings.export');

    /**
     * Schools
     */
    Route::group([
        'prefix' => 'schools'
    ], function () {
        Route::get('/list', 'AdminController@list')->name('admin.schools.list');
        Route::get('/add', 'AdminController@add')->name('admin.schools.add');
        Route::get('/delete/{school}', 'AdminController@delete')->name('admin.schools.delete');
        Route::post('/add-schools', 'AdminController@store')->name('admin.store');
    });

    /**
     * Questions
     */
    Route::resource('questions', 'QuestionController')->middleware('auth');

    /**
     * Answers
     */
    Route::resource('answers', 'AnswersController');
});

Route::get('home', function () {
    return redirect('admin');
});

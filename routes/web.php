<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\mailSurvey;
use App\Http\Controllers\surveyController;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\URL;

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

Route::get('/', function () {
    return view('homepage');
})->name('home');

Route::middleware('auth')->group(function(){

    Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard');
    Route::post('mail.survey', [mailSurvey::class, 'sendmail'])->name('mail.survey');
    Route::post('/dashboard',[HomeController::class, 'show'])->name('survey.create');
    Route::get('surveycreatedemo', [surveyController::class, 'create'])->name('survey.createdemo');
    Route::post('surveyview/{surveyid?}', [surveyController::class, 'view'])->name('survey.view');
    Route::post('surveytestdemo', [surveyController::class, 'testdemo'])->name('survey.dosurvey');
    Route::delete('surveydelete', [surveyController::class, 'delete'])->name('survey.delete');
    Route::get('surveytotest', [surveyController::class, 'toTesting'])->name('survey.testing');
});

Route::post('surveystore', [surveyController::class, 'storeSurveyAnswer'])->name('survey.store');
Route::get('/survey/{surveyid}', [surveyController::class, 'index'])->name('survey');
require __DIR__.'/auth.php';

//Templates Routes
Route::get('/templates', [App\Http\Controllers\Templates::class,'TempOptions'])->name('TempOptions');
Route::post('/selectTemplates', [App\Http\Controllers\Templates::class,'selectTemplates'])->name('selectTemplates');
Route::post('/storeTemplateChoice', [App\Http\Controllers\Templates::class,'storeUserTemplate'])->name('storeUserTemplate');

Route::view('home','homepage');
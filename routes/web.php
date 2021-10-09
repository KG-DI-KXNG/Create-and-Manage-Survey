<?php

use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');


Route::get('surveycreate', [App\Http\Controllers\surveyController::class, 'index'])->name('survey.create');
Route::get('surveycreatedemo', [App\Http\Controllers\surveyController::class, 'create'])->name('survey.createdemo');
Route::get('surveyview', [App\Http\Controllers\surveyController::class, 'view'])->name('survey.view');
Route::post('surveytestdemo', [App\Http\Controllers\surveyController::class, 'testdemo'])->name('survey.dosurvey');
Route::get('surveytotest', [App\Http\Controllers\surveyController::class, 'toTesting'])->name('survey.testing');
Route::post('surveystore', [App\Http\Controllers\surveyController::class, 'storeSurveyAnswer'])->name('survey.store');

require __DIR__.'/auth.php';

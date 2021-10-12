<?php

use App\Http\Controllers\HomeController;
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
    return view('welcome');
});

Route::get('/dashboard', [HomeController::class, 'index'])->middleware(['auth'])->name('dashboard');

Route::post('/dashboard',[HomeController::class, 'show'])->name('survey.create');
// Route::get('surveycreate', [App\Http\Controllers\surveyController::class, 'index'])->name('survey.create');
Route::get('surveycreatedemo', [App\Http\Controllers\surveyController::class, 'create'])->name('survey.createdemo');
Route::post('surveyview/{surveyid?}', [App\Http\Controllers\surveyController::class, 'view'])->name('survey.view');
Route::post('surveytestdemo', [App\Http\Controllers\surveyController::class, 'testdemo'])->name('survey.dosurvey');
Route::delete('surveydelete', [App\Http\Controllers\surveyController::class, 'delete'])->name('survey.delete');
Route::get('surveytotest', [App\Http\Controllers\surveyController::class, 'toTesting'])->name('survey.testing');
Route::post('surveystore', [App\Http\Controllers\surveyController::class, 'storeSurveyAnswer'])->name('survey.store');

// route::get('/trial/{$id?}', function($id = null){
//     if ($id == null){
//         return redirect()->back();
//     }
//     $url = URL::signedRoute('survey', ['surveyId' => $id]);
// });

Route::get('/survey/{surveyid}', function (Request $request) {
    dd($request);

    // ...
})->name('survey');

// Route::view('live', 'Survey.createForm');
require __DIR__.'/auth.php';

//Templates Routes
Route::get('/Templates', [App\Http\Controllers\Templates::class,'TempOptions'])->name('TempOptions');
Route::post('/selectTemplates', [App\Http\Controllers\Templates::class,'selectTemplates'])->name('selectTemplates');
Route::post('/storeTemplateChoice', [App\Http\Controllers\Templates::class,'storeUserTemplate'])->name('storeUserTemplate');

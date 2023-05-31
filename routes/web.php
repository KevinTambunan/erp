<?php

use App\Http\Controllers\PagesController;
use Illuminate\Support\Facades\Auth;
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
Route::get('/', [PagesController::class, 'welcome']);
// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/feedback_user', [App\Http\Controllers\PagesController::class, 'feedback_user']);
Route::get('/faq_user', [App\Http\Controllers\PagesController::class, 'faq_user']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['auth'])->group(function () {
    // profile
    Route::get('/profile', [App\Http\Controllers\PagesController::class, 'profile']);

    // company
    Route::get('/company', [App\Http\Controllers\CompanyController::class, 'index']);
    Route::get('/company/create', [App\Http\Controllers\CompanyController::class, 'create']);
    Route::get('/company/edit/{id}', [App\Http\Controllers\CompanyController::class, 'edit']);
    Route::post('/company/store', [App\Http\Controllers\CompanyController::class, 'store']);
    Route::post('/company/update/{id}', [App\Http\Controllers\CompanyController::class, 'update']);
    Route::post('/company/destroy/{id}', [App\Http\Controllers\CompanyController::class, 'destroy']);

    // owner
    Route::get('/owner', [App\Http\Controllers\OwnerController::class, 'index']);
    Route::get('/owner/create', [App\Http\Controllers\OwnerController::class, 'create']);
    Route::get('/owner/edit/{id}', [App\Http\Controllers\OwnerController::class, 'edit']);
    Route::post('/owner/store', [App\Http\Controllers\OwnerController::class, 'store']);
    Route::post('/owner/update/profile/{id}', [App\Http\Controllers\OwnerController::class, 'updateProfile']);
    Route::post('/owner/update/{id}', [App\Http\Controllers\OwnerController::class, 'update']);
    Route::post('/owner/destroy/{id}', [App\Http\Controllers\OwnerController::class, 'destroy']);


    // erp
    Route::get('/erp/{id}', [App\Http\Controllers\ErpController::class, 'index']);
    Route::get('/erp-history', [App\Http\Controllers\ErpController::class, 'erp_history']);
    Route::get('/erp-usage', [App\Http\Controllers\ErpController::class, 'erp_usage']);
    Route::get('/erp-recomendation', [App\Http\Controllers\ErpController::class, 'erp_recomendation']);
    Route::post('/erp-recomendation/respon', [App\Http\Controllers\ErpController::class, 'respon']);
    // Route::get('/erp-recomendation/respon/{id}/{odoo}/{dolibar}/{sap}', [App\Http\Controllers\ErpController::class, 'result']);

    // faq
    Route::get('/faq', [App\Http\Controllers\QuestionController::class, 'index']);

    // feedback
    Route::get('/feedback', [App\Http\Controllers\FeedbackController::class, 'index']);
    Route::post('/feedback/create', [App\Http\Controllers\FeedbackController::class, 'store']);


});

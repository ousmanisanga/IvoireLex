<?php

use App\Http\Controllers\LoiController;
use App\Http\Controllers\ReferenceController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\LogoutController;
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

Route::get('/login', [AuthController::class, 'login'])->name('auth.login');
Route::post('/login', [AuthController::class, 'doLogin']);


Route::get('/', function () {
    return view('welcome');
})->name('index');
Route::post('law/search', [LoiController::class, 'searchRequest'])->name('law.searchRequest');


Route::controller(LoiController::class)->group(function()   {
    Route::get('home', 'index')->name('lois.index');
    Route::get('lois/search', 'search')->name('lois.search');
    Route::get('lois/{numeroLoi}', 'show')->name('lois.show');
    Route::post('/lois', 'storeLoi')->name('lois.store');
    Route::get('/uploadFile/{fichier}', 'telechargerFichier')->name('lois.telechargerFichier');
    Route::get('lois/error', 'show')->name('lois.error');
});

Route::controller(ReferenceController::class)->group( function() {
    Route::post('/references/{id}', 'update')->name('references.update');
    Route::get('/references/{id}/edit', 'edit')->name('references.edit');
    Route::post('/references', 'store')->name('references.store');
});

Route::controller(UserController::class)->group( function() {
    Route::get('/users', 'index')->name('users.index');
    Route::get('/users/create', 'create')->name('users.create');
    Route::post('/users/store', 'store')->name('users.store');
});

Route::middleware(['auth'])->group(function () {
    Route::controller(ReferenceController::class)->group( function() {
        Route::get('/references/{id}/create', 'create')->name('references.create');
    });
    Route::get('law/create', [LoiController::class, 'createLaw'])->name('law.create');

    Route::controller(UserController::class)->group( function() {
        Route::get('/users', 'index')->name('users.index');
        Route::get('/users/create', 'create')->name('users.create');
        Route::post('/users/store', 'store')->name('users.store');
    });
    Route::get('logout', [logoutController::class, 'logout'])->name('logout');


});

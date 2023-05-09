<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', 'App\Http\Controllers\Auth\LoginController@showLoginForm')->name('login');

Auth::routes();

Route::get('/secteur', [App\Http\Controllers\SecteurController::class, 'showAll'])->name('secteur');
Route::get('/region', [App\Http\Controllers\RegionController::class, 'showAll'])->name('region');
Route::get('/visiteur', [App\Http\Controllers\VisiteurController::class, 'showAll'])->name('visiteur');
Route::get('/prime');
//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/home/{secteur?}/{region?}/{visiteur?}', [App\Http\Controllers\HomeController::class, 'show'])->name('home');

Route::get('/home/{secteur}/{region}/{visiteur}/add',[App\Http\Controllers\VisiteurController::class, 'showForm'])->name('formAddPrime');
Route::post('/home/{secteur}/{region}/{visiteur}/add',[App\Http\Controllers\VisiteurController::class, 'storePrime'])->name('storeAddPrime');

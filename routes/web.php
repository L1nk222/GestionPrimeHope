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
//Route::get('/region', [App\Http\Controllers\RegionController::class, 'showAll'])->name('region');
Route::get('/visiteur', [App\Http\Controllers\VisiteurController::class, 'showAll'])->name('visiteur');
Route::get('/prime');
//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware('redirect.user')->group(function (){
    Route::get('/home/{secteur?}/{region?}/{visiteur?}', [App\Http\Controllers\HomeController::class, 'show'])
    ->where(['visiteur'=>'[0-9]+'])
    ->name('home');

    // Route::get('/region/{visiteur?}',[App\Http\Controllers\HomeController::class, 'show'])->name('homeDelegue');

    //route pour ajouter une prime
    Route::get('/home/{secteur}/{region}/{visiteur}/add',[App\Http\Controllers\VisiteurController::class, 'showForm'])->name('formAddPrime');
    Route::post('/home/{secteur}/{region}/{visiteur}/add',[App\Http\Controllers\VisiteurController::class, 'storePrime'])->name('storeAddPrime');

    //route pour modifier une prime
    Route::get('/home/{secteur}/{region}/{visiteur}/{prime}/update',[App\Http\Controllers\VisiteurController::class, 'updatePrimeForm'])
    ->where(['prime'=>'[0-9]+'])->name('updatePrimeForm');
    Route::post('/home/{secteur}/{region}/{visiteur}/{prime}/update',[App\Http\Controllers\VisiteurController::class, 'updatePrimeStore'])
    ->where(['prime'=>'[0-9]+'])->name('updatePrimeStore');

    //route pour supprimer une prime
    Route::get('/home/{secteur}/{region}/{visiteur}/{prime}/delete',[App\Http\Controllers\VisiteurController::class, 'showFormDeletePrime'])
    ->where(['prime'=>'[0-9]+'])->name('deletePrimeForm');
    Route::post('/home/{secteur}/{region}/{visiteur}/{prime}/delete',[App\Http\Controllers\VisiteurController::class, 'DeletePrime'])
    ->where(['prime'=>'[0-9]+'])->name('deletePrimeStore');

    //route pour ajouter un visiteur
    Route::get('/home/{secteur}/{region}/add',[App\Http\Controllers\RegionController::class, 'showFormNewUser'])->name('newUserForm');
    Route::post('/home/{secteur}/{region}/add',[App\Http\Controllers\RegionController::class, 'StoreUser'])->name('newUserStore');

    //route pour modifier un visiteur
    Route::get('/home/{secteur}/{region}/{visiteur}/update',[App\Http\Controllers\RegionController::class, 'showFormUpdateUser'])->name('updateUserForm');
    Route::post('/home/{secteur}/{region}/{visiteur}/update',[App\Http\Controllers\RegionController::class, 'StoreUpdateUser'])->name('updateUserStore');

    //Route pour supprimer un visiteur
    Route::get('/home/{secteur}/{region}/{visiteur}/delete',[App\Http\Controllers\RegionController::class,'showFormDeleteUser'])->name('deleteUserForm');
    Route::post('/home/{secteur}/{region}/{visiteur}/delete',[App\Http\Controllers\RegionController::class,'deleteUser'])->name('deleteUserStore');

    // Route::get('/home/{secteur?}/{region?}/{visiteur?}/',[App\Http\Controllers\HomeController::class, 'recherche'])
    // ->where(request()->has('term'))
    // ->name('recherche');
});

//Route par défaut des visiteurs
Route::get('/visiteurPrime',[App\Http\Controllers\VisiteurController::class, 'showVisiteurPrime'])->name('VisiteurPrime');


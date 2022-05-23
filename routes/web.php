<?php

use App\Http\Controllers\Admin\categoriecontroller;
use App\Http\Controllers\Admin\produitcontroller;
use App\Http\Controllers\commandecontroller;
use App\Http\Controllers\frontend\frontendcontroller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\souhaitcontroller;

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

Route::get('/',[frontendcontroller::class,'index']);
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware' => ['auth','isAdmin']], function () {
    Route::get('formcat',[categoriecontroller::class,'form'])->name('formcat');
    Route::post('insert-categorie',[categoriecontroller::class,'insert'])->name('insert-categorie');
    Route::get('showcategorie',[categoriecontroller::class,'showcategorie'])->name('showcategorie');
    Route::get('edter-categorie/{id}',[categoriecontroller::class,'editercategorie'])->name('editer-categorie');
    Route::post('update-categorie/{id}',[categoriecontroller::class,'update'])->name('update-categorie');
    Route::get('delete-categorie/{id}',[categoriecontroller::class,'deletecategorie'])->name('delete-categorie');

    Route::get('formprod',[produitcontroller::class,'form'])->name('formprod');
    Route::post('insert-produit',[produitcontroller::class,'insert'])->name('insert-produit');
    Route::get('showproduit',[produitcontroller::class,'showproduit'])->name('showproduit');


    Route::get('edite-produit/{id}',[produitcontroller::class,'edite'])->name('edite-produit');

    Route::post('update-produit/{id}',[produitcontroller::class,'update'])->name('update-produit');

 });

 Route::post('addto-cat',[frontendcontroller::class,'enregistrement_catalog'])->name('addto-cat');

 Route::post('addto-souhait',[souhaitcontroller::class,'addtosouhait'])->name('addto-souhait');
Route::get('mycart',[frontendcontroller::class,'mycart'])->name('mycart');

Route::get('filtrecategorie/{id}',[frontendcontroller::class,'filtrecategorie'])->name('filtrecategorie');

Route::get('description/{categorie}/{produit}',[frontendcontroller::class,'description'])->name('description');

Route::post('update-tocat',[frontendcontroller::class,'updatecat'])->name('update-tocat');

Route::post('deleteto-cat',[frontendcontroller::class,'supprimerproduit'])->name('deleteto-cat');
Route::get('finaliser',[commandecontroller::class,'formcmd'])->name('finaliser');
Route::post('add',[commandecontroller::class,'add'])->name('add');




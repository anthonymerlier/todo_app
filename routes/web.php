<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoryController;

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


/**
 *  DASHBOARD
 */
/**
 * @home
 */
Route::get('/', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

/**
 *  @categories
 */
Route::get("/categories", [ CategoryController::class, "index" ])->middleware(['auth'])->name('categories');
Route::post("/categories", [ CategoryController::class, "store" ])->middleware(['auth'])->name('addCategory');
Route::get("/categories/export", [ CategoryController::class, "categoryExport" ])->middleware(['auth'])->name('exportCategory');
Route::post("/categories/delete", [ CategoryController::class, "destroyMulti"])->middleware(['auth'])->name('destroycategories');
Route::post("/categorie/delete/{id}", [ CategoryController::class, "destroy"])->middleware(['auth'])->name('destroycategorie');

/**
 *  @profile
 */
Route::get('/profil', [ UserController::class, "index"])->middleware(['auth'])->name('profil');

/**
 * --------------------------------------------------------------------------------
 *  AUTH PAGES
 */
require __DIR__.'/auth.php';

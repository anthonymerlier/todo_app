<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TagController;
use App\Http\Controllers\TaskController;
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
 * @tasks
 */
Route::get('/tasks', [ TaskController::class, "index" ])->middleware(['auth'])->name('tasks');
Route::get('/tasks/category/{ref}', [ TaskController::class, "indexCategory" ])->middleware(['auth'])->name('taskscategory');
Route::get('/task/{ref}', [ TaskController::class, "show" ])->middleware(['auth'])->name('task');

/**
 *  @categories
 */
Route::get("/categories", [ CategoryController::class, "index" ])->middleware(['auth'])->name('categories');
Route::post("/categories", [ CategoryController::class, "store" ])->middleware(['auth'])->name('addCategory');
Route::get("/categories/export", [ CategoryController::class, "categoryExport" ])->middleware(['auth'])->name('exportCategory');
Route::post("/categories/delete", [ CategoryController::class, "destroyMulti"])->middleware(['auth'])->name('destroycategories');
Route::post("/categorie/delete/{id}", [ CategoryController::class, "destroy"])->middleware(['auth'])->name('destroycategorie');

/***
 * @tags
 */
Route::get("/etiquettes", [ TagController::class, "index"])->middleware(['auth'])->name('tags');
Route::post("/etiquettes", [ TagController::class, "store"])->middleware(['auth'])->name('addTag');

/**
 *  @profile
 */
Route::get('/profil', [ UserController::class, "index"])->middleware(['auth'])->name('profil');

/**
 * --------------------------------------------------------------------------------
 *  AUTH PAGES
 */
require __DIR__.'/auth.php';

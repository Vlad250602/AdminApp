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
//Welcome page
Route::get('/', function () {
    return view('welcome');
});


//Table employees
Route::get('/table-employees', [App\Http\Controllers\AdminsController::class, 'allData'])->name('home');

Route::get('/edit-employee/{id}', [App\Http\Controllers\AdminsController::class, 'edit'])->name('employee-edit');
Route::post('/edit-employee/{id}', [App\Http\Controllers\AdminsController::class, 'edit_submit'])->name('employee-edit-submit');

Route::get('/create-employee', [App\Http\Controllers\AdminsController::class, 'create'])->name('employee-create');
Route::post('/create-employee', [App\Http\Controllers\AdminsController::class, 'create_submit'])->name('employee-create-submit');

Route::post('/delete-employee/submit/{id}', [App\Http\Controllers\AdminsController::class, 'destroy_submit'])->name('employee-delete-submit');
Route::get('/delete-employee/{id}', [App\Http\Controllers\AdminsController::class, 'destroy'])->name('employee-delete');


//Table positions
Route::get('/table-positions', [App\Http\Controllers\PositionsController::class, 'allData'])->name('table-positions');

Route::get('/edit-position/{id}', [App\Http\Controllers\PositionsController::class, 'edit'])->name('position-edit');
Route::post('/edit-position/{id}', [App\Http\Controllers\PositionsController::class, 'edit_submit'])->name('position-edit-submit');

Route::get('/create-position', [App\Http\Controllers\PositionsController::class, 'create'])->name('position-create');
Route::post('/create-position', [App\Http\Controllers\PositionsController::class, 'create_submit'])->name('position-create-submit');

Route::post('/delete-position-submit/{id}', [App\Http\Controllers\PositionsController::class, 'destroy_submit'])->name('position-delete-submit');
Route::get('/delete-position/{id}', [App\Http\Controllers\PositionsController::class, 'destroy'])->name('position-delete');

Auth::routes();

<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\MemberController;
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

Route::get('/', [HomeController::class, 'index']);
Route::prefix('project')->group(function(){
    Route::get('/', [HomeController::class, 'index'])->name('plane.index');
    Route::get('/xoa/{id}', [HomeController::class, 'remove'])->name('plane.remove');
    Route::get('/tao-moi', [HomeController::class, 'addForm'])->name('plane.add');
    Route::post('/tao-moi', [HomeController::class, 'saveAdd']);
    Route::get('/cap-nhat/{id}', [HomeController::class, 'editForm'])->name('plane.edit');
    Route::post('/cap-nhat/{id}', [HomeController::class, 'saveEdit']);
});
Route::prefix('member')->group(function(){
    Route::get('/', [MemberController::class, 'index'])->name('brand.index');
    Route::get('/xoa/{id}', [MemberController::class, 'remove'])->name('brand.remove');
    Route::get('/tao-moi', [MemberController::class, 'addForm'])->name('brand.add');
    Route::post('/tao-moi', [MemberController::class, 'saveAdd']);
    Route::get('/cap-nhat/{id}', [MemberController::class, 'editForm'])->name('brand.edit');
    Route::post('/cap-nhat/{id}', [MemberController::class, 'saveEdit']);
});

<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LuckyDrawController;

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
Route::get('/', [LuckyDrawController::class, 'index']);

Route::get('draw-lucky3', [LuckyDrawController::class, 'viewDrawLucky3'])->name('draw-lucky3');
Route::get('draw-lucky3-plus', [LuckyDrawController::class, 'viewDrawLucky3Plus'])->name('draw-lucky3-plus');
Route::get('draw-max3-plus', [LuckyDrawController::class, 'viewDrawMax3Plus'])->name('draw-max3-plus');

Route::group(['middleware' => ['auth']], function (){
    Route::get('dashboard', [LuckyDrawController::class, 'viewAdminDashboard'])->name('dashboard');
    
    Route::get('admin-draw-lucky3', [LuckyDrawController::class, 'viewAdminDrawLucky3'])->name('admin-draw-lucky3');
    Route::post('admin-draw-lucky3-save', [LuckyDrawController::class, 'viewAdminDrawLucky3Save'])->name('admin-draw-lucky3-save');
    
    Route::get('admin-draw-lucky3-plus', [LuckyDrawController::class, 'viewAdminDrawLucky3Plus'])->name('admin-draw-lucky3-plus');
    Route::post('admin-draw-lucky3-plus-save', [LuckyDrawController::class, 'viewAdminDrawLucky3PlusSave'])->name('admin-draw-lucky3-plus-save');

    Route::get('admin-draw-max3-plus', [LuckyDrawController::class, 'viewAdminDrawMax3Plus'])->name('admin-draw-max3-plus');
    Route::post('admin-draw-max3-plus-save', [LuckyDrawController::class, 'viewAdminDrawMax3PlusSave'])->name('admin-draw-max3-plus-save');
    
    Route::get('delete/luckyThree/{id}', [LuckyDrawController::class, 'deleteLuckyThree']);
    Route::get('delete/luckyThreePlus/{id}', [LuckyDrawController::class, 'deleteLuckyThreePlus']);
    Route::get('delete/maxThreePlus/{id}', [LuckyDrawController::class, 'deleteMaxThreePlus']);
});

require __DIR__.'/auth.php';

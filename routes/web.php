<?php

use App\Http\Controllers\GroupController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\UserCategoryController;
use App\Http\Controllers\UserSavingController;
use Illuminate\Support\Facades\Route;


use App\Http\Controllers\TotalController;

Route::get('/', [TotalController::class, 'index'])->middleware('auth');

Route::middleware('auth')->group(function () {
    Route::resources([
        'group' => GroupController::class,
        'transaction' => TransactionController::class,
        'user_category' => UserCategoryController::class,
        'user_saving' => UserSavingController::class,
    ]);

    Route::get('/instruct', function () {
        return view('instruct');
    })->name('instruct');
});

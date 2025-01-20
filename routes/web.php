<?php

use App\Http\Controllers\GroupController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\UserCategoryController;
use App\Http\Controllers\UserSavingController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
})->middleware('auth');


Route::middleware('auth')->group(function () {
    Route::resources([
        'group' => GroupController::class,
        'transaction' => TransactionController::class,
        'user_category' => UserCategoryController::class,
        'user_saving' => UserSavingController::class,
    ]);
});

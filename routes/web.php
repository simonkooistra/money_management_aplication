<?php

use App\Http\Controllers\GroupController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\UserCategoryController;
use App\Http\Controllers\UserSavingController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});


Route::resource('Group', GroupController::class);
Route::resource('Transaction', TransactionController::class);
Route::resource('UserCategory', UserCategoryController::class);
Route::resource('UserSaving', UserSavingController::class);


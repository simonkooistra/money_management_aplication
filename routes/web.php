<?php

use App\Http\Controllers\GroupController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\UserCategoryController;
use App\Http\Controllers\UserSavingController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('login');
});
Route::resources([
    'group' => GroupController::class,
    'transaction' => TransactionController::class,
    'user_category' => UserCategoryController::class,
    'user_saving' => UserSavingController::class
]);

//Route::resource('group', GroupController::class);
//Route::resource('transaction', TransactionController::class);
//Route::resource('user_category', UserCategoryController::class);
//Route::resource('user_saving', UserSavingController::class);


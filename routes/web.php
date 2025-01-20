<?php

use App\Http\Controllers\GroupController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\UserCategoryController;
use App\Http\Controllers\UserSavingController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('home');
})->middleware('auth');

Route::resources([
    'group' => GroupController::class,
    'transaction' => TransactionController::class,
    'user_category' => UserCategoryController::class,
    'user_saving' => UserSavingController::class
], [
    'middleware' => ['auth']
]);

//Route::get('/test', function () {
//    $saving = \App\Models\UserSaving::first();
//
//    dd($saving->transactions->sum('amount'));
//});

//Route::resource('group', GroupController::class);
//Route::resource('transaction', TransactionController::class);
//Route::resource('user_category', UserCategoryController::class);
//Route::resource('user_saving', UserSavingController::class);

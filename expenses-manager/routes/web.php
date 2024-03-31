<?php

use App\Http\Controllers\BucketController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', [UserController::class, 'login'])->name('login');
Route::post('/login', [UserController::class, 'processLogin'])->name('processLogin');
Route::get('/signup', [UserController::class, 'signup'])->name('signup');
Route::post('/signup', [UserController::class, 'processSignup'])->name('processSignup');


Route::get('/index', [TransactionController::class, 'index'])->name('index');
Route::get('/import/index', [TransactionController::class, 'import'])->name('import');
Route::post('/import/index', [TransactionController::class, 'processImport'])->name('processImport');

Route::get('/transaction/create', [TransactionController::class, 'create'])->name('transaction.create');
Route::post('/transaction/create', [TransactionController::class, 'store'])->name('transaction.store');

Route::get('/transaction/edit/{id}', [TransactionController::class, 'edit'])->name('transaction.edit');
Route::put('/transaction/update/{id}', [TransactionController::class, 'update'])->name('transaction.update');
Route::get('/transaction/destroy/{id}', [TransactionController::class, 'destroy'])->name('transaction.destroy');
Route::get('/transaction/report', [TransactionController::class, 'report'])->name('transaction.report');
Route::get('/yearly-report', [TransactionController::class, 'showYearlyReport'])->name('showYearlyReport');

Route::get('/admin/bucket', [BucketController::class, 'index'])->name('bucket');
Route::get('/admin/bucket/create', [BucketController::class, 'create'])->name('bucket.create');
Route::get('/admin/bucket/edit/{id}', [BucketController::class, 'edit'])->name('bucket.edit');
Route::put('/admin/bucket/update/{id}', [BucketController::class, 'update'])->name('bucket.update');
Route::delete('/admin/bucket/destroy/{id}', [BucketController::class, 'destroy'])->name('bucket.destroy');

Route::get('/admin/users', [UserController::class, 'manageUsers'])->name('manageUsers');
Route::post('/admin/users', [UserController::class, 'update'])->name('updateUsers');

Route::get('/insert-uncategorized-shops', 'App\Http\Controllers\UncategorizedShopController@insertUncategorizedShops');

<?php
use App\Http\Controllers\IndexController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', [UserController::class, 'login'])->name('login');
Route::post('/login', [UserController::class, 'processLogin'])->name('processLogin');


Route::get('/index', [TransactionController::class, 'index'])->name('index');
Route::get('/import/index', [TransactionController::class, 'import'])->name('import');
Route::post('/import/index', [TransactionController::class, 'processImport'])->name('processImport');

Route::get('/transaction/create', [TransactionController::class, 'create'])->name('transaction.create');
Route::post('/transaction/create', [TransactionController::class, 'store'])->name('transaction.store');

Route::get('/transaction/edit/{id}', [TransactionController::class, 'edit'])->name('transaction.edit');
Route::put('/transaction/update/{id}', [TransactionController::class, 'update'])->name('transaction.update');
Route::get('/transaction/destroy/{id}', [TransactionController::class, 'destroy'])->name('transaction.destroy');

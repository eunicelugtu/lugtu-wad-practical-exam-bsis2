<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TransactionController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/transactions', [TransactionController::class, 'showAllTransactions'])->name('showAllTransactions');

Route::get('/transactions/create', [TransactionController::class, 'createTransaction'])->name('createTransaction');
Route::post('/transactions/store', [TransactionController::class, 'storeTransaction'])->name('storeTransaction');

Route::get('/transactions/{id}', [TransactionController::class, 'showTransaction'])->name('showTransaction');

Route::get('/transactions/{id}/edit', [TransactionController::class, 'editTransaction'])->name('editTransaction');
Route::put('/transactions/{id}/update', [TransactionController::class, 'updateTransaction'])->name('updateTransaction');

Route::delete('/transactions/delete', [TransactionController::class, 'deleteTransaction'])->name('deleteTransaction');

// Transaction Resource

// id
// transaction_title
// description
// status (successful, declined)
// total_amount
// transaction_number
// timestamps
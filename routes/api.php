<?php

use App\Http\Controllers\TransactionController;
use Illuminate\Support\Facades\Route;

Route::post('transfer', [TransactionController::class, 'transferMony']);
Route::get('users/transactions',[TransactionController::class,'usersTransactions']);

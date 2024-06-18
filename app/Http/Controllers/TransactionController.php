<?php

namespace App\Http\Controllers;

use App\DTO\TransactionDTO;
use App\Http\Requests\TransactionRequest;
use App\Services\TransactionService;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function transferMony(TransactionRequest $request)
    {
        $transferService = TransactionService::transferMony(new TransactionDTO($request->all()));
        return [
            'data' => $transferService,
            'status' => 200
        ];
    }
    public function usersTransactions(Request $request)
    {
        $transferService = TransactionService::usersTransactions($request->all());
        return [
            'data' => $transferService,
            'status' => 200
        ];
    }
}

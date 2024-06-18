<?php

namespace App\Services;

use App\DTO\TransactionDTO;
use App\Models\User;
use App\Repositories\CardRepository;
use App\Repositories\TransactionRepository;
use Carbon\Carbon;
use Exception;
use Illuminate\Support\Facades\DB;

class TransactionService
{
    public static function transferMony(TransactionDTO $data)
    {
        $sourceCard = CardRepository::findByCardNumber($data->sourceCardNumber);
        $destinationCard = CardRepository::findByCardNumber($data->destinationCardNumber);

        $sourceAccount = $sourceCard->account;

        if (!$sourceAccount->isBalanceEnough($data->amount)) {
            throw new Exception('not enough balance');
        }

        $transaction = DB::transaction(function () use ($data, $sourceCard, $destinationCard) {

            return TransactionRepository::create($sourceCard->id, $destinationCard->id, $data->amount);
        });

        return $transaction;
    }


    public static function usersTransactions($fields)
    {
        $tenMinutesAgo = Carbon::now()->subMinutes(10);

        $topUsers = User::with(['accounts.transactions' => function ($query) use ($tenMinutesAgo) {
            $query->where('transactions.created_at', '>=', $tenMinutesAgo);
        }])
            ->get()
            ->sortByDesc(function ($user) {
                return $user->transactions->count();
            })
            ->take(3);

        // $result = $topUsers->map(function ($user) {
        //     return [
        //         'user' => $user,
        //         'last_transactions' => $user->transactions()->latest()->take(10)->get(),
        //     ];
        // });

        return response()->json($topUsers);
    }
}

<?php

namespace App\Repositories;

use App\Models\Transaction;

class TransactionRepository
{
    public static function create($sourceCardId, $destinationCardId, $amount)
    {
        return Transaction::create([
            Transaction::COL_SOURCE_CARD_ID => $sourceCardId,
            Transaction::COL_DESTINATION_CARD_ID => $destinationCardId,
            Transaction::COL_AMOUNT => $amount,
            Transaction::COL_FEE => Transaction::FEE,
        ]);
    }
}

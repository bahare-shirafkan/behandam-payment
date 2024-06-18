<?php

namespace App\Repositories;

use App\Models\Card;

class CardRepository{
    public static function findByCardNumber($cardNumber){
        return Card::where(Card::COL_CARD_NUMBER, $cardNumber)->first();
    }
}
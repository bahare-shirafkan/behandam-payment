<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Account extends Model
{
    use HasFactory, SoftDeletes;

    const COL_ID = 'id';
    const COL_ACCOUNT_NUMBER = 'account_number';
    const COL_USER_ID = 'user_id';
    const COL_BALANCE = 'balance';

    protected $fillable = [
        self::COL_ACCOUNT_NUMBER,
        self::COL_USER_ID,
        self::COL_BALANCE
    ];


    public function cards()
    {
        return $this->hasMany(
            Card::class,
        );
    }

    public function transactions(){
        return $this->hasManyThrough(Transaction::class, Card::class, Card::COL_ACCOUNT_ID, Transaction::COL_SOURCE_CARD_ID);
    }


    public function isBalanceEnough($amount)
    {
        return $this->balance > $amount + Transaction::FEE;
    }
}

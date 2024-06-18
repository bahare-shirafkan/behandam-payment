<?php

namespace App\Models;

use GuzzleHttp\Promise\Create;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    const COL_SOURCE_CARD_ID = 'source_card_id';
    const COL_DESTINATION_CARD_ID = 'destination_card_id';
    const COL_AMOUNT = 'amount';
    const COL_FEE = 'fee';

    const FEE = 500;


    protected $fillable = [
        self::COL_SOURCE_CARD_ID,
        self::COL_DESTINATION_CARD_ID,
        self::COL_AMOUNT,
        self::COL_FEE
    ];

    public function setFee($value)
    {
        return $this->attributes[self::COL_FEE] = self::FEE;
    }

    public function sourceCard()
    {
        return $this->belongsTo(Card::class, self::COL_SOURCE_CARD_ID, Card::COL_ID);
    }

    public function destinationCard()
    {
        return $this->belongsTo(Card::class, self::COL_DESTINATION_CARD_ID, Card::COL_ID);
    }

    public static function boot()
    {
        parent::boot();

        static::created(function (self $row) {
            $sourceAccount = $row->sourceCard->account;
            $sourceAccount->balance -= ($row->amount + self::FEE);
            $sourceAccount->save();

            $destinationAccount = $row->destinationCard->account;
            $destinationAccount->balance += $row->amount;
            $destinationAccount->save();
        });
    }
}

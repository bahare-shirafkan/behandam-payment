<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Card extends Model
{
    use HasFactory, SoftDeletes;

    const COL_ID = 'id';
    const COL_CARD_NUMBER = 'card_number';
    const COL_ACCOUNT_ID = 'account_id';

    protected $fillable = [
        self::COL_CARD_NUMBER,
        self::COL_ACCOUNT_ID
    ];

    public function account(): BelongsTo
    {
        return $this->belongsTo(
            Account::class,
            self::COL_ACCOUNT_ID,
            Account::COL_ID
        );
    }

    public function transactions()
    {
        return $this->hasMany(
            Transaction::class,
            Transaction::COL_SOURCE_CARD_ID,
            self::COL_ID
        );
    }
}

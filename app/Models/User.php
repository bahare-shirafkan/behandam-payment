<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     * 
     */

    const COL_ID = 'id';
    const COL_FIRST_NAME = 'first_name';
    const COL_LAST_NAME = 'last_name';
    const COL_NATIONAL_CODE = 'national_code';
    const COL_MOBILE = 'mobile';

    protected $fillable = [
        self::COL_FIRST_NAME,
        self::COL_LAST_NAME,
        self::COL_NATIONAL_CODE,
        self::COL_MOBILE,
    ];

    public function accounts()
    {
        return $this->hasMany(
            Account::class,
            Account::COL_USER_ID,
            self::COL_ID
        );
    }

    public function transactions()
    {
        return $this->hasManyThrough(Transaction::class, Account::class,Account::COL_USER_ID,Transaction::COL_SOURCE_CARD_ID);
    }
}

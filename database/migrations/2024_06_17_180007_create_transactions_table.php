<?php

use App\Models\Card;
use App\Models\Transaction;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->foreignId(Transaction::COL_SOURCE_CARD_ID)->references(Card::COL_ACCOUNT_ID)->on('cards');
            $table->foreignId(Transaction::COL_DESTINATION_CARD_ID)->references(Card::COL_ACCOUNT_ID)->on('cards');
            $table->float(Transaction::COL_AMOUNT, 15, 2);
            $table->float(Transaction::COL_FEE)->default(500);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};

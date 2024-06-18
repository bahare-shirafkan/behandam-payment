<?php

namespace Database\Seeders;

use App\Models\Card;
use Illuminate\Database\Seeder;

class CardSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                Card::COL_ACCOUNT_ID => 1,
                Card::COL_CARD_NUMBER => '6104337903308508'
            ],
            [
                Card::COL_ACCOUNT_ID => 2,
                Card::COL_CARD_NUMBER => '6104347903308507'
            ]
        ];
        foreach ($data as $item) {
            Card::create($item);
        }
    }
}

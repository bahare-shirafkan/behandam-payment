<?php

namespace Database\Seeders;

use App\Models\Account;
use Illuminate\Database\Seeder;

class AccountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                Account::COL_ID => 1,
                Account::COL_ACCOUNT_NUMBER => '123456789874',
                Account::COL_USER_ID => 1,
                Account::COL_BALANCE => 500000
            ],
            [
                Account::COL_ID => 2,
                Account::COL_ACCOUNT_NUMBER => '897456321965',
                Account::COL_USER_ID => 2,
                Account::COL_BALANCE => 500000
            ],
            [
                Account::COL_ID => 3,
                Account::COL_ACCOUNT_NUMBER => '8649753211748',
                Account::COL_USER_ID => 2,
                Account::COL_BALANCE => 20000000
            ],
            [
                Account::COL_ID => 4,
                Account::COL_ACCOUNT_NUMBER => '7412589633912',
                Account::COL_USER_ID => 3,
                Account::COL_BALANCE => 350000000
            ],
            [
                Account::COL_ID => 5,
                Account::COL_ACCOUNT_NUMBER => '987456321347',
                Account::COL_USER_ID => 3,
                Account::COL_BALANCE => 1050000
            ],
        ];

        foreach ($data as $item) {
            Account::create($item);
        }
    }
}

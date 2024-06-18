<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                User::COL_ID => 1,
                User::COL_FIRST_NAME => 'bahare',
                User::COL_LAST_NAME => 'shirafkan',
                User::COL_NATIONAL_CODE => '0371054897',
                User::COL_MOBILE => '09100785628'

            ],
            [
                User::COL_ID => 2,
                User::COL_FIRST_NAME => 'ali',
                User::COL_LAST_NAME => 'rahmani',
                User::COL_NATIONAL_CODE => '0384025628',
                User::COL_MOBILE => '09192548799'

            ],
            [
                User::COL_ID => 3,
                User::COL_FIRST_NAME => 'mahsa',
                User::COL_LAST_NAME => 'emami',
                User::COL_NATIONAL_CODE => '0371526643',
                User::COL_MOBILE => '09123456887'

            ],
        ];
        foreach ($data as $item) {
            User::create($item);
        }
    }
}

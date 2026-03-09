<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Finance_calender;

class FinanceCalenderSeeder extends Seeder
{
    public function run(): void
    {
        $years = [2020, 2021, 2022, 2023, 2024, 2025];

        foreach ($years as $year) {
            Finance_calender::create([
                'FINANCE_YR' => $year,
                'FINANCE_YR_DESC' => 'Financial Year ' . $year,
                'start_date' => $year . '-01-01',
                'end_date' => $year . '-12-31',
                'is_open' => 1,
                'com_code' => 1,
                'added_by' => 1,
                'updated_by' => 1,
            ]);
        }
    }
}
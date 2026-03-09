<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdminPanelSettingsSeeder extends Seeder
{
    public function run(): void
    {

        DB::table('admin_panel_settings')->update([
            
            'after_miniute_calculate_delay' => 10,
            'after_miniute_calculate_early_departure' => 10,

            'after_miniute_quarterday' => 60,
            'after_time_half_daycut' => 3,
            'after_time_allday_daycut' => 5,

            'monthly_vacation_balance' => 2,
            'after_days_begin_vacation' => 90,
            'first_balance_begin_vacation' => 5,

            'sanctions_value_first_abcence' => 50,
            'sanctions_value_second_abcence' => 100,
            'sanctions_value_thaird_abcence' => 150,
            'sanctions_value_forth_abcence' => 200

        ]);

    }
}
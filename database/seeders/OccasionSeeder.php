<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Occasion;

class OccasionSeeder extends Seeder
{
    public function run(): void
    {

        $occasions = [

            [
                'name' => 'New Year Holiday',
                'from_date' => '2026-01-01',
                'to_date' => '2026-01-01',
                'days_counter' => 1
            ],

            [
                'name' => 'Labour Day',
                'from_date' => '2026-05-01',
                'to_date' => '2026-05-01',
                'days_counter' => 1
            ],

            [
                'name' => 'Company Foundation Day',
                'from_date' => '2026-03-10',
                'to_date' => '2026-03-10',
                'days_counter' => 1
            ],

            [
                'name' => 'Eid Holiday',
                'from_date' => '2026-04-20',
                'to_date' => '2026-04-23',
                'days_counter' => 4
            ],

            [
                'name' => 'National Day',
                'from_date' => '2026-10-29',
                'to_date' => '2026-10-29',
                'days_counter' => 1
            ]

        ];

        foreach ($occasions as $occasion) {

            Occasion::create([
                'name' => $occasion['name'],
                'from_date' => $occasion['from_date'],
                'to_date' => $occasion['to_date'],
                'days_counter' => $occasion['days_counter'],
                'active' => 1,
                'added_by' => 1,
                'updated_by' => 1,
                'com_code' => 1
            ]);

        }

    }
}
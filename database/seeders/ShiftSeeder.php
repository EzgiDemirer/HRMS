<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Shifts_type;

class ShiftSeeder extends Seeder
{
    public function run(): void
    {
        $shifts = [
            [
                'type' => 1,
                'from_time' => '08:00:00',
                'to_time' => '16:00:00',
                'total_hour' => 8
            ],
            [
                'type' => 2,
                'from_time' => '16:00:00',
                'to_time' => '23:59:00',
                'total_hour' => 8
            ],
            [
                'type' => 1,
                'from_time' => '07:00:00',
                'to_time' => '15:00:00',
                'total_hour' => 8
            ],
            [
                'type' => 2,
                'from_time' => '15:00:00',
                'to_time' => '23:00:00',
                'total_hour' => 8
            ],
            [
                'type' => 1,
                'from_time' => '09:00:00',
                'to_time' => '17:00:00',
                'total_hour' => 8
            ],
            [
                'type' => 2,
                'from_time' => '14:00:00',
                'to_time' => '22:00:00',
                'total_hour' => 8
            ],
            [
                'type' => 1,
                'from_time' => '10:00:00',
                'to_time' => '18:00:00',
                'total_hour' => 8
            ],
            [
                'type' => 2,
                'from_time' => '12:00:00',
                'to_time' => '20:00:00',
                'total_hour' => 8
            ],
            [
                'type' => 1,
                'from_time' => '06:00:00',
                'to_time' => '14:00:00',
                'total_hour' => 8
            ],
            [
                'type' => 2,
                'from_time' => '13:00:00',
                'to_time' => '21:00:00',
                'total_hour' => 8
            ]
        ];

        foreach ($shifts as $shift) {
            Shifts_type::create([
                'type' => $shift['type'],
                'from_time' => $shift['from_time'],
                'to_time' => $shift['to_time'],
                'total_hour' => $shift['total_hour'],
                'added_by' => 1,
                'updated_by' => 1,
                'com_code' => 1
            ]);
        }
    }
}
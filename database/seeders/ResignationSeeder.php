<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Resignation;

class ResignationSeeder extends Seeder
{
    public function run(): void
    {

        $types = [
            'Personal Reasons',
            'Better Job Opportunity',
            'Retirement',
            'Health Issues',
            'Relocation',
            'Contract End',
            'Family Reasons',
            'Company Termination'
        ];

        foreach ($types as $type) {

            Resignation::create([
                'name' => $type,
                'added_by' => 1,
                'updated_by' => 1,
                'active' => 1,
                'com_code' => 1
            ]);

        }

    }
}
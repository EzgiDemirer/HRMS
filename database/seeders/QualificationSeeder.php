<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Qualification;

class QualificationSeeder extends Seeder
{
    public function run()
    {
        $items = [
            'High School',
            'Diploma',
            'Bachelor Degree',
            'Master Degree',
            'PhD',
            'Engineering',
            'Computer Science',
            'Business Administration',
            'Finance',
            'Marketing'
        ];

        foreach ($items as $name) {

            Qualification::create([
                'name' => $name,
                'active' => 1,
                'com_code' => 1,
                'added_by' => 1,
                'updated_by' => 1
            ]);

        }
    }
}
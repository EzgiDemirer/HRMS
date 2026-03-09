<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\jobs_categorie;

class JobCategorySeeder extends Seeder
{
    public function run(): void
    {

        $jobs = [
            'HR Manager',
            'Accountant',
            'Software Engineer',
            'System Administrator',
            'Sales Manager',
            'Customer Support',
            'Marketing Specialist',
            'Project Manager',
            'Data Analyst',
            'Security Officer'
        ];

        foreach ($jobs as $job) {

            jobs_categorie::create([
                'name' => $job,
                'active' => 1,
                'added_by' => 1,
                'updated_by' => 1,
                'com_code' => 1
            ]);

        }

    }
}
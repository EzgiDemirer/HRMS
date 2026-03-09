<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Department;

class DepartmentSeeder extends Seeder
{
    public function run()
    {
        for ($i = 1; $i <= 10; $i++) {

            Department::create([
                'name' => 'Department '.$i,
                'phones' => '021200000'.$i,
                'notes' => 'Notes for department '.$i,
                'added_by' => 1,
                'updated_by' => 1,
                'active' => 1,
                'com_code' => 1
            ]);

        }
    }
}
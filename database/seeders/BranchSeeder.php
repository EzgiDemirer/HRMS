<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Branche;

class BranchSeeder extends Seeder
{
    public function run()
    {
        for ($i = 1; $i <= 10; $i++) {

            Branche::create([
                'name' => 'Branch '.$i,
                'address' => 'Address '.$i,
                'phones' => '050000000'.$i,
                'email' => 'branch'.$i.'@demo.com',
                'active' => 1,
                'added_by' => 1,
                'updated_by' => 1,
                'com_code' => 1
            ]);

        }
    }
}
<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\BranchSeeder;
use Database\Seeders\DepartmentSeeder;
use Database\Seeders\JobCategorySeeder;
use Database\Seeders\QualificationSeeder;
use Database\Seeders\ShiftSeeder;
use Database\Seeders\EmployeeSeeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            AdminPanelSettingsSeeder::class,
            FinanceCalenderSeeder::class,
            BranchSeeder::class,
            DepartmentSeeder::class,
            JobCategorySeeder::class,
            QualificationSeeder::class,
            ShiftSeeder::class,
            OccasionSeeder::class,
            ResignationSeeder::class,
            EmployeeSeeder::class
        ]);
    }
}
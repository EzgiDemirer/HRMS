<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('admin_panel_settings', function (Blueprint $table) {

            $table->id();

            $table->string('company_name',250);

            $table->tinyInteger('saysem_status')->default('1')
            ->comment('1 = Active - 0 = Inactive');

            $table->string('image',250)->nullable();

            $table->string('phones',250);

            $table->string('address',250);

            $table->string('email',100);

            $table->integer('added_by');

            $table->integer('updated_by')->nullable();

            $table->integer('com_code');

            $table->decimal('after_miniute_calculate_delay',10,2)->default(0)
            ->comment("Minutes after which attendance delay is calculated");

            $table->decimal('after_miniute_calculate_early_departure',10,2)->default(0)
            ->comment("Minutes after which early departure is calculated");

            $table->decimal('after_miniute_quarterday',10,2)->default(0)
            ->comment("Total delay or early departure minutes to deduct a quarter day");

            $table->decimal('after_time_half_daycut',10,2)->default(0)
            ->comment("Number of delays or early departures after which half day is deducted");

            $table->decimal('after_time_allday_daycut',10,2)->default(0)
            ->comment("Number of delays or early departures after which full day is deducted");

            $table->decimal('monthly_vacation_balance',10,2)->default(0)
            ->comment("Employee monthly vacation balance");

            $table->decimal('after_days_begin_vacation',10,2)->default(0)
            ->comment("Number of days after which vacation balance is credited");

            $table->decimal('first_balance_begin_vacation',10,2)->default(0)
            ->comment("Initial vacation balance credited to the employee");

            $table->decimal('sanctions_value_first_abcence',10,2)->default(0)
            ->comment("Deduction value after first absence without permission");

            $table->decimal('sanctions_value_second_abcence',10,2)->default(0)
            ->comment("Deduction value after second absence without permission");

            $table->decimal('sanctions_value_thaird_abcence',10,2)->default(0)
            ->comment("Deduction value after third absence without permission");

            $table->decimal('sanctions_value_forth_abcence',10,2)->default(0)
            ->comment("Deduction value after fourth absence without permission");

            $table->timestamps();

        });


        DB::table('admin_panel_settings')->insert(
            [
                [
                    'company_name' => 'First Company',
                    'phones' => '11222',
                    'address' => 'Address',
                    'email' => 'info@test.com',
                    'added_by' => 1,
                    'updated_by' => 1,
                    'com_code' => 1,
                ],
            ]
        );

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('admin_panel_settings');
    }
};
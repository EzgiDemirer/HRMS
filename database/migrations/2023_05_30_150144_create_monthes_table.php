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
        Schema::create('monthes', function (Blueprint $table) {
            $table->id();
            $table->string('name',50);
            $table->string('name_en',50);
        });

        DB::table('monthes')->insert(
        [
            ['name'=>'January','name_en'=>'January'],
            ['name'=>'February','name_en'=>'February'],
            ['name'=>'March','name_en'=>'March'],
            ['name'=>'April','name_en'=>'April'],
            ['name'=>'May','name_en'=>'May'],
            ['name'=>'June','name_en'=>'June'],
            ['name'=>'July','name_en'=>'July'],
            ['name'=>'August','name_en'=>'August'],
            ['name'=>'September','name_en'=>'September'],
            ['name'=>'October','name_en'=>'October'],
            ['name'=>'November','name_en'=>'November'],
            ['name'=>'December','name_en'=>'December'],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('monthes');
    }
};
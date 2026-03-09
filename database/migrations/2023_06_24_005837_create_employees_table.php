<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id();

            $table->integer('employees_code')->comment('Employee automatic code does not change');
            $table->integer('zketo_code')->comment('Employee fingerprint code from device does not change');
            $table->string('emp_name', 300);
            $table->tinyInteger('emp_gender')->comment('Gender - 1 = Male - 2 = Female');

            $table->unsignedBigInteger('branch_id')->default(1)->comment('Employee branch');

            $table->foreignId('Qualifications_id')
                ->nullable()
                ->comment('Educational qualification')
                ->references('id')
                ->on('qualifications')
                ->onUpdate('cascade');

            $table->string('Qualifications_year', 10)->nullable()->comment('Graduation year');
            $table->tinyInteger('graduation_estimate')->nullable()->comment('Graduation grade - 1 = Pass - 2 = Good - 3 = Very Good - 4 = Excellent - 5 = Outstanding');
            $table->string('Graduation_specialization', 225)->nullable()->comment('Graduation specialization');
            $table->date('brith_date')->nullable()->comment('Employee birth date');
            $table->string('emp_national_idenity', 50)->nullable()->comment('National ID number');
            $table->date('emp_end_identityIDate')->nullable()->comment('National ID expiry date');
            $table->string('emp_identityPlace', 225)->nullable()->comment('Place of ID issuance');

            $table->unsignedBigInteger('religion_id')->nullable()->comment('Religion');
            $table->integer('emp_lang_id')->nullable()->comment('Primary language');
            $table->string('emp_email', 100)->nullable()->comment('Employee email');
            $table->integer('country_id')->nullable()->comment('Employee country');
            $table->integer('governorate_id')->nullable()->comment('Employee governorate');
            $table->integer('city_id')->nullable()->comment('Employee city');
            $table->string('emp_home_tel', 50)->nullable()->comment('Home phone number');
            $table->string('emp_work_tel', 50)->nullable()->comment('Work phone number');

            $table->integer('emp_military_id')->nullable()->comment('Military status');
            $table->date('emp_military_date_from')->nullable()->comment('Military service start date');
            $table->date('emp_military_date_to')->nullable()->comment('Military service end date');
            $table->string('emp_military_wepon')->nullable()->comment('Military weapon type');
            $table->date('exemption_date')->nullable()->comment('Military exemption date');
            $table->string('exemption_reason', 300)->nullable()->comment('Reason for military exemption');
            $table->string('postponement_reason', 225)->nullable()->comment('Reason for military postponement');

            $table->date('Date_resignation')->nullable()->comment('Resignation date');
            $table->string('resignation_cause')->nullable()->comment('Resignation reason');

            $table->tinyInteger('does_has_Driving_License')->default(0)->comment('Has driving license');
            $table->string('driving_License_degree', 50)->nullable()->comment('Driving license number');
            $table->integer('driving_license_types_id')->nullable();

            $table->tinyInteger('has_Relatives')->default(0)->comment('Has relatives at work');
            $table->string('Relatives_details', 600)->nullable()->comment('Relatives details');
            $table->string('notes', 600)->nullable();

            $table->date('emp_start_date')->nullable()->comment('Employee start date');
            $table->tinyInteger('Functiona_status')->default(0)->comment('Employee status - 1 = Working - 0 = Out of service');

            $table->foreignId('emp_Departments_code')
                ->nullable()
                ->references('id')
                ->on('departements')
                ->onUpdate('cascade');

            $table->foreignId('emp_jobs_id')
                ->nullable()
                ->references('id')
                ->on('jobs_categories')
                ->onUpdate('cascade');

            $table->tinyInteger('does_has_ateendance')->default(1)->comment('Employee is required to record attendance and departure');
            $table->tinyInteger('is_has_fixced_shift')->nullable()->comment('Employee has a fixed shift');

            $table->foreignId('shift_type_id')
                ->nullable()
                ->references('id')
                ->on('shifts_types')
                ->onUpdate('cascade');

            $table->decimal('daily_work_hour', 10, 2)->nullable()->comment('Employee daily working hours if there is no fixed shift');
            $table->decimal('emp_sal', 10, 2)->default(0)->comment('Employee salary');
            $table->tinyInteger('MotivationType')->default(0)->comment('0 = None - 1 = Fixed - 2 = Variable');
            $table->decimal('Motivation', 10, 2)->default(0)->comment('Fixed motivation value if available');

            $table->tinyInteger('isSocialnsurance')->default(0)->comment('Has social insurance');
            $table->decimal('Socialnsurancecutmonthely', 10, 2)->nullable()->comment('Monthly social insurance deduction value');
            $table->string('SocialnsuranceNumber', 50)->nullable();

            $table->tinyInteger('ismedicalinsurance')->default(0)->comment('Has medical insurance');
            $table->decimal('medicalinsurancecutmonthely', 10, 2)->nullable()->comment('Monthly medical insurance deduction value');
            $table->string('medicalinsuranceNumber', 50)->nullable();

            $table->tinyInteger('sal_cach_or_visa')->default(1)->comment('Salary payment type - 1 = Cash - 2 = Bank Visa');
            $table->tinyInteger('is_active_for_Vaccation')->default(0)->comment('Employee receives vacation balance');
            $table->string('urgent_person_details', 600)->nullable()->comment('Emergency contact details');

            $table->string('staies_address', 300)->nullable()->comment('Current residence address');
            $table->integer('children_number')->default(0);
            $table->integer('emp_social_status_id')->nullable()->comment('Social status');

            $table->foreignId('Resignations_id')
                ->nullable()
                ->references('id')
                ->on('resignations')
                ->onUpdate('cascade');

            $table->string('bank_number_account', 50)->nullable()->comment('Employee bank account number');
            $table->tinyInteger('is_Disabilities_processes')->default(0)->comment('Has disability - 1 = Yes - 0 = No');
            $table->string('Disabilities_processes', 500)->nullable()->comment('Disability type');
            $table->string('emp_cafel')->nullable()->comment('Sponsor name');
            $table->string('emp_pasport_no', 100)->nullable()->comment('Passport number if available');
            $table->string('emp_pasport_from', 100)->nullable()->comment('Passport issue place');
            $table->date('emp_pasport_exp')->nullable()->comment('Passport expiry date');
            $table->string('emp_photo', 100)->nullable()->comment('Employee photo');
            $table->string('emp_CV', 100)->nullable();
            $table->string('emp_Basic_stay_com', 300)->nullable()->comment('Employee address in home country');

            $table->date('date')->nullable();
            $table->decimal('day_price', 10, 2)->nullable()->comment('Employee daily rate');
            $table->tinyInteger('Does_have_fixed_allowances')->default(0)->comment('Has fixed allowances');
            $table->tinyInteger('is_done_Vaccation_formula')->default(0)->comment('Automatic annual vacation balance calculation completed');
            $table->tinyInteger('is_Sensitive_manager_data')->default(0)->comment('Sensitive data visible only with special permissions');

            $table->foreignId('added_by')
                ->nullable()
                ->references('id')
                ->on('admins')
                ->onUpdate('cascade');

            $table->foreignId('updated_by')
                ->nullable()
                ->references('id')
                ->on('admins')
                ->onUpdate('cascade');

            $table->integer('com_code')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};
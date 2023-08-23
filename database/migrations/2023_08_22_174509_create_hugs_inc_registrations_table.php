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
        Schema::create('hugs_inc_registrations', function (Blueprint $table) {
            $table->id();

            $table->date('registration_date')->nullable();
            $table->string('bnatp')->nullable();
            $table->string('phlebotomy')->nullable();
            $table->string('recert')->nullable();
            $table->string('first_name')->nullable();
            $table->string('middle_name')->nullable();
            $table->string('last_name')->nullable();
            $table->date('dob')->nullable();
            $table->string('current_phone')->nullable();
            $table->longText('current_address')->nullable();
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->string('zip')->nullable();
            $table->char('us_citizen', 1)->nullable();
            $table->string('email')->nullable();
            $table->char('communicable_diseases', 1)->nullable();
            $table->char('criminal_background_check', 1)->nullable();
            $table->char('commit_complete_course', 1)->nullable();
            $table->longText('certified_nursing_assistant')->nullable();
            $table->longText('phlebotomy_technician')->nullable();
            $table->longText('recertification_of_skills')->nullable();
            $table->char('rate_yourself', 1)->nullable();
            $table->char('cooperation_other', 1)->nullable();
            $table->char('afraid_of_blood_other', 1)->nullable();
            $table->char('lift_50_70_lbs', 1)->nullable();
            $table->longText('injuries')->nullable();
            $table->char('currently_working', 1)->nullable();
            $table->char('employment_affect_class_schedule', 1)->nullable();
            $table->char('personal_support_completion_course_responsibity', 1)->nullable();
            $table->longText('learning_difficulty')->nullable();
            $table->longText('financial_obligations')->nullable();
            $table->longText('about_hugs_inc_courses')->nullable();
            $table->string('reffered_by')->nullable();
            $table->string('sponsor')->nullable();
            $table->string('walk_in')->nullable();

            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hugs_inc_registrations');
    }
};

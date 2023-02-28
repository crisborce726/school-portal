<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->string('course_code');
            $table->string('course_title');
            $table->string('level');
            $table->timestamps();
        });

        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users');
            $table->foreignId('course_id')->constrained('courses');
            $table->date('birthday')->nullable();
            $table->string('birthplace')->nullable();
            $table->string('religion')->nullable();
            $table->string('civil_status')->nullable();
            $table->string('nationality')->nullable();
            $table->string('mobile_no')->nullable();
            $table->string('address')->nullable();
            $table->string('elementary_school')->nullable();
            $table->string('elementary_address')->nullable();
            $table->string('elementary_year_graduated')->nullable();
            $table->string('highschool_school')->nullable();
            $table->string('highschool_address')->nullable();
            $table->string('highschool_year_graduated')->nullable();
            $table->string('guardian_name')->nullable();
            $table->string('guardian_contact')->nullable();
            $table->string('guardian_occupation')->nullable();
            $table->string('guardian_address')->nullable();
            $table->string('guardian_relationship')->nullable();
            $table->string('mothers_name')->nullable();
            $table->string('mothers_contact')->nullable();
            $table->string('mothers_occupation')->nullable();
            $table->string('mothers_address')->nullable();
            $table->string('mothers_email')->nullable();
            $table->string('fathers_name')->nullable();
            $table->string('fathers_contact')->nullable();
            $table->string('fathers_occupation')->nullable();
            $table->string('fathers_address')->nullable();
            $table->string('fathers_email')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('courses');
        Schema::dropIfExists('students');
    }
};

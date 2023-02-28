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

        Schema::create('semesters', function (Blueprint $table) {
            $table->id();
            $table->string('semester');
            $table->string('status');
            $table->timestamps();
        });

        Schema::create('class_schedules', function (Blueprint $table) {
            $table->id();
            $table->foreignId('course_id')->constrained('courses');
            $table->foreignId('subject_id')->constrained('subjects');
            $table->foreignId('sem_id')->constrained('semesters');
            $table->string('section');
            $table->string('lec_schedule');
            $table->string('lab_schedule')->nullable();
            $table->foreignId('teacher_id')->constrained('users')->nullable();
            $table->boolean('status')->default(1);
            $table->timestamps();
        });

        Schema::create('student_classes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('classes_id')->constrained('class_schedules');
            $table->foreignId('student_id')->constrained('users');
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
        Schema::dropIfExists('student_classes');
        Schema::dropIfExists('class_schedules');
        Schema::dropIfExists('semesters');
    }
};

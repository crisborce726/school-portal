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
        Schema::create('student_accounts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('sem_id')->constrained('semesters');
            $table->foreignId('student_id')->constrained('users');
            $table->decimal('tuition_fee')->nullable();
            $table->decimal('misc_fee')->nullable();
            $table->decimal('lab_fee')->nullable();
            $table->decimal('other_fee')->nullable();
            $table->timestamps();
        });

        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('account_id')->constrained('student_accounts');
            $table->decimal('amount_payment');
            $table->date('date_of_payment');
            $table->string('payment_method');
            $table->enum('type_of_payment', ['partial', 'full']);
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
        Schema::dropIfExists('student_accounts');
        Schema::dropIfExists('transactions');
    }
};

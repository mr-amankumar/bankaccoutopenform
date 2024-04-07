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
        Schema::create('account_opening_forms', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('form_number');
            $table->date('form_filling_date');
            $table->time('form_filling_time');
            $table->integer('cust_title');
            $table->string('cust_first_name');
            $table->string('cust_middle_name');
            $table->string('cust_last_name');
            $table->integer('cust_sex');
            $table->date('cust_date_of_birth');
            $table->integer('age');
            $table->string('cust_std_code');
            $table->string('cust_telephone');
            $table->string('cust_mobile');
            $table->string('cust_email');
            $table->unsignedBigInteger('cust_state_id');
            $table->foreign('cust_state_id')->references('id')->on('states');
            $table->unsignedBigInteger('cust_city_id');
            $table->foreign('cust_city_id')->references('id')->on('cities');
            $table->unsignedBigInteger('cust_branch_id');
            $table->foreign('cust_branch_id')->references('id')->on('branches');
            $table->integer('cust_account_type');
            $table->string('cust_preferred_language');
            $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('account_opening_forms');
    }
};

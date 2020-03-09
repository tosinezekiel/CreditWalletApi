<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('accounts', function (Blueprint $table) {
            $table->id();
            $table->string('amount');
            $table->string('duration');
             $table->string('title');
            $table->string('gender');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('dob');
            $table->string('phone');
            $table->string('email')->unique();
            $table->string('address');
            $table->string('city');
            $table->string('state');
            $table->string('employer_name');
            $table->string('ippis_no');
            $table->string('salary_bank_name');
            $table->string('salary_account_number');
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
        Schema::dropIfExists('accounts');
    }
}

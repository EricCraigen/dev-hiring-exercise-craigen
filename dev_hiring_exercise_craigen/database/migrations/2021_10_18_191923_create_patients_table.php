<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePatientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patients', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('middle_name');
            $table->string('last_name');
            $table->date('date_of_birth');
            $table->string('gender');
            $table->boolean('status');
            $table->string('marital_status');
            $table->string('race');
            $table->string('language');
            $table->string('employment_status');
            $table->string('contact_by');
            $table->string('soc_sec_no');
            $table->string('referred_by');
            $table->string('email')->unique();
            $table->string('street_address_1');
            $table->string('street_address_2');
            $table->string('city');
            $table->string('state');
            $table->string('postal_code');
            $table->string('primary_phone');
            $table->string('secondary_phone');
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
        Schema::dropIfExists('patients');
    }
}

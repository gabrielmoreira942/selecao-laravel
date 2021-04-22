<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('name');
            $table->string('email');
            $table->string('RG', 16)->unique()->nullable()->default(null);
            $table->string('CPF',14)->unique();
            $table->date('birth_date');
            $table->string('number', 15);
            $table->string('telephone', 14)->nullable();

            $table->string('UF');
            $table->unsignedInteger('user_id');

           //UF - SP / BA - case SP = RG required, case BA = age 18 required
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clients');
    }
}

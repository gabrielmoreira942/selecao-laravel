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
            $table->unsignedBigInteger('created_by');
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->string('name');
            $table->string('email');
            $table->string('rg', 16)->unique()->nullable()->default(null);
            $table->string('cpf',14)->unique();
            $table->date('birth_date');
            $table->string('mobile', 15);
            $table->string('phone', 15)->nullable();
            $table->string('uf');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('created_by')
                  ->references('id')
                  ->on('users')
                  ->onDelete('restrict')
                  ->onUpdate('restrict');

                  $table->foreign('updated_by')
                  ->references('id')
                  ->on('users')
                  ->onDelete('restrict')
                  ->onUpdate('restrict');
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

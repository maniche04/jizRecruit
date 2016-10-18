<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCandidatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('candidates', function (Blueprint $table) {
            $table->increments('id');
            $table->string('reference')->nullable();
            $table->string('firstName');
            $table->string('lastName')->nullable();
            $table->string('gender')->nullable();
            $table->string('maritalStatus')->nullable();
            $table->date('dateOfBirth')->nullable();
            $table->longText('address')->nullable();
            $table->string('position');
            $table->string('nationality')->nullable();
            $table->string('phone')->nullable();
            $table->string('email')->unique();
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
        //
    }
}

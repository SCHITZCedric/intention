<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIntentionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('intentions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('reglement');
            $table->int('encaissement');
            $table->int('surplus')->nullable();
            $table->string('casuel');
            $table->string('personne_celebree');
            $table->timestamp('date_souhaitee');
            $table->timestamp('est_annoncee');
            $table->timestamp('est_celebree')->nullable();
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
        Schema::dropIfExists('intentions');
    }
}

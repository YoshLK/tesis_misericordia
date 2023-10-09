<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCondicionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('condicions', function (Blueprint $table) {
            $table->id();
            $table->string('conciente',3)->nullable(true);
            $table->string('camina',3)->nullable(true);
            $table->string('habla',3)->nullable(true);
            $table->string('vidente',25)->nullable(true);
            $table->string('dificultad_motora',20)->nullable(true);
            $table->string('observaciones',250)->nullable(true);
            $table->unsignedBigInteger('adulto_id')->unique();
            $table->foreign('adulto_id')
                  ->references('id')->on('adultos')
                  ->onDelete('cascade')
                  ->onUpdate('cascade');
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
        Schema::dropIfExists('condicions');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHistorialsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('historials', function (Blueprint $table) {
            $table->id();
            $table->double('peso')->nullanble(false);
            $table->double('altura')->nullanble(false);
            $table->double('indice')->nullanble(false);
            $table->string('tronco',5)->nullanble(false);
            $table->integer('piernas')->nullanble(false);
            $table->integer('calzado')->nullanble(false);
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
        Schema::dropIfExists('historials');
    }
}

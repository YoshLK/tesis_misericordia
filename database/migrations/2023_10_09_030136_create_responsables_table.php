<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResponsablesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('responsables', function (Blueprint $table) {
            $table->id();
            $table->string('procedencia',50)->nullanble(false);
            $table->string('responsable',200)->nullanble(false);
            $table->string('dpi_encargado',200)->nullanble(false);
            $table->string('telefono',25)->nullable(true);
            $table->string('celular',25)->nullanble(false);
            $table->string('direccion',150)->nullanble(false);
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
        Schema::dropIfExists('responsables');
    }
}

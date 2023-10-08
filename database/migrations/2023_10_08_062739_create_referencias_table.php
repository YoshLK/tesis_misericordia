<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReferenciasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('referencias', function (Blueprint $table) {
            $table->id();
            $table->string('procedencia',50)->nullanble(true);
            $table->string('responsable',200)->nullanble(false);
            $table->string('dpi_encargado',200)->nullanble(true);
            $table->string('telefono',25)->nullanble(false);
            $table->string('direccion',150)->nullanble(false);
            $table->foreignId('adulto_id')
                  ->nullable()
                  ->constrained('adultos')
                  ->cascadeOnUpdate()
                  ->cascadeonDelete();
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
        Schema::dropIfExists('referencias');
    }
}

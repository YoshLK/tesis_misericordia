<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDonacionesHistoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('donaciones_history', function (Blueprint $table) {
            $table->id();
            $table->string('donador', 100);
            $table->string('tipo_donacion', 100);
            $table->string('descripcion', 250);
            $table->string('modifico', 250);
            $table->string('operation_type'); // Puedes usar 'update' u otro valor según tus necesidades
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
        Schema::dropIfExists('donaciones_history');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePatologiasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patologias', function (Blueprint $table) {
            $table->id();
            $table->string('nombre_patologia',50)->nullanble(false);
            $table->date('fecha_diagnostico')->nullanble(false);
            $table->string('gravedad',25)->nullanble(false);
            $table->string('tratamiento_actual',150)->nullanble(false);
            $table->text('notas_patologia')->nullable(true);
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
        Schema::dropIfExists('patologias');
    }
}

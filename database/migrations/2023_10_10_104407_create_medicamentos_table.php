<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMedicamentosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medicamentos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre_medicamento',50)->nullanble(false);
            $table->double('cantidad_medicamento')->nullanble(false);
            $table->string('medida_medicamento',30)->nullanble(false);
            $table->integer('frecuencia_tiempo')->nullanble(false);
            $table->string('frecuencia_dia',10)->nullanble(false);
            $table->string('via_administracion',50)->nullanble(false);
            $table->date('fecha_inicio')->nullable(false);
            $table->date('fecha_fin')->nullable(true);
            //$table->integer('duracion_dias')->nullable(true);
            $table->text('nota_medicamento')->nullable(true);
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
        Schema::dropIfExists('medicamentos');
    }
}

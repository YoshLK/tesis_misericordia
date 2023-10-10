<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFichasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fichas', function (Blueprint $table) {
            $table->id();
            $table->string('enfermedad',3)->nullable(true);
            $table->string('enfermedad_nombre',200)->nullable(true);
            $table->string('medicamento',3)->nullable(true);
            $table->string('medicamento_nombre',200)->nullable(true);
            $table->string('duerme',3)->nullable(true);

            $table->string('tic',3)->nullable(true);
            $table->string('tic_nombre',200)->nullable(true);
            $table->string('necesidades',3)->nullable(true);
            $table->string('operacion',3)->nullable(true);
            $table->string('operacion_nombre',200)->nullable(true);

            $table->string('alchol',3)->nullable(true);
            $table->string('fuma',3)->nullable(true);
            $table->string('alergia_m',3)->nullable(true);
            $table->string('alergia_medicina',200)->nullable(true);
            $table->string('alergia_c',3)->nullable(true);

            $table->string('alergia_comida',200)->nullable(true);
            $table->string('fractura',3)->nullable(true);
            $table->string('fractura_donde',200)->nullable(true);
            $table->string('cicatriz',3)->nullable(true);
            $table->string('cicatriz_donde',200)->nullable(true);

            $table->string('tatuaje',3)->nullable(true);
            $table->string('tatuaje_donde',200)->nullable(true);
            $table->string('herida',3)->nullable(true);
            $table->string('herida_donde',200)->nullable(true);
            $table->string('fecha',3)->nullable(true);
            
            $table->string('nombre',3)->nullable(true);
            $table->string('lugar',3)->nullable(true);
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
        Schema::dropIfExists('fichas');
    }
}

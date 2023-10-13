<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUniversitariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('universitarios', function (Blueprint $table) {
            $table->id();
            $table->string('primer_nombre',20)->nullanble(false);
            $table->string('segundo_nombre',50)->nullanble(false);
            $table->string('primer_apellido',20)->nullanble(false);
            $table->string('segundo_apellido',50)->nullanble(false);
            $table->string('DPI',15)->nullable(true);
            $table->integer('edad')->nullanble(false);
            $table->string('telefono',20)->nullanble(true);
            $table->string('universidad',200)->nullable(true);
            $table->string('no_carnet',50)->nullable(true);
            $table->string('practica',250)->nullable(true);
            $table->date('fecha_incio')->nullanble(false);
            $table->date('fecha_final')->nullable(true);
            $table->string('consentimiento',10)->nullanble(true);
            $table->string('no_consentimiento',100)->nullanble(true);
            $table->string('estado_actual',20)->nullanble(false);
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
        Schema::dropIfExists('universitarios');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePersonalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personals', function (Blueprint $table) {
            $table->id();
            $table->string('primer_nombre',20)->nullanble(false);
            $table->string('segundo_nombre',50)->nullanble(false);
            $table->string('primer_apellido',20)->nullanble(false);
            $table->string('segundo_apellido',50)->nullanble(false);
            $table->string('DPI',15)->nullanble(false);
            $table->string('foto')->nullable(true);
            $table->date('fecha_nacimiento')->nullanble(false);
            $table->integer('edad')->nullanble(false);
            $table->string('estado_civil',50)->nullanble(false);
            $table->string('direccion',150)->nullanble(false);
            $table->string('telefono',25)->nullanble(false);
            $table->string('estado_actual',20)->nullanble(false);
            $table->date('fecha_salida')->nullable(true);
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
        Schema::dropIfExists('personals');
    }
}

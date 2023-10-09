<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdultosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('adultos', function (Blueprint $table) {
            $table->id();
            $table->date('fecha_ingreso')->nullanble(false);
            $table->string('recibe',150)->nullanble(false);
            $table->string('primer_nombre',20)->nullanble(false);
            $table->string('segundo_nombre',50)->nullanble(false);
            $table->string('primer_apellido',20)->nullanble(false);
            $table->string('segundo_apellido',50)->nullanble(false);
            $table->integer('edad')->nullanble(false);
            $table->date('fecha_nacimiento')->nullanble(false);
            $table->string('DPI',25)->nullanble(false);
            $table->string('registro',100)->nullable(true);
            $table->string('lugar_origen',200)->nullable(false);
            $table->string('domicilio',200)->nullable(true);

            $table->string('iggs',10)->nullable(true);
            $table->string('iggs_identificacion',100)->nullable(true);
            $table->string('cuota',10)->nullable(true);
            $table->integer('cuota_monto')->nullable(true);
           
            $table->string('firma_pariente',10)->nullanble(false);
            $table->string('firma_adulto',10)->nullanble(false);
            $table->string('motivo_ingreso',200)->nullanble(false);
            $table->string('estado_actual',25)->nullanble(false);
            $table->string('foto')->nullable(true);
            $table->date('fecha_salida')->nullable(true);
            $table->string('motivo_salida')->nullable(true);
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
        Schema::dropIfExists('adultos');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContratosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contratos', function (Blueprint $table) {
            $table->id();
            $table->date('fecha_contratacion')->nullanble(false);
            $table->string('cargo',50)->nullanble(false);
            $table->string('titulo',50)->nullanble(false);
            $table->integer('salario')->nullanble(false);
            $table->string('impuesto',20)->nullanble(false);
            $table->string('sat',150)->nullanble(false);
            $table->unsignedBigInteger('personal_id')->unique();
            $table->foreign('personal_id')
                  ->references('id')->on('personals')
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
        Schema::dropIfExists('contratos');
    }
}

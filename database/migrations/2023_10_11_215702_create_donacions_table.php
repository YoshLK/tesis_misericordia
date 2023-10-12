<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDonacionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('donacions', function (Blueprint $table) {
            $table->id();
            $table->string('tipo_donacion',100)->nullanble(false);
            $table->string('descripcion',250)->nullable(false);
            $table->foreignId('donador_id')
                  ->nullable()
                  ->constrained('donadors')
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
        Schema::dropIfExists('donacions');
    }
}

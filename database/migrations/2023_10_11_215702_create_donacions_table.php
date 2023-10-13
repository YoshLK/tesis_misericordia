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
            $table->string('descripcion',250)->nullanble(false);
            $table->unsignedBigInteger('created_by');
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->foreignId('donador_id')
                  ->nullable()
                  ->constrained('donadors')
                  ->cascadeOnUpdate()
                  ->cascadeonDelete();
            
            $table->softDeletes();
            $table->foreign('created_by')
                  ->references('id')
                  ->on('users');
            $table->foreign('updated_by')
                  ->references('id')
                  ->on('users');
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

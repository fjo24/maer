<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAplicacionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('aplicaciones', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->string('imagen');
            $table->text('descripcion');
            $table->string('orden')->nullable();
            $table->timestamps();
        });

        Schema::create('aplicacion_producto', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('producto_id')->unsigned();
            $table->integer('aplicacion_id')->unsigned();
            $table->timestamps();
            
            $table->foreign('aplicacion_id')->references('id')->on('aplicaciones')->onDelete('cascade');
            $table->foreign('producto_id')->references('id')->on('productos')->onDelete('cascade');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('aplicacion_producto');        
        Schema::dropIfExists('aplicaciones');
    }
}

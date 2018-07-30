<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddMetadatosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('metadatos', function (Blueprint $table) {
            $table->increments('id');
            $table->enum('seccion', ['home', 'videos', 'productos', 'empresa', 'calidad', 'novedades', 'contacto']);
            $table->string('keywords', 300);
            $table->string('description', 300);

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
        Schema::dropIfExists('metadatos');
    }
}

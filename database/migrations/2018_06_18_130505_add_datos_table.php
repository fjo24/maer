<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddDatosTable extends Migration
{

    public function up()
    {
        Schema::create('datos', function (Blueprint $table) {
            $table->increments('id');
            $table->enum('tipo', ['direccion', 'telefono', 'telefono2', 'email']);
            $table->string('descripcion', 100);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('datos');
    }
}

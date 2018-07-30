<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddEmpresasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empresas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->text('descripcion');
            $table->text('contenido')->nullable();
            $table->string('imagen');
            $table->string('link')->nullable();
            $table->string('texto1')->nullable();
            $table->string('numero1')->nullable();
            $table->string('texto2')->nullable();
            $table->string('numero2')->nullable();
            $table->string('texto3')->nullable();
            $table->string('numero3')->nullable();
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
        Schema::dropIfExists('empresas');
    }
}

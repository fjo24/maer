<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterProductosTable extends Migration
{
    public function up()
    {
        Schema::table('productos', function (Blueprint $table) {
            $table->integer('categoria_pregunta_id')->unsigned()->nullable();

            $table->foreign('categoria_pregunta_id')->references('id')->on('categoria_preguntas')->onDelete('cascade');
        });
    }
    
    public function down()
    {
        Schema::table('productos', function (Blueprint $table) {
        $table->dropColumn('categoria_pregunta_id');
        });
    }
}

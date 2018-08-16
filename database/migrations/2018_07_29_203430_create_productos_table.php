<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->text('descripcion')->nullable();
            $table->text('contenido')->nullable();
            $table->text('ventajas')->nullable();
            $table->text('caracteristicas')->nullable();
            $table->string('manual')->nullable();
            $table->string('despiece')->nullable();
            $table->string('orden')->nullable();
            $table->string('presentacion')->nullable();
            $table->string('imagen_presentacion')->nullable();
            $table->string('precio')->nullable();
            $table->enum('visible', ['publico', 'privado', 'ambos']);
            $table->enum('tipo', ['novedad', 'oferta', 'ninguna'])->nullable();
            $table->integer('categoria_id')->unsigned();
            $table->integer('rubro_id')->nullable()->unsigned();
            $table->integer('modelo_id')->unsigned()->nullable();

            $table->foreign('categoria_id')->references('id')->on('categorias')->onDelete('cascade');
            $table->foreign('rubro_id')->references('id')->on('rubros')->onDelete('cascade');
            $table->timestamps();
        });

        Schema::create('pedido_producto', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('pedido_id')->unsigned();
            $table->integer('producto_id')->unsigned();
            $table->string('cantidad');
            $table->string('costo');
            $table->string('iva');
            $table->string('total');
            $table->timestamps();

            $table->foreign('pedido_id')->references('id')->on('pedidos')->onDelete('cascade');
            $table->foreign('producto_id')->references('id')->on('productos')->onDelete('cascade');
        });

        Schema::create('modelo_producto', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('modelo_id')->unsigned();
            $table->integer('producto_id')->unsigned();
            $table->timestamps();

            $table->foreign('modelo_id')->references('id')->on('modelos')->onDelete('cascade');
            $table->foreign('producto_id')->references('id')->on('productos')->onDelete('cascade');
        });

        Schema::create('rubro_producto', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('rubro_id')->unsigned();
            $table->integer('producto_id')->unsigned();
            $table->timestamps();

            $table->foreign('rubro_id')->references('id')->on('rubros')->onDelete('cascade');
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
        Schema::dropIfExists('pedido_producto');
        Schema::dropIfExists('productos');
    }
}

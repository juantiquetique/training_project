<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->double('precioVenta',8,2); //cambie la palabra precio a precioVenta
            $table->integer('Cantidad');
            $table->foreignId('categoria_id')->constrained('categorias');
            $table->double('valorUnitario', 8,2); //esto es nuevo 
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
        Schema::table('products', function (Blueprint $table) {
            $table->dropForeign('products_categoria_id_foreign');
        });
        Schema::dropIfExists('products');
    }
}

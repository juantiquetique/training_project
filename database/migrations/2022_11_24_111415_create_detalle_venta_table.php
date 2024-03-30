<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetalleVentaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalle_venta', function (Blueprint $table) {
            $table->id();
            $table->foreignId('ventas_id')->constrained('ventas');
            $table->foreignId('products_id')->constrained('products');
            $table->integer('cantidad');
            $table->double('valor_unitario');
            $table->double('subtotal');
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
        Schema::table('detalle_venta', function (Blueprint $table) {
            $table->dropForeign('detalle_venta_ventas_id_foreign');
            $table->dropForeign('detalle_venta_products_id_foreign');
        });

        Schema::dropIfExists('detalle_venta');
    }
}

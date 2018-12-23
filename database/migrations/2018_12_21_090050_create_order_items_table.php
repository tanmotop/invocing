<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_items', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('order_id')->comment('订单ID');
            $table->unsignedInteger('item_id')->comment('商品ID');
            $table->tinyInteger('price_type')->comment('价格类型0会员价1零售价2赠送3自用4其他');
            $table->unsignedInteger('quantity')->comment('数量');
            $table->decimal('unit_price')->comment('单价');
            $table->decimal('total_price')->comment('总价');
            $table->decimal('paid_price')->comment('实收价格');
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
        Schema::dropIfExists('order_items');
    }
}

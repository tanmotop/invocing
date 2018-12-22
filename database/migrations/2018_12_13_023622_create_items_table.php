<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->comment('商品名');
            $table->string('sn')->comment('商品编号');
            $table->integer('stock')->comment('库存')->default(0);
            $table->decimal('purchase_price')->comment('进货价')->default(0);
            $table->decimal('member_price')->comment('会员价')->default(0);
            $table->decimal('retail_price')->comment('零售价')->default(0);
            $table->unsignedTinyInteger('status')->comment('状态0下架1上架')->default(1);
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
        Schema::dropIfExists('items');
    }
}

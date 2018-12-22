<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePurchaseRecordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('purchase_records', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('item_id')->comment('商品ID');
            $table->unsignedInteger('boxes')->comment('件数')->default(0);
            $table->unsignedInteger('per_box')->comment('每件数量')->default(0);
            $table->unsignedInteger('quantity')->comment('数量')->default(0);
            $table->decimal('purchase_price')->comment('进货价')->default(0);
            $table->decimal('member_price')->comment('会员价')->default(0);
            $table->decimal('retail_price')->comment('零售价')->default(0);
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
        Schema::dropIfExists('purchase_records');
    }
}

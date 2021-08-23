<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShopGoodsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('my_shop_goods', function (Blueprint $table) {
            $table->id();
            $table->string('goods_name');
            $table->integer('category_id')->index();
            $table->string('goods_image');
            $table->decimal('shop_price',10,2)->default(0);
            $table->decimal('market_price',10,2)->default(0);
            $table->string('description')->nullable();
            $table->text('content');
            $table->timestamps();
            $table->engine = 'InnoDB';
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('my_shop_goods');
    }
}

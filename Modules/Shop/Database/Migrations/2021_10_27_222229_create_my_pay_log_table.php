<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMyPayLogTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('my_pay_log', function (Blueprint $table) {
            $table->id();
            $table->string('trade_no',50)->unique();
            $table->integer('user_id')->index();
            $table->integer('goods_id');
            $table->decimal('total_amount',10);
            $table->tinyInteger('status')->default(0);
            $table->integer('pay_time')->default(0);
            $table->string('pay_type');
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
        Schema::dropIfExists('my_pay_log');
    }
}

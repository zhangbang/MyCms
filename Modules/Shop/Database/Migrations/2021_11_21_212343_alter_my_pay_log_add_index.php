<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterMyPayLogAddIndex extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('my_pay_log', function (Blueprint $table) {
            $table->index(['user_id', 'trade_type'], 'user_id_trade_type');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('my_pay_log', function (Blueprint $table) {
            $table->dropIndex('user_id_trade_type');
        });
    }
}

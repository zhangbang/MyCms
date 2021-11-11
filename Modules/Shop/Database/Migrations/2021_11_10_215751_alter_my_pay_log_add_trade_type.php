<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterMyPayLogAddTradeType extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('my_pay_log', function (Blueprint $table) {
            $table->string('trade_type')->after('trade_no')->index();
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
            $table->dropColumn('trade_type');
        });
    }
}

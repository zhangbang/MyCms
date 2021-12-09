<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterMyAddonTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('my_addon', function (Blueprint $table) {
            $table->tinyInteger('is_menu')->after('author')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('my_addon', function (Blueprint $table) {
            $table->dropColumn('is_menu');
        });
    }
}

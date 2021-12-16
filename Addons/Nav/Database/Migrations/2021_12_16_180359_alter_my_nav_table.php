<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterMyNavTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('my_nav', function (Blueprint $table) {
            $table->string('style_css')->after('sort')->nullable();
            $table->string('style_class')->after('sort')->nullable();
            $table->string('style_id')->after('sort')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('my_nav', function (Blueprint $table) {
            $table->dropColumn(['style_css', 'style_class', 'style_id']);
        });
    }
}

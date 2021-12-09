<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMyRegionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('my_region', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('pid');
            $table->integer('level');
            $table->string('adcode');
            $table->string('center');

            $table->index(['pid','level']);
            $table->index(['adcode']);
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
        Schema::dropIfExists('my_region');
    }
}

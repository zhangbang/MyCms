<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMySystemMenuTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('my_system_menu', function (Blueprint $table) {
            $table->id();
            $table->integer('pid');
            $table->string('title', 50);
            $table->string('icon',50);
            $table->string('url')->nullable();
            $table->string('target',20);
            $table->smallInteger('sort');
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
        Schema::dropIfExists('my_system_menu');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMySystemLogTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('my_system_log', function (Blueprint $table) {
            $table->id();
            $table->integer('admin_id');
            $table->string('admin_name');
            $table->string('url');
            $table->string('method', 10);
            $table->tinyInteger('is_ajax');
            $table->string('ip', 15);
            $table->text('param');
            $table->text('useragent');

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
        Schema::dropIfExists('my_system_log');
    }
}

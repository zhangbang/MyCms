<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMySystemConfig extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('my_system_config', function (Blueprint $table) {
            $table->id();
            $table->string('cfg_key',50);
            $table->string('cfg_val');
            $table->string('cfg_group',50);
            $table->timestamps();

            $table->index(['cfg_group', 'cfg_key'],'cfg_group_key_index');
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
        Schema::dropIfExists('my_system_config');
    }
}

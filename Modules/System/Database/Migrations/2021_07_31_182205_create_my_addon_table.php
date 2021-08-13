<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMyAddonTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('my_addon', function (Blueprint $table) {
            $table->id();

            $table->string('ident',50)->unique();
            $table->string('name',50);
            $table->string('version',15);
            $table->string('description');
            $table->string('author',50);
            $table->tinyInteger('is_init')->default(0);
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
        Schema::dropIfExists('my_addon');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMyUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('my_user', function (Blueprint $table) {
            $table->id();
            $table->string('name', 50)->unique();
            $table->char('mobile', 11)->unique();
            $table->string('password');
            $table->tinyInteger('status')->default(1);
            $table->decimal('balance', 10, 2)->default(0);
            $table->decimal('point', 10, 2)->default(0);
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
        Schema::dropIfExists('my_user');
    }
}

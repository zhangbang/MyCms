<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMyUserBalanceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('my_user_balance', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->index();
            $table->decimal('before',10,2);
            $table->decimal('balance',10,2);
            $table->decimal('after',10,2);
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
        Schema::dropIfExists('my_user_balance');
    }
}

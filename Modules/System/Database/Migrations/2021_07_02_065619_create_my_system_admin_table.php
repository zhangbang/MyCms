<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMySystemAdminTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('my_system_admin', function (Blueprint $table) {
            $table->id();
            $table->string('name', 30)->unique();
            $table->string('password');
            $table->integer('login_num')->default(0);
            $table->tinyInteger('status')->default(0);
            $table->tinyInteger('role_id')->default(0);
            $table->string('remark')->nullable();
            $table->timestamp('last_login_time')->nullable();
            $table->string('last_login_ip', 15)->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('my_system_admin');
    }
}

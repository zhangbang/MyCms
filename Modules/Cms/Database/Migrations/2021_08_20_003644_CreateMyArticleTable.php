<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMyArticleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('my_article', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->integer('category_id')->index();
            $table->string('description')->nullable();
            $table->string('img')->nullable();
            $table->string('author')->nullable();
            $table->longText('content');
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
        Schema::dropIfExists('my_article');
    }
}

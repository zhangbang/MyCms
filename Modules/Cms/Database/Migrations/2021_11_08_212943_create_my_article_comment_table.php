<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMyArticleCommentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('my_article_comment', function (Blueprint $table) {
            $table->id();
            $table->integer('single_id');
            $table->integer('user_id');
            $table->integer('root_id');
            $table->integer('parent_id');
            $table->tinyInteger('status')->default(0);
            $table->text('content');
            $table->timestamps();

            $table->index(['single_id', 'status', 'root_id']);
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
        Schema::dropIfExists('my_article_comment');
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->nullable();
            $table->string('email')->nullable();
            $table->string('comment', 1000)->nullable();
            $table->boolean('approved')->default(1);
            $table->integer('comment_post_id')->unsigned()->index()->nullable();
            $table->foreign('comment_post_id')->references('id')->on('posts')->onUpdate('cascade')->onDelete('set null');

            $table->integer('comment_user_id')->unsigned()->index()->nullable();
            $table->foreign('comment_user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('set null');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('commets');
    }
}

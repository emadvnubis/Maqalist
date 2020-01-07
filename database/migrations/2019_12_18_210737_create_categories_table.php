<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      // Categories Table
      Schema::create('categories', function (Blueprint $table) {
          $table->engine = 'InnoDB';
          $table->increments('id');
          $table->string('name');
          $table->string('slug')->unique()->default(null);
          $table->timestamps();
      });

      // Sub Categories Table
      Schema::create('sub_categories', function (Blueprint $table) {
          $table->engine = 'InnoDB';
          $table->increments('id');
          $table->string('name');
          $table->string('slug')->unique()->default(null);
          $table->string('image')->nullable();
          $table->integer('cat_id')->unsigned()->index()->nullable();
          $table->foreign('cat_id')->references('id')->on('categories')->onUpdate('cascade')->onDelete('set null');
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
        Schema::dropIfExists('categories');
        Schema::dropIfExists('sub_categories');
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->bigInteger('user_id');
            $table->bigInteger('category_id')->index('category_id');
            $table->bigInteger('city_id')->index('city_id');

            $table->string('title');
            $table->text('description');
            $table->double('price')->default(0);

            $table->boolean('active')->default(true);
            $table->integer('views')->default(0);
            $table->string('main_image')->nullable();
            $table->text('images')->nullable();

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
        Schema::dropIfExists('posts');
    }
}

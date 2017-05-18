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
            $table->increments('id');
            $table->integer('m_u_a_id')->unsigned();
            $table->string('title');
            $table->string('slug');
            $table->string('content');
            $table->string('tags')->nullable();
            $table->timestamps();
            $table->integer('created_by')->unsigned();
            $table->foreign('m_u_a_id')->references('id')->on('muas');
            $table->foreign('created_by')->references('id')->on('users');
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

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Eloquent\SoftDeletes;

class CreatePostsTable extends Migration
{
    use SoftDeletes;
    
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('creator');
            $table->string('title');
            $table->text('content');
            $table->unsignedInteger('thread');
            $table->timestamps();
            $table->softDeletes();
            
            $table->foreign('creator')->references('id')->on('users');
            $table->foreign('thread')->references('id')->on('threads');
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

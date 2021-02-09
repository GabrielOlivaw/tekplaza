<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Eloquent\SoftDeletes;

class CreateThreadsTable extends Migration
{
    use SoftDeletes;
    
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('threads', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('creator');
            $table->string('title');
            $table->boolean('locked');
            $table->boolean('pinned');
            $table->unsignedInteger('subforum');
            $table->timestamps();
            $table->softDeletes();
            
            $table->foreign('creator')->references('id')->on('users');
            $table->foreign('subforum')->references('id')->on('subforums');
        });
    }
    
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        Schema::dropIfExists('threads');
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}

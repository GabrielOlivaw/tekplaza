<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubforumBansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subforum_bans', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('banned_user');
            $table->unsignedInteger('moderator');
            $table->unsignedInteger('subforum');
            $table->unsignedInteger('days');
            $table->string('motive');
            $table->timestamps();
            $table->softDeletes();
            
            $table->foreign('banned_user')->references('id')->on('users');
            $table->foreign('moderator')->references('id')->on('users');
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
        Schema::dropIfExists('subforum_bans');
    }
}

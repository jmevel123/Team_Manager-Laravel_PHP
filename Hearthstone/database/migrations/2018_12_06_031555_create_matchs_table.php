<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMatchsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('matchs', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('team1_id')->unsigned();
            $table->integer('team2_id')->unsigned();
            $table->integer('score_1');
            $table->integer('score_2');
            $table->integer('winner_id')->unsigned()->nullable();
            $table->string('placement', 100);
            $table->timestamps();

        });

        // Schema::table('matchs', function(Blueprint $table) {
        //     $table->foreign('team1_id')->references('id')->on('teams');
        //     $table->foreign('team2_id')->references('id')->on('teams');
        //     $table->foreign('winner_id')->references('id')->on('teams');
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('matchs');
    }
}


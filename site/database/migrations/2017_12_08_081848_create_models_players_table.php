<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateModelsPlayersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('players', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('picture');
            $table->integer('height');
            $table->integer('weight');
            $table->integer('born');
            $table->string('position')->nullable();
            $table->integer('points')->nullable();
            $table->integer('rebounds')->nullable();
            $table->integer('assists')->nullable();
            $table->integer('team_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('players');
    }
}

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
        Schema::create('matchs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_receive_team');
            $table->integer('id_visitor_team');
            $table->date('date');
            $table->integer('time')->nullable();
            $table->enum('state', ['unstarted', 'in_progress', 'finish'])->default('unstarted');
            $table->string('score')->nullable();
            $table->string('place')->nullable();
            $table->string('starters_receive')->nullable();
            $table->string('starters_visitor')->nullable();
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
        Schema::dropIfExists('matchs');
    }
}

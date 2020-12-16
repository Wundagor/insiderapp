<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTablesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tables', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('team_id');
            $table->foreign('team_id')->references('id')->on('teams')->onDelete('cascade');
            $table->tinyInteger('points')->default(0);
            $table->tinyInteger('played')->default(0);
            $table->tinyInteger('won')->default(0);
            $table->tinyInteger('drawn')->default(0);
            $table->tinyInteger('lost')->default(0);
            $table->tinyInteger('gd')->default(0);
            $table->tinyInteger('percent')->default(config('game.percent'));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tables');
    }
}

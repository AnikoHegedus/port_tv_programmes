<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePortTvProgrammesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('port_tv_programmes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('channel');
            $table->string('start');
            $table->string('title');
            $table->string('description');
            $table->string('date');
            $table->string('age_limit');
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
        Schema::dropIfExists('port_tv_programmes');
    }
}

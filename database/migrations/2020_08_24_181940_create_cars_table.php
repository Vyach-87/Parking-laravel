<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cars', function (Blueprint $table) {
          //$table->bigIncrements('id');
          $table->string('phone', 11);
          $table->string('mark', 25);
          $table->string('model', 15);
          $table->string('body_color', 25);
          $table->string('g_num', 9)->primary();
          $table->char('park_flag', 1);
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
        Schema::dropIfExists('cars');
    }
}

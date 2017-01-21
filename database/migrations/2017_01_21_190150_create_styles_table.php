<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStylesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('styles', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('store_id')->nullable();
            $table->string('a')->nullable();
            $table->string('a_hover')->nullable();
            $table->string('a_click')->nullable();
            $table->string('btn')->nullable();
            $table->string('btn_hover')->nullable();
            $table->string('txt_hover')->nullable();
            $table->string('txt_border_hover')->nullable();
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
        Schema::dropIfExists('styles');
    }
}

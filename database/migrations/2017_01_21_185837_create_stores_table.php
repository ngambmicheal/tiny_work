<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stores', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->nullable();
            $table->string('email')->nullable();
            $table->string('username')->nullable();
            $table->string('phone')->nullable();
            $table->string('mobile')->nullable();
            $table->integer('category_id')->nullable();
            $table->string('location')->nullable();
            $table->integer('area_id')->nullable();
            $table->integer('store_views')->nullable();
            $table->integer('store_employment_id')->nullable();
            $table->string('website')->nullable();
            $table->string('facebook')->nullable();
            $table->string('twitter')->nullable();
            $table->string('instagram')->nullable();
            $table->string('achievements')->nullable();
            $table->string('impressum')->nullable();
            $table->text('description')->nullable();
            $table->string('tagline')->nullable();
            $table->text('about')->nullable();

            $table->string('min_wage')->nullable();
            $table->string('max_wage')->nullable();
            $table->string('wage_message')->nullable();
            $table->string('logo')->nullable();
           
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
        Schema::dropIfExists('stores');
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('url')->nullable();
            $table->string('title')->nullable();
            $table->text('description')->nullable();
            $table->string('price')->nullable();
            $table->string('img')->nullable();
            $table->integer('store_id')->nullable();
            $table->integer('category_id')->nullable();
            $table->string('discount_price')->nullable();
            $table->string('name')->nullable();
            $table->string('desc')->nullable();
            $table->integer('quantity')->nullable();
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
        Schema::dropIfExists('products');
    }
}

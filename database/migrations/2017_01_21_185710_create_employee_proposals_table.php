<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployeeProposalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employee_proposals', function (Blueprint $table) {
            $table->increments('id');
            $table->string('salary')->nullable();
            $table->string('message')->nullable();
            $table->string('status')->nullable()->default('pending');
            $table->string('reason')->nullable();
            $table->string('store_id')->nullable();
            $table->integer('user_id')->nullable();
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
        Schema::dropIfExists('employee_proposals');
    }
}

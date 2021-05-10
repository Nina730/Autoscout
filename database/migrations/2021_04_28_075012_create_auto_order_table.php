<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAutoOrderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('auto_order', function (Blueprint $table) {
            $table->bigInteger('order_id')->unsigned();
            $table->bigInteger('auto_id')->unsigned();
            $table->integer('quantity');

            $table->foreign('order_id')->references('id')->on('orders')->onDelete('cascade');
            $table->foreign('auto_id')->references('id')->on('autos')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('auto_order');
    }
}
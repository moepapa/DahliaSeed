<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_items', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->unsignedBigInteger('order_id')->index();
            $table->unsignedBigInteger('seedling_id')->index();
            $table->unsignedInteger('quantity');
            $table->decimal('price', 20, 6);

            $table->foreign('order_id')->references('id')->on('orders')->onDelete('cascade');
            $table->foreign('seedling_id')->references('id')->on('seedlings')->onDelete('cascade');

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
        Schema::dropIfExists('order_items');
    }
}
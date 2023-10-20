<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carts', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('avatar',255)->nullable();
            $table->double('export_price');
            $table->integer('quantity');
            $table->foreignId('product_id')->references('id')->on('products');
            $table->foreignId('customer_id')->references('id')->on('users');
            $table->string('size');
            $table->string('color');
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
        Schema::dropIfExists('carts');
    }
};
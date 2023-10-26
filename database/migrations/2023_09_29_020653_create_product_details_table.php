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
        Schema::create('product_details', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('quantity');
            // $table->double('import_price');
            // $table->double('export_price');
            // $table->double('discount');
            // $table->string('avatar',255)->nullable();
            // $table->foreignId('color_id')->references('id')->on('colors');
            $table->foreignId('size_id')->references('id')->on('sizes');
            $table->foreignId('product_id')->references('id')->on('products');
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
        Schema::dropIfExists('product_details');
    }
};
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
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->double('import_price');
            $table->double('export_price');
            $table->double('discount')->nullable();
            $table->string('avatar',255)->nullable();
            $table->string('object_id')->nullable();
            $table->boolean('product_status')->nullable();
            $table->boolean('hot_status')->nullable();
            $table->boolean('best_seller_status')->nullable();
            $table->foreignId('color_id')->references('id')->on('colors');
            $table->foreignId('type_product_id')->references('id')->on('type_products');
            $table->foreignId('design_id')->nullable()->references('id')->on('designs');
            $table->foreignId('gender_id')->references('id')->on('genders');
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
};
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
        Schema::create('orders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->dateTime('order_date');
            $table->string('full_name');
            $table->string('pay_method');
            $table->string('email');
            $table->string('phone_number');
            $table->string('city');
            $table->string('district');
            $table->string('ward');
            $table->string('street');
            $table->string('status');
            $table->foreignId('customer_id')->references('id')->on('users');
            $table->foreignId('employee_id')->references('id')->on('users');
            $table->foreignId('deliver_id')->references('id')->on('delivers');
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
        Schema::dropIfExists('orders');
    }
};

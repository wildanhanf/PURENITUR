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
            $table->id();
            $table->integer('user_id');
            $table->json('cart');
            $table->decimal('price_total', 10);
            $table->integer('discount_id');
            $table->decimal('final_price', 10);
            $table->integer('transaction_id');
            $table->string('payment_type');
            $table->string('status_payment');
            $table->string('image_payment');
            $table->integer('shipment_id');
            $table->string('shipment_status');
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

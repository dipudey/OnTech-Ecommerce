<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
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
            $table->string('payment_type');
            $table->string('payment_id');
            $table->string('paying_amount');
            $table->string('blnc_transection')->nullable();
            $table->string('product_order_id');
            $table->string('subtotal');
            $table->string('shipping');
            $table->string('vat')->nullable();
            $table->string('total');
            $table->integer('status')->default(0);
            $table->date('date')->nullable();
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
}

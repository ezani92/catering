<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->integer('status')->default(0);
            $table->string('hash_id');
            $table->integer('user_id');
            $table->integer('package_id');
            $table->integer('set_id');
            $table->integer('pax');
            $table->decimal('set_price',10,2)->nullable();
            $table->decimal('addon_price',10,2)->nullable();
            $table->decimal('transport_price',10,2)->nullable();
            $table->decimal('gst_price',10,2)->nullable();
            $table->decimal('grand_price',10,2)->nullable();

            $table->integer('is_coupon')->default(0);
            $table->integer('coupon_id')->nullable();

            $table->string('courses_categories')->nullable();
            $table->string('courses')->nullable();
            $table->string('addon_id')->nullable();
            $table->string('addon_quantity')->nullable();

            $table->string('checkout_date');
            $table->string('checkout_time');
            $table->string('checkout_delivery_address_1')->nullable();
            $table->string('checkout_delivery_address_2')->nullable();
            $table->string('checkout_delivery_postcode')->nullable();
            $table->string('checkout_delivery_city');
            $table->string('checkout_delivery_state');
            $table->integer('checkout_lift')->nullable();
            $table->text('checkout_request')->nullable();
            $table->text('checkout_note')->nullable();
            $table->string('checkout_lat')->nullable();
            $table->string('checkout_long')->nullable();

            $table->string('billplz_id')->nullable();
            $table->string('billplz_url')->nullable();
            $table->string('billplz_amount')->nullable();
            $table->string('billplz_status')->nullable();



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

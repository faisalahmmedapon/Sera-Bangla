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
            $table->id();
            $table->string('product_name');
            $table->string('product_name_slug');
            $table->integer('product_quantity');
            $table->string('product_sku');
            $table->integer('product_selling_price');
            $table->integer('product_discount_type');
            $table->integer('product_discount');
            $table->integer('product_discount_price');
            $table->integer('product_brand_id')->nullable();
            $table->longText('product_short_description');
            $table->longText('product_description');
            $table->longText('product_specification');
            $table->longText('product_image');
            $table->string('status');
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

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('products', function (Blueprint $table) {
    
            $table->foreign('catalog_id')->references('id')->on('catalog')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreign('color_id')->references('id')->on('color')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreign('size_id')->references('id')->on('size')->cascadeOnDelete()->cascadeOnUpdate();
        });
    
        Schema::table('order', function (Blueprint $table) {
            // Table "order"=>"users"
            $table->foreign('user_id')->references('id')->on('users')->cascadeOnDelete()->cascadeOnUpdate();
        });
        Schema::table('order_detail', function (Blueprint $table) {
            // Table "order_detail"=>"Users" + "order"
            $table->foreign('user_id')->references('id')->on('users')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreign('order_id')->references('id')->on('order')->cascadeOnDelete()->cascadeOnUpdate();
        });
        Schema::table('rate', function (Blueprint $table) {
            // Table "Rate"=>"Users" + "Rate"=>"Products"
            $table->foreign('user_id')->references('id')->on('users')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreign('product_id')->references('id')->on('products')->cascadeOnDelete()->cascadeOnUpdate();
        });
       
        Schema::table('image_products', function (Blueprint $table) {
            $table->foreign('product_id')->references('id')->on('products')->cascadeOnDelete()->cascadeOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('foreignkey');
    }
};

<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('products', function(Blueprint $table)
        {
            $table->increments('id');
            $table->string('title');
            $table->integer('price');
            $table->text('description');
            $table->string('brand')->nullable();
            $table->integer('category_id')->unsigned();
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
            $table->unsignedInteger('producible_id');
            $table->string('producible_type');
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('products_globex', function(Blueprint $table)
        {
            $table->increments('id');
            $table->integer('stock');
            $table->integer('price_rule_id')->unsigned()->nullable();
            $table->foreign('price_rule_id')->references('id')->on('price_rules')->onDelete('cascade');
            $table->unsignedInteger('globexable_id');
            $table->string('globexable_type');
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('products_ads', function(Blueprint $table)
        {
            $table->increments('id');
            $table->integer('customer_id')->unsigned();
            $table->foreign('customer_id')->references('id')->on('customers')->onDelete('cascade');
            $table->string('name');
            $table->integer('pin');
            $table->text('address');
            $table->unsignedInteger('emirate_id');
            $table->foreign('emirate_id')->references('id')->on('emirates');
//            $table->string('city');
            $table->string('phone');
            $table->integer('quantity')->default(1);
            $table->unsignedInteger('advertisable_id');
            $table->string('advertisable_type');
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('products_motors', function(Blueprint $table)
        {
            $table->increments('id');
            $table->string('chassis_no');
            $table->string('model');
            $table->string('color');
            $table->tinyInteger('doors');
            $table->timestamps();
            $table->softDeletes();
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
        Schema::dropIfExists('products_globex');
        Schema::dropIfExists('products_ads');
        Schema::dropIfExists('products_motors');
	}

}

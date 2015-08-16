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
            $table->string('brand');
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
            $table->string('state')->nullable();
            $table->string('city');
            $table->string('phone');
            $table->string('quantity')->default(1);
            $table->unsignedInteger('advertisable_id');
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

        Schema::create('motorables', function (Blueprint $table) {
            $table->unsignedInteger('motor_id');
            $table->foreign('motor_id')->references('id')->on('products_motors')->onDelete('cascade');
            $table->unsignedInteger('motorable_id');
            $table->string('motorable_type');
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
        Schema::dropIfExists('motorables');
        Schema::dropIfExists('products_motors');
	}

}

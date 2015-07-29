<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('categories', function(BluePrint $table) {
			$table->increments('id');
			$table->string('name');
			$table->timestamps();
		});
		Schema::create('sub_categories', function(BluePrint $table) {
			$table->increments('id');
			$table->string('name');
			$table->integer('category_id')->unsigned();
			$table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
			$table->timestamps();
		});
		Schema::create('post_sub_cats', function(BluePrint $table) {
			$table->increments('id');
			$table->string('name');
			$table->integer('sub_category_id')->unsigned();
			$table->foreign('sub_category_id')->references('id')->on('sub_categories')->onDelete('cascade');
			$table->timestamps();
		});
		Schema::create('pricing_rules', function(BluePrint $table) {
			$table->increments('id');
			$table->string('name');
			$table->integer('percent');
            $table->integer('duration');
			$table->timestamps();
		});
		Schema::create('products', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('name');
			$table->integer('cost');
			$table->integer('stock');
			$table->text('desc');
			$table->string('brand');
			$table->integer('post_sub_cat_id')->unsigned();
			$table->foreign('post_sub_cat_id')->references('id')->on('post_sub_cats')->onDelete('cascade');
			$table->boolean('reseller')->default(false);
			$table->integer('pricing_rule_id')->unsigned()->nullable();
			$table->foreign('pricing_rule_id')->references('id')->on('pricing_rules')->onDelete('cascade');
			$table->timestamps();
		});
        Schema::create('orders', function(Blueprint $table)
        {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->integer('product_id')->unsigned();
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
            $table->integer('qty')->default(1);
            $table->timestamps();
        });
        Schema::create('shippers', function(Blueprint $table)
        {
            $table->increments('id');
            $table->string('name');
            $table->integer('cost');
            $table->timestamps();
        });
        Schema::create('shipments', function(Blueprint $table)
        {
            $table->increments('id');
            $table->integer('order_id')->unsigned();
            $table->foreign('order_id')->references('id')->on('orders')->onDelete('cascade');
            $table->integer('shipper_id')->unsigned();
            $table->foreign('shipper_id')->references('id')->on('shippers')->onDelete('cascade');
            $table->integer('status');
            $table->timestamps();
        });
        Schema::create('transactions', function(Blueprint $table)
        {
            $table->increments('id');
            $table->integer('order_id')->unsigned();
            $table->foreign('order_id')->references('id')->on('orders')->onDelete('cascade');
			$table->integer('amount');
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
        Schema::dropIfExists('transactions');
        Schema::dropIfExists('shipments');
        Schema::dropIfExists('shippers');
        Schema::dropIfExists('orders');
        Schema::dropIfExists('products');
		Schema::dropIfExists('pricing_rules');
		Schema::dropIfExists('post_sub_cats');
		Schema::dropIfExists('sub_categories');
		Schema::dropIfExists('categories');
	}

}

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
		Schema::create('customers', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('name');
			$table->string('email')->unique();
			$table->string('password', 60);
            $table->boolean('active')->default(true);
			$table->rememberToken();
			$table->timestamps();
			$table->softDeletes();
		});
		Schema::create('admins', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('name');
			$table->string('email')->unique();
			$table->string('password', 60);
            $table->boolean('active')->default(true);
			$table->rememberToken();
			$table->timestamps();
			$table->softDeletes();
		});
		Schema::create('roles', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('name');
			$table->timestamps();
			$table->softDeletes();
		});
		Schema::create('admins_roles', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('admin_id')->unsigned();
			$table->foreign('admin_id')->references('id')->on('admins')->onDelete('cascade');
			$table->integer('role_id')->unsigned();
			$table->foreign('role_id')->references('id')->on('roles')->onDelete('cascade');
			$table->timestamps();
		});
		Schema::create('categories', function(BluePrint $table) {
			$table->increments('id');
			$table->string('name');
            $table->integer('parent');
			$table->timestamps();
			$table->softDeletes();
		});
		Schema::create('sub_categories', function(BluePrint $table) {
			$table->increments('id');
			$table->string('name');
			$table->integer('category_id')->unsigned();
			$table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
			$table->timestamps();
			$table->softDeletes();
		});
		Schema::create('post_sub_cats', function(BluePrint $table) {
			$table->increments('id');
			$table->string('name');
			$table->integer('sub_category_id')->unsigned();
			$table->foreign('sub_category_id')->references('id')->on('sub_categories')->onDelete('cascade');
			$table->timestamps();
			$table->softDeletes();
		});
		Schema::create('price_rules', function(BluePrint $table) {
			$table->increments('id');
			$table->string('name');
			$table->integer('percent');
            $table->integer('duration');
			$table->timestamps();
			$table->softDeletes();
		});
		Schema::create('products', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('name');
			$table->integer('price');
			$table->integer('stock');
			$table->text('desc');
			$table->string('brand');
			$table->integer('post_sub_cat_id')->unsigned();
			$table->foreign('post_sub_cat_id')->references('id')->on('post_sub_cats')->onDelete('cascade');
			$table->boolean('reseller')->default(false);
			$table->integer('pricing_rule_id')->unsigned()->nullable();
			$table->foreign('pricing_rule_id')->references('id')->on('pricing_rules')->onDelete('cascade');
			$table->timestamps();
			$table->softDeletes();
		});
        Schema::create('orders', function(Blueprint $table)
        {
            $table->increments('id');
            $table->integer('customer_id')->unsigned();
            $table->foreign('customer_id')->references('id')->on('customers')->onDelete('cascade');
            $table->timestamps();
			$table->softDeletes();
        });
        Schema::create('order_items', function(Blueprint $table)
        {
            $table->increments('id');
            $table->integer('order_id')->unsigned();
            $table->foreign('order_id')->references('id')->on('orders')->onDelete('cascade');
            $table->integer('quantity')->default(1);
            $table->float('price');
            $table->timestamps();
			$table->softDeletes();
        });
        Schema::create('shippers', function(Blueprint $table)
        {
            $table->increments('id');
            $table->string('name');
            $table->integer('cost');
            $table->timestamps();
			$table->softDeletes();
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
			$table->softDeletes();
        });
        Schema::create('transactions', function(Blueprint $table)
        {
            $table->increments('id');
            $table->integer('order_id')->unsigned();
            $table->foreign('order_id')->references('id')->on('orders')->onDelete('cascade');
			$table->integer('amount');
            $table->timestamps();
			$table->softDeletes();
        });
		Schema::create('advertisements', function(Blueprint $table)
		{
			$table->increments('id');
            $table->integer('customer_id')->unsigned();
            $table->foreign('customer_id')->references('id')->on('customers')->onDelete('cascade');
			$table->string('name');
			$table->integer('quantity')->default(1);
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
		Schema::dropIfExists('advertisements');
        Schema::dropIfExists('transactions');
        Schema::dropIfExists('shipments');
        Schema::dropIfExists('shippers');
        Schema::dropIfExists('order_items');
        Schema::dropIfExists('orders');
        Schema::dropIfExists('products');
		Schema::dropIfExists('price_rules');
		Schema::dropIfExists('post_sub_cats');
		Schema::dropIfExists('sub_categories');
		Schema::dropIfExists('categories');
		Schema::dropIfExists('admins_roles');
		Schema::dropIfExists('roles');
		Schema::dropIfExists('admins');
		Schema::dropIfExists('customers');
	}

}

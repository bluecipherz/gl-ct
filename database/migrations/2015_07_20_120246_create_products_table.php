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
			$table->integer('pricing_rule_id')->unsigned();
			$table->foreign('pricing_rule_id')->references('id')->on('pricing_rules')->onDelete('cascade');
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
		Schema::dropIfExists('pricing_rules');
		Schema::dropIfExists('post_sub_cats');
		Schema::dropIfExists('sub_categories');
		Schema::dropIfExists('categories');
	}

}

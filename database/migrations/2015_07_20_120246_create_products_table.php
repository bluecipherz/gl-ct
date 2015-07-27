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
		Schema::create('products', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('name');
			$table->integer('cost');
			$table->text('desc');
			$table->string('brand');
			$table->integer('post_sub_cat_id')->unsigned();
			$table->foreign('post_sub_cat_id')->references('id')->on('post_sub_cats')->onDelete('cascade');
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
		Schema::drop('products');
		Schema::drop('post_sub_cats');
		Schema::drop('sub_categories');
		Schema::drop('categories');
	}

}

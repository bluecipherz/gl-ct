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
            $table->integer('stock');
            $table->text('description');
            $table->string('brand');
            $table->integer('category_id')->unsigned();
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
            $table->integer('price_rule_id')->unsigned()->nullable();
            $table->foreign('price_rule_id')->references('id')->on('price_rules')->onDelete('cascade');
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
	}

}

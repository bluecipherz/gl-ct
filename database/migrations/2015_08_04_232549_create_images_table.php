<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateImagesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('reseller_images', function(Blueprint $table)
		{
			$table->increments('id');
            $table->unsignedInteger('customer_id');
			$table->foreign('customer_id')->references('id')->on('customers')->onDelete('cascade');
            $table->unsignedInteger('advertisement_id');
			$table->foreign('advertisement_id')->references('id')->on('advertisements')->onDelete('cascade');
            $table->text('url');
			$table->timestamps();
            $table->softDeletes();
		});
		Schema::create('product_images', function(Blueprint $table)
		{
			$table->increments('id');
            $table->unsignedInteger('product_id');
//			$table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
            $table->text('url');
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
		Schema::dropIfExists('reseller_images');
		Schema::dropIfExists('product_images');
	}

}

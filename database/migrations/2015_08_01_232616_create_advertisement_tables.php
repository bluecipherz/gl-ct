<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdvertisementTables extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
//        Schema::create('advertisements', function(Blueprint $table)
//        {
//            $table->increments('id');
//            $table->integer('customer_id')->unsigned();
//            $table->foreign('customer_id')->references('id')->on('customers')->onDelete('cascade');
//            $table->unsignedInteger('category_id');
//            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
//            $table->string('title');
//            $table->text('description');
//            $table->integer('quantity')->default(1);
//            $table->integer('price');
//            $table->text('name');
//            $table->integer('pin');
//            $table->text('address');
//            $table->string('state');
//            $table->string('city');
//            $table->string('phone');
//            $table->timestamps();
//            $table->softDeletes();
//        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
//        Schema::dropIfExists('advertisements');
	}


}

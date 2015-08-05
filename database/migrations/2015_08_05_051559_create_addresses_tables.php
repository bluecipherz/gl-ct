<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAddressesTables extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('addresses', function(Blueprint $table)
        {
            $table->increments('id');
            $table->unsignedInteger('advertisement_id');
            $table->foreign('advertisement_id')->references('id')->on('advertisements')->onDelete('cascade');
            $table->text('name');
            $table->integer('pin');
            $table->text('address');
            $table->string('state');
            $table->string('city');
            $table->string('phone');
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
        Schema::dropIfExists('addresses');
	}

}

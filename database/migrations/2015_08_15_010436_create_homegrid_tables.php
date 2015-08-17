<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHomegridTables extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('homegrids', function(Blueprint $table)
        {
            $table->increments('id');
            $table->string('name');
            $table->tinyInteger('rows');
            $table->tinyInteger('cols');
            $table->timestamps();
        });
        Schema::create('gridslots', function(Blueprint $table)
        {
            $table->increments('id');
            $table->unsignedInteger('homegrid_id');
            $table->foreign('homegrid_id')->references('id')->on('homegrids')->onDelete('cascade');
            $table->unsignedInteger('product_id');
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
            $table->tinyInteger('col');
            $table->tinyInteger('row');
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
        Schema::dropIfExists('gridslots');
		Schema::dropIfExists('homegrids');
	}

}

<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfileTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('profiles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('first_name', 50);
            $table->string('last_name', 50);
            $table->integer('pin');
            $table->text('address');
            $table->string('state');
            $table->string('city');
            $table->string('phone');
            $table->char('gender')->default('U');
            $table->date('dob');
            // $table->unsignedInteger('image_id')->nullable();
            // $table->foreign('image_id')->references('id')->on('images')->onDelete('cascade');
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
        Schema::dropIfExists('profiles');
	}

}

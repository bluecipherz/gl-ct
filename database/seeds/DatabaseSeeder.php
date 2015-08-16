<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder {

	protected $faker;
	
	public function getFaker() {
		if(empty($this->faker)) {
			$this->faker = Faker\Factory::create();
		}
		return $this->faker;
	}

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Model::unguard();

//		$this->call('RoleTableSeeder');
//		$this->call('AdminTableSeeder');
		$this->call('CategoryTableSeeder');
//		$this->call('CustomerTableSeeder');
//		$this->call('AdvertisementTableSeeder');
//		$this->call('PriceRuleTableSeeder');
//		$this->call('ProductTableSeeder');
//		$this->call('OrderTableSeeder');
//		$this->call('OrderItemTableSeeder');
//		$this->call('ShipperTableSeeder');
//		$this->call('ShipmentTableSeeder');
//		$this->call('TransactionTableSeeder');
	}

}

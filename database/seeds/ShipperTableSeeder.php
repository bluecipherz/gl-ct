<?php
 
use Illuminate\Database\Seeder;
 
class ShipperTableSeeder extends DatabaseSeeder {
 
    public function run()
    {
        // Uncomment the below to wipe the table clean before populating
        DB::table('shippers')->delete();
 
        $faker = $this->getFaker();
		
		for($i = 0; $i < 5; $i++)
		{
			App\Shipper::create([
				'name' => $faker->company,
				'charge' => rand(500, 1200)
			]);
		}
    }
 
}
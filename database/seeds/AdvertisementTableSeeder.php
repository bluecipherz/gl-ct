<?php
 
use Illuminate\Database\Seeder;
 
class AdvertisementTableSeeder extends DatabaseSeeder {
 
    public function run()
    {
        // Uncomment the below to wipe the table clean before populating
        DB::table('advertisements')->delete();
 
        $faker = $this->getFaker();
		
		for($i = 0; $i < 100; $i++)
		{
			App\Advertisement::create([
				'customer_id' => rand(1, 100),
				'title' => $faker->sentence(),
                'description' => $faker->paragraph()
			]);
		}
    }
 
}
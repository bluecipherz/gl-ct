<?php
 
use Illuminate\Database\Seeder;
 
class AdvertisementTableSeeder extends DatabaseSeeder {
 
    public function run()
    {
        // Uncomment the below to wipe the table clean before populating
        DB::table('advertisements')->delete();
 
        $faker = $this->getFaker();

        $categories = \App\Category::whereIsRoot()->first()->children->all();

		for($i = 0; $i < 100; $i++)
		{
            Category
			App\Advertisement::create([
				'customer_id' => rand(1, 100),
                'category_id' => $categories[rand(0, 11)]->
				'title' => $faker->sentence(),
                'description' => $faker->paragraph()
			]);
		}
    }
 
}
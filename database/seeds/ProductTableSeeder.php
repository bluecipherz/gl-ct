<?php

use Illuminate\Database\Seeder;
 
class ProductTableSeeder extends DatabaseSeeder {
 
    public function run()
    {
        // Uncomment the below to wipe the table clean before populating
        DB::table('products')->delete();
 
        $faker = $this->getFaker();
		
		for($i = 0; $i < 1000; $i++)
		{
			App\Product::create([
				'name' => $faker->sentence(rand(1, 3)),
				'price' => rand(5, 50000),
                'stock' => rand(0, 100),
                'description' => $faker->sentence(),
                'brand' => $faker->company,
                'category_id' => rand(1, 12),
                'price_rule_id' => rand(1, 10)
			]);
		}
    }
 
}
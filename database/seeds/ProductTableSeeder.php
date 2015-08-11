<?php

use Illuminate\Database\Seeder;
 
class ProductTableSeeder extends DatabaseSeeder {
 
    public function run()
    {
        // Uncomment the below to wipe the table clean before populating
        DB::table('products')->delete();
 
        $faker = $this->getFaker();

        $categories = App\Category::whereIsRoot()->first()->children->all();

		for($i = 0; $i < 1000; $i++)
		{
            $descendants = $categories[rand(0, 11)]->descendants()->get();
            $count = count($descendants);
			App\Product::create([
				'title' => $faker->sentence(rand(1, 3)),
				'price' => rand(5, 50000),
                'stock' => rand(0, 100),
                'description' => $faker->sentence(),
                'brand' => $faker->company,
                'category_id' => $descendants[rand(0, $count - 1)]->id,
                'price_rule_id' => rand(1, 10)
			]);
		}
    }
 
}
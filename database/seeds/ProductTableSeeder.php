<?php

class ProductTableSeeder extends DatabaseSeeder {
 
    public function run()
    {
        // Uncomment the below to wipe the table clean before populating
        DB::table('products_globex')->delete();

        $faker = $this->getFaker();

        $categories = App\Category::allLeaves()->get();
        $category_count = count($categories);

		for($i = 0; $i < 200; $i++)
		{
            $product = App\Product::create([
                'title' => $faker->sentence(rand(1, 3)),
                'price' => rand(5, 50000),
                'description' => $faker->sentence(),
                'brand' => $faker->company,
                'category_id' => $categories[rand(0, $category_count - 1)]->id,
            ]);
            $globex = App\Globex::create([
                'stock' => rand(0, 100),
                'price_rule_id' => rand(1, 10)
			]);
            $globex->product()->save($product);
		}
    }
 
}
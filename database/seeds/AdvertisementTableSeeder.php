<?php

 
class AdvertisementTableSeeder extends DatabaseSeeder {
 
    public function run()
    {
        // Uncomment the below to wipe the table clean before populating
        DB::table('products_ads')->delete();
 
        $faker = $this->getFaker();

        $categories = App\Category::allLeaves()->get();
        $category_count = count($categories);

		for($i = 0; $i < 100; $i++)
		{
            $product = App\Product::create([
                'category_id' => $categories[rand(0, $category_count - 1)]->id,
                'title' => $faker->sentence(),
                'description' => $faker->paragraph(),
                'price' => rand(1, 50000),
                'brand' => $faker->company,
            ]);
            $product->images()->create([
                'url' => '/img/noImage.jpg'
            ]);
			$ad = App\Advertisement::create([
				'customer_id' => rand(1, 100),
                'name' => $faker->name,
                'pin' => $faker->postcode,
                'address' => $faker->address,
                'state' => $faker->domainWord,
                'city' => $faker->city,
                'phone' => $faker->phoneNumber
			]);
            $ad->product()->save($product);
		}
    }
 
}
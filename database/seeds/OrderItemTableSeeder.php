<?php
 
use Illuminate\Database\Seeder;
 
class OrderItemTableSeeder extends Seeder {
 
    public function run()
    {
       // Uncomment the below to wipe the table clean before populating
        DB::table('order_items')->delete();
		
		for($i = 0; $i < 300; $i++)
		{
            $product = App\Globex::find(rand(1, 1000));

			App\OrderItem::create([
				'order_id' => rand(1, 100),
				'product_id' => $product->id,
                'price' => $product->price
			]);
		}
    }
 
}
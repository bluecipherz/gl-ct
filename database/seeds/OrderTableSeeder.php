<?php
 
use Illuminate\Database\Seeder;
 
class OrderTableSeeder extends Seeder {
 
    public function run()
    {
        // Uncomment the below to wipe the table clean before populating
        DB::table('orders')->delete();

		for($i = 0; $i < 100; $i++)
		{
			App\Order::create([
				'customer_id' => rand(1, 100),
			]);
		}
    }
 
}
<?php

use Illuminate\Database\Seeder;
 
class ShipmentTableSeeder extends Seeder {
 
    public function run()
    {
        // Uncomment the below to wipe the table clean before populating
        DB::table('shipments')->delete();
		
		for($i = 0; $i < 10; $i++)
		{
			App\Shipment::create([
				'order_id' => rand(1, 100),
				'shipper_id' => rand(1, 5),
                'distance' => rand(5, 2000),
                'status' => rand(1,2)
			]);
		}
    }
 
}
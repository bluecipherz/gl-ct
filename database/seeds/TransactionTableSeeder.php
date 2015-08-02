<?php
 
use Illuminate\Database\Seeder;

class TransactionTableSeeder extends Seeder {
 
    public function run()
    {
        // Uncomment the below to wipe the table clean before populating
        DB::table('transactions')->delete();

        $delivered = App\Shipment::delivered()->get();
		
		foreach($delivered as $delivery)
		{
            $order = $delivery->order;
			App\Transaction::create([
				'order_id' => $order->id,
				'amount' => $order->orderItems->sum('price')
			]);
		}
    }
 
}
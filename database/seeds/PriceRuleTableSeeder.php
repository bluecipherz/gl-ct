<?php
 
use Illuminate\Database\Seeder;
 
class PriceRuleTableSeeder extends DatabaseSeeder {
 
    public function run()
    {
        // Uncomment the below to wipe the table clean before populating
        DB::table('price_rules')->delete();
 
        $faker = $this->getFaker();
		
		for($i = 0; $i < 10; $i++)
		{
			App\PriceRule::create([
				'title' => $faker->sentence(),
				'percent' => rand(1, 25),
                'duration' => rand(10, 60)
			]);
		}
    }
 
}
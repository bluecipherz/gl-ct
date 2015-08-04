<?php
 
use Illuminate\Database\Seeder;
 
class CustomerTableSeeder extends DatabaseSeeder {
 
    public function run()
    {
       // Uncomment the below to wipe the table clean before populating
        DB::table('customers')->delete();
 
        $faker = $this->getFaker();
		
		for($i = 0; $i < 100; $i++)
		{
            $name = $faker->name;
			$email = $faker->email;
			$password = Hash::make("password");
			
			App\Customer::create([
//                'name' => $name, // moved to profile
				'email' => $email,
				'password' => $password
			]);
		}
    }
 
}
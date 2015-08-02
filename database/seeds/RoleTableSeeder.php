<?php
 
use Illuminate\Database\Seeder;
 
class RoleTableSeeder extends DatabaseSeeder {
 
    public function run()
    {
        // Uncomment the below to wipe the table clean before populating
        DB::table('roles')->delete();
 
        $faker = $this->getFaker();
		
		for($i = 0; $i < 10; $i++)
		{
			App\Role::create([
				'name' => $faker->unique()->word
			]);
		}
    }
 
}
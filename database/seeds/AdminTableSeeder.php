<?php
 
use Illuminate\Database\Seeder;
 
class AdminTableSeeder extends DatabaseSeeder {

    // role combinations
    protected $roles = [
        [1],
        [1, 2],
        [1, 3],
        [2, 5],
        [5, 6, 7],
        [3, 4, 6],
        [2, 7, 8],
        [1, 3, 4, 6],
        [3, 8, 9, 10],
        [1, 10]
    ];

    public function run()
    {
        // Uncomment the below to wipe the table clean before populating
        DB::table('admins')->delete();

        $faker = $this->getFaker();

        $roles = App\Role::all();
		
		for($i = 0; $i < 10; $i++)
		{
			$admin = App\Admin::create([
			    'name' => $faker->name,
			    'username' => $faker->unique()->userName,
				'email' => $faker->email,
				'password' => Hash::make("password")
			]);

            $admin->roles()->sync($this->roles[rand(0, 9)]);
		}
		
    }
 
}
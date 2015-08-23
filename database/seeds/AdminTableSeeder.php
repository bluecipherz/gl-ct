<?php
 
use Illuminate\Database\Seeder;
 
class AdminTableSeeder extends Seeder {

    public function run()
    {
        // Uncomment the below to wipe the table clean before populating
        DB::table('admins')->delete();

        App\Admin::create([
            'username' => 'rizwan965',
            'password' => Hash::make('torque@!?')
        ]);
		
    }
 
}
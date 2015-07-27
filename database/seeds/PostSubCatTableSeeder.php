<?php
 
use Illuminate\Database\Seeder;
 
class PostSubCatTableSeeder extends Seeder {
 
    public function run()
    {
        // Uncomment the below to wipe the table clean before populating
        DB::table('post_sub_cats')->delete();
 
        $cats = array(
            ['id' => 1, 'name' => 'AUDI', 'sub_category_id' => 1, 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => 2, 'name' => 'BMW', 'sub_category_id' => 1, 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => 3, 'name' => 'Ford', 'sub_category_id' => 1, 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => 4, 'name' => 'Land Rover', 'sub_category_id' => 1, 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => 5, 'name' => 'Mercedese-benz ', 'sub_category_id' => 1, 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => 6, 'name' => 'Ferrari', 'sub_category_id' => 1, 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => 7, 'name' => 'bentley', 'sub_category_id' => 1, 'created_at' => new DateTime, 'updated_at' => new DateTime],
        
		    ['id' => 8, 'name' => 'MotorBoats', 'sub_category_id' => 2, 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => 9, 'name' => 'Row/Paddle Boats', 'sub_category_id' => 2, 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => 10, 'name' => 'Sail Boats', 'sub_category_id' => 2, 'created_at' => new DateTime, 'updated_at' => new DateTime], 

			['id' => 11, 'name' => 'MotorBoats', 'sub_category_id' => 3, 'created_at' => new DateTime, 'updated_at' => new DateTime],
			['id' => 12, 'name' => 'MotorBoats', 'sub_category_id' => 3, 'created_at' => new DateTime, 'updated_at' => new DateTime],
			['id' => 13, 'name' => 'MotorBoats', 'sub_category_id' => 3, 'created_at' => new DateTime, 'updated_at' => new DateTime],
			
			['id' => 14, 'name' => 'MotorBoats', 'sub_category_id' => 4, 'created_at' => new DateTime, 'updated_at' => new DateTime],
			['id' => 15, 'name' => 'MotorBoats', 'sub_category_id' => 4, 'created_at' => new DateTime, 'updated_at' => new DateTime],
			['id' => 16, 'name' => 'MotorBoats', 'sub_category_id' => 4, 'created_at' => new DateTime, 'updated_at' => new DateTime],
			
			['id' => 17, 'name' => 'MotorBoats', 'sub_category_id' => 5, 'created_at' => new DateTime, 'updated_at' => new DateTime],
			['id' => 18, 'name' => 'MotorBoats', 'sub_category_id' => 5, 'created_at' => new DateTime, 'updated_at' => new DateTime],
			['id' => 19, 'name' => 'MotorBoats', 'sub_category_id' => 5, 'created_at' => new DateTime, 'updated_at' => new DateTime],
			
			['id' => 20, 'name' => 'MotorBoats', 'sub_category_id' => 5, 'created_at' => new DateTime, 'updated_at' => new DateTime],

			['id' => 21, 'name' => 'MotorBoats', 'sub_category_id' => 6, 'created_at' => new DateTime, 'updated_at' => new DateTime],

			['id' => 22, 'name' => 'MotorBoats', 'sub_category_id' => 6, 'created_at' => new DateTime, 'updated_at' => new DateTime],

			['id' => 23, 'name' => 'MotorBoats', 'sub_category_id' => 6, 'created_at' => new DateTime, 'updated_at' => new DateTime],

			['id' => 24, 'name' => 'MotorBoats', 'sub_category_id' => 6, 'created_at' => new DateTime, 'updated_at' => new DateTime],

			['id' => 25, 'name' => 'MotorBoats', 'sub_category_id' => 6, 'created_at' => new DateTime, 'updated_at' => new DateTime],

			['id' => 26, 'name' => 'MotorBoats', 'sub_category_id' => 7, 'created_at' => new DateTime, 'updated_at' => new DateTime],

			['id' => 27, 'name' => 'MotorBoats', 'sub_category_id' => 7, 'created_at' => new DateTime, 'updated_at' => new DateTime],

			['id' => 28, 'name' => 'MotorBoats', 'sub_category_id' => 7, 'created_at' => new DateTime, 'updated_at' => new DateTime],

			['id' => 29, 'name' => 'MotorBoats', 'sub_category_id' => 7, 'created_at' => new DateTime, 'updated_at' => new DateTime],

			['id' => 30, 'name' => 'MotorBoats', 'sub_category_id' => 8, 'created_at' => new DateTime, 'updated_at' => new DateTime],

			['id' => 31, 'name' => 'MotorBoats', 'sub_category_id' => 8, 'created_at' => new DateTime, 'updated_at' => new DateTime],

			['id' => 32, 'name' => 'MotorBoats', 'sub_category_id' => 8, 'created_at' => new DateTime, 'updated_at' => new DateTime],

			['id' => 33, 'name' => 'MotorBoats', 'sub_category_id' => 9, 'created_at' => new DateTime, 'updated_at' => new DateTime],

			['id' => 34, 'name' => 'MotorBoats', 'sub_category_id' => 9, 'created_at' => new DateTime, 'updated_at' => new DateTime],

			['id' => 35, 'name' => 'MotorBoats', 'sub_category_id' => 9, 'created_at' => new DateTime, 'updated_at' => new DateTime],

			['id' => 36, 'name' => 'MotorBoats', 'sub_category_id' => 9, 'created_at' => new DateTime, 'updated_at' => new DateTime],

			['id' => 37, 'name' => 'MotorBoats', 'sub_category_id' => 10, 'created_at' => new DateTime, 'updated_at' => new DateTime],

			['id' => 38, 'name' => 'MotorBoats', 'sub_category_id' => 10, 'created_at' => new DateTime, 'updated_at' => new DateTime],

			['id' => 39, 'name' => 'MotorBoats', 'sub_category_id' => 11, 'created_at' => new DateTime, 'updated_at' => new DateTime],

			['id' => 40, 'name' => 'MotorBoats', 'sub_category_id' => 11, 'created_at' => new DateTime, 'updated_at' => new DateTime],

			['id' => 41, 'name' => 'MotorBoats', 'sub_category_id' => 11, 'created_at' => new DateTime, 'updated_at' => new DateTime],

			['id' => 42, 'name' => 'MotorBoats', 'sub_category_id' => 12, 'created_at' => new DateTime, 'updated_at' => new DateTime],

			['id' => 43, 'name' => 'MotorBoats', 'sub_category_id' => 12, 'created_at' => new DateTime, 'updated_at' => new DateTime],

			['id' => 44, 'name' => 'MotorBoats', 'sub_category_id' => 12, 'created_at' => new DateTime, 'updated_at' => new DateTime],

			['id' => 45, 'name' => 'MotorBoats', 'sub_category_id' => 12, 'created_at' => new DateTime, 'updated_at' => new DateTime],

			['id' => 46, 'name' => 'MotorBoats', 'sub_category_id' => 12, 'created_at' => new DateTime, 'updated_at' => new DateTime],

			['id' => 47, 'name' => 'MotorBoats', 'sub_category_id' => 12, 'created_at' => new DateTime, 'updated_at' => new DateTime],

			['id' => 48, 'name' => 'MotorBoats', 'sub_category_id' => 12, 'created_at' => new DateTime, 'updated_at' => new DateTime],

			['id' => 49, 'name' => 'MotorBoats', 'sub_category_id' => 12, 'created_at' => new DateTime, 'updated_at' => new DateTime],

			['id' => 50, 'name' => 'MotorBoats', 'sub_category_id' => 12, 'created_at' => new DateTime, 'updated_at' => new DateTime],

			['id' => 51, 'name' => 'MotorBoats', 'sub_category_id' => 12, 'created_at' => new DateTime, 'updated_at' => new DateTime],

			['id' => 52, 'name' => 'MotorBoats', 'sub_category_id' => 12, 'created_at' => new DateTime, 'updated_at' => new DateTime],
        );
 
        // Uncomment the below to run the seeder
        DB::table('post_sub_cats')->insert($cats);
		
	}		
			
}
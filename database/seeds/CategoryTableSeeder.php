<?php
 
use Illuminate\Database\Seeder;
 
class CategoryTableSeeder extends Seeder {
 
    public function run()
    {
        // Uncomment the below to wipe the table clean before populating
        DB::table('categories')->delete();
 
        $cats = array(
            ['id' => 1, 'name' => 'Motors', 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => 2, 'name' => 'Auto Accessories', 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => 3, 'name' => 'Auto Spare Parts', 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => 4, 'name' => 'Jobs', 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => 5, 'name' => 'Classifieds', 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => 6, 'name' => 'Property for Sale', 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => 7, 'name' => 'Property for Rent', 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => 8, 'name' => 'Home and Kitchen', 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => 9, 'name' => 'Electronics', 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => 10, 'name' => 'Apartments', 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => 11, 'name' => 'Villas', 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => 12, 'name' => 'All of Globex', 'created_at' => new DateTime, 'updated_at' => new DateTime],
        );
 
        // Uncomment the below to run the seeder
        DB::table('categories')->insert($cats);
    }
 
}
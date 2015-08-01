<?php
 
use Illuminate\Database\Seeder;
 
class CategoryTableSeeder extends Seeder {
 
    public function run()
    {
       // Uncomment the below to wipe the table clean before populating
        DB::table('categories')->delete();

        $cats = array(
            ['name' => 'Motors', 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['name' => 'Auto Accessories', 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['name' => 'Auto Spare Parts', 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['name' => 'Jobs', 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['name' => 'Classifieds', 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['name' => 'Property for Sale', 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['name' => 'Property for Rent', 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['name' => 'Home and Kitchen', 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['name' => 'Electronics', 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['name' => 'Apartments', 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['name' => 'Villas', 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['name' => 'All of Globex', 'created_at' => new DateTime, 'updated_at' => new DateTime]
        );

        DB::table('categories')->insert($cats);
    }
 
}
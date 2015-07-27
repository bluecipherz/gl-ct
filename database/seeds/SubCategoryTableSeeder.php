<?php
 
use Illuminate\Database\Seeder;
 
class SubCategoryTableSeeder extends Seeder {
 
    public function run()
    {
        // Uncomment the below to wipe the table clean before populating
        DB::table('sub_categories')->delete();
 
        $cats = array(
            ['id' => 1, 'name' => 'Used Cars for Sale', 'category_id' => 1, 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => 2, 'name' => 'Boats', 'category_id' => 1, 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => 3, 'name' => 'Heavy Vehicles', 'category_id' => 1, 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => 4, 'name' => 'Motorcycles', 'category_id' => 1, 'created_at' => new DateTime, 'updated_at' => new DateTime],
            
			['id' => 5, 'name' => 'Apparel , Merchandise & Accessories', 'category_id' => 2, 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => 6, 'name' => 'Automotive Tools', 'category_id' => 2, 'created_at' => new DateTime, 'updated_at' => new DateTime],
			
			['id' => 7, 'name' => 'Boat Parts', 'category_id' => 3, 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => 8, 'name' => 'Car Parts', 'category_id' => 3, 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => 9, 'name' => 'Motorcycle Parts', 'category_id' => 3, 'created_at' => new DateTime, 'updated_at' => new DateTime],
            
			['id' => 10, 'name' => 'Cat4-SubCat-1', 'category_id' => 4, 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => 11, 'name' => 'Cat4-SubCat-2', 'category_id' => 4, 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => 12, 'name' => 'Cat4-SubCat-3', 'category_id' => 4, 'created_at' => new DateTime, 'updated_at' => new DateTime],
            
			['id' => 13, 'name' => 'Cat5-SubCat-1', 'category_id' => 5, 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => 14, 'name' => 'Cat5-SubCat-2', 'category_id' => 5, 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => 15, 'name' => 'Cat5-SubCat-3', 'category_id' => 5, 'created_at' => new DateTime, 'updated_at' => new DateTime],
            
			['id' => 17, 'name' => 'Cat6-SubCat-1', 'category_id' => 6, 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => 18, 'name' => 'Cat6-SubCat-2', 'category_id' => 6, 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => 19, 'name' => 'Cat6-SubCat-3', 'category_id' => 6, 'created_at' => new DateTime, 'updated_at' => new DateTime],
            
			['id' => 20, 'name' => 'Cat7-SubCat-1', 'category_id' => 7, 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => 21, 'name' => 'Cat7-SubCat-2', 'category_id' => 7, 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => 22, 'name' => 'Cat7-SubCat-3', 'category_id' => 7, 'created_at' => new DateTime, 'updated_at' => new DateTime],
            
			['id' => 23, 'name' => 'Cat8-SubCat-1', 'category_id' => 8, 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => 24, 'name' => 'Cat8-SubCat-2', 'category_id' => 8, 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => 25, 'name' => 'Cat8-SubCat-3', 'category_id' => 8, 'created_at' => new DateTime, 'updated_at' => new DateTime],
            
			['id' => 26, 'name' => 'Cat9-SubCat-1', 'category_id' => 9, 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => 27, 'name' => 'Cat9-SubCat-2', 'category_id' => 9, 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => 28, 'name' => 'Cat9-SubCat-3', 'category_id' => 9, 'created_at' => new DateTime, 'updated_at' => new DateTime],
            
			['id' => 29, 'name' => 'Cat10-SubCat-1', 'category_id' => 10, 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => 30, 'name' => 'Cat10-SubCat-2', 'category_id' => 10, 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => 31, 'name' => 'Cat10-SubCat-3', 'category_id' => 10, 'created_at' => new DateTime, 'updated_at' => new DateTime],
            
			['id' => 32, 'name' => 'Cat11-SubCat-1', 'category_id' => 11, 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => 33, 'name' => 'Cat11-SubCat-2', 'category_id' => 11, 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => 34, 'name' => 'Cat11-SubCat-3', 'category_id' => 11, 'created_at' => new DateTime, 'updated_at' => new DateTime],
            
			['id' => 35, 'name' => 'Cat12-SubCat-1', 'category_id' => 12, 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => 36, 'name' => 'Cat12-SubCat-2', 'category_id' => 12, 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => 37, 'name' => 'Cat12-SubCat-3', 'category_id' => 12, 'created_at' => new DateTime, 'updated_at' => new DateTime],
        );
 
        // Uncomment the below to run the seeder
        DB::table('sub_categories')->insert($cats);
    }
 
}
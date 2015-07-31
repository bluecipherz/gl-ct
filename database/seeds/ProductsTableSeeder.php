<?php
 
use Illuminate\Database\Seeder;
 
class ProductsTableSeeder extends Seeder {
 
    public function run()
    {
        // Uncomment the below to wipe the table clean before populating
        DB::table('products')->delete();
 
        $products = array(
            ['id' => 1, 'name' => 'Boost', 'brand' => '', 'price' => 250, 'desc' => 'A small description about it that describes almost every aspect of it', 'post_sub_cat_id' => 1, 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => 2, 'name' => 'Horlicks', 'brand' => '', 'price' => 250, 'desc' => 'A small description about it that describes almost every aspect of it', 'post_sub_cat_id' => 1, 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => 3, 'name' => 'Corn Flakes', 'brand' => '', 'price' => 250, 'desc' => 'A small description about it that describes almost every aspect of it', 'post_sub_cat_id' => 1, 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => 4, 'name' => 'Yippee', 'brand' => '', 'price' => 250, 'desc' => 'A small description about it that describes almost every aspect of it', 'post_sub_cat_id' => 1, 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => 5, 'name' => 'Chocos', 'brand' => '', 'price' => 250, 'desc' => 'A small description about it that describes almost every aspect of it', 'post_sub_cat_id' => 1, 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => 6, 'name' => 'Dream', 'brand' => '', 'price' => 250, 'desc' => 'A small description about it that describes almost every aspect of it', 'post_sub_cat_id' => 1, 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => 7, 'name' => 'Head & Shoulders', 'brand' => '', 'price' => 250, 'desc' => 'A small description about it that describes almost every aspect of it', 'post_sub_cat_id' => 1, 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => 8, 'name' => 'Clinic Plus', 'brand' => '', 'price' => 250, 'desc' => 'A small description about it that describes almost every aspect of it', 'post_sub_cat_id' => 1, 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => 9, 'name' => 'Clear', 'brand' => '', 'price' => 250, 'desc' => 'A small description about it that describes almost every aspect of it', 'post_sub_cat_id' => 1, 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => 10, 'name' => 'Milky Mist', 'brand' => '', 'price' => 250, 'desc' => 'A small description about it that describes almost every aspect of it', 'post_sub_cat_id' => 1, 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => 11, 'name' => 'Milma', 'brand' => '', 'price' => 250, 'desc' => 'A small description about it that describes almost every aspect of it', 'post_sub_cat_id' => 1, 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => 12, 'name' => 'Casio', 'brand' => '', 'price' => 250, 'desc' => 'A small description about it that describes almost every aspect of it', 'post_sub_cat_id' => 1, 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => 13, 'name' => 'Casino', 'brand' => '', 'price' => 250, 'desc' => 'A small description about it that describes almost every aspect of it', 'post_sub_cat_id' => 1, 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => 14, 'name' => 'Cartel', 'brand' => '', 'price' => 250, 'desc' => 'A small description about it that describes almost every aspect of it', 'post_sub_cat_id' => 1, 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => 15, 'name' => 'Moods', 'brand' => '', 'price' => 250, 'desc' => 'A small description about it that describes almost every aspect of it', 'post_sub_cat_id' => 1, 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => 16, 'name' => 'Pampers', 'brand' => '', 'price' => 250, 'desc' => 'A small description about it that describes almost every aspect of it', 'post_sub_cat_id' => 1, 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => 17, 'name' => 'Cerelac', 'brand' => '', 'price' => 250, 'desc' => 'A small description about it that describes almost every aspect of it', 'post_sub_cat_id' => 1, 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => 18, 'name' => 'Tiger', 'brand' => '', 'price' => 250, 'desc' => 'A small description about it that describes almost every aspect of it', 'post_sub_cat_id' => 1, 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => 19, 'name' => 'Parle-G', 'brand' => '', 'price' => 250, 'desc' => 'A small description about it that describes almost every aspect of it', 'post_sub_cat_id' => 1, 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => 20, 'name' => 'Arrowroot', 'brand' => '', 'price' => 250, 'desc' => 'A small description about it that describes almost every aspect of it', 'post_sub_cat_id' => 1, 'created_at' => new DateTime, 'updated_at' => new DateTime],
        );
 
        // Uncomment the below to run the seeder
        DB::table('products')->insert($products);
    }
 
}
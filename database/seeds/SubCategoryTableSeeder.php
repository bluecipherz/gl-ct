<?php
 
use Illuminate\Database\Seeder;
 
class SubCategoryTableSeeder extends Seeder {
 
    public function run()
    {
        // Uncomment the below to wipe the table clean before populating
        DB::table('sub_categories')->delete();
 
        $cats = array(

            /* MOTORS */

            ['id' => 1, 'name' => 'Used Cars for Sale', 'category_id' => 1, 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => 2, 'name' => 'Boats', 'category_id' => 1, 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => 3, 'name' => 'Heavy Vehicles', 'category_id' => 1, 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => 4, 'name' => 'Motorcycles', 'category_id' => 1, 'created_at' => new DateTime, 'updated_at' => new DateTime],

            /* AUTO ACCESSORIES */

			['id' => 5, 'name' => 'Apparel , Merchandise & Accessories', 'category_id' => 2, 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => 6, 'name' => 'Automotive Tools', 'category_id' => 2, 'created_at' => new DateTime, 'updated_at' => new DateTime],

            /* AUTO SPARES AND PARTS */

			['id' => 7, 'name' => 'Boat Parts', 'category_id' => 3, 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => 8, 'name' => 'Car Parts', 'category_id' => 3, 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => 9, 'name' => 'Motorcycle Parts', 'category_id' => 3, 'created_at' => new DateTime, 'updated_at' => new DateTime],

            /* JOBS */

			['id' => 10, 'name' => 'Accounting', 'category_id' => 4, 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => 11, 'name' => 'Airlines & Aviation', 'category_id' => 4, 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => 12, 'name' => 'Architecture & Interior Design', 'category_id' => 4, 'created_at' => new DateTime, 'updated_at' => new DateTime],
			['id' => 13, 'name' => 'Art & Entertainment', 'category_id' => 4, 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => 14, 'name' => 'Automotive', 'category_id' => 4, 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => 15, 'name' => 'Banking & Finance', 'category_id' => 4, 'created_at' => new DateTime, 'updated_at' => new DateTime],
			['id' => 17, 'name' => 'Beauty', 'category_id' => 4, 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => 18, 'name' => 'Business Development', 'category_id' => 4, 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => 19, 'name' => 'Business Supplies & Equipment', 'category_id' => 4, 'created_at' => new DateTime, 'updated_at' => new DateTime],
			['id' => 20, 'name' => 'Construction', 'category_id' => 4, 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => 21, 'name' => 'Consulting', 'category_id' => 4, 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => 22, 'name' => 'Customer Service', 'category_id' => 4, 'created_at' => new DateTime, 'updated_at' => new DateTime],
			['id' => 23, 'name' => 'Education', 'category_id' => 4, 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => 24, 'name' => 'Engineering', 'category_id' => 4, 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => 25, 'name' => 'Environmental Services', 'category_id' => 4, 'created_at' => new DateTime, 'updated_at' => new DateTime],
			['id' => 26, 'name' => 'Event Management', 'category_id' => 4, 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => 27, 'name' => 'Executive', 'category_id' => 4, 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => 28, 'name' => 'Fashion', 'category_id' => 4, 'created_at' => new DateTime, 'updated_at' => new DateTime],
			['id' => 29, 'name' => 'Food & Beverages', 'category_id' => 4, 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => 30, 'name' => 'Government / Administration', 'category_id' => 4, 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => 31, 'name' => 'Graphic Design', 'category_id' => 4, 'created_at' => new DateTime, 'updated_at' => new DateTime],
			['id' => 32, 'name' => 'Hospitality', 'category_id' => 4, 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => 33, 'name' => 'HR & Recruitment', 'category_id' => 4, 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => 34, 'name' => 'Import & Export', 'category_id' => 4, 'created_at' => new DateTime, 'updated_at' => new DateTime],
			['id' => 35, 'name' => 'Industrial & Manufacturing', 'category_id' => 4, 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => 36, 'name' => 'Information Technology', 'category_id' => 4, 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => 37, 'name' => 'Insurance', 'category_id' => 4, 'created_at' => new DateTime, 'updated_at' => new DateTime],
			['id' => 38, 'name' => 'Internet', 'category_id' => 4, 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => 39, 'name' => 'Legal Services', 'category_id' => 4, 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => 40, 'name' => 'Logistics & Distribution', 'category_id' => 4, 'created_at' => new DateTime, 'updated_at' => new DateTime],
			['id' => 41, 'name' => 'Marketing & Advertising', 'category_id' => 4, 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => 42, 'name' => 'Media', 'category_id' => 4, 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => 43, 'name' => 'Medical & Healthcare', 'category_id' => 4, 'created_at' => new DateTime, 'updated_at' => new DateTime],
			['id' => 44, 'name' => 'Oil, Gas & Energy', 'category_id' => 4, 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => 45, 'name' => 'Online Media', 'category_id' => 4, 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => 46, 'name' => 'Pharmaceuticals', 'category_id' => 4, 'created_at' => new DateTime, 'updated_at' => new DateTime],
			['id' => 47, 'name' => 'Public Relations', 'category_id' => 4, 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => 48, 'name' => 'Real Estate', 'category_id' => 4, 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => 49, 'name' => 'Research & Development', 'category_id' => 4, 'created_at' => new DateTime, 'updated_at' => new DateTime],
			['id' => 50, 'name' => 'Retail & Consumer Goods', 'category_id' => 4, 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => 51, 'name' => 'Safety & Security', 'category_id' => 4, 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => 52, 'name' => 'Sales', 'category_id' => 4, 'created_at' => new DateTime, 'updated_at' => new DateTime],
			['id' => 53, 'name' => 'Secretarial', 'category_id' => 4, 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => 54, 'name' => 'Sports & Fitness', 'category_id' => 4, 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => 55, 'name' => 'Telecommunications', 'category_id' => 4, 'created_at' => new DateTime, 'updated_at' => new DateTime],
			['id' => 56, 'name' => 'Transportation', 'category_id' => 4, 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => 57, 'name' => 'Travel & Tourism', 'category_id' => 4, 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => 58, 'name' => 'Veterinary & Animals', 'category_id' => 4, 'created_at' => new DateTime, 'updated_at' => new DateTime],
			['id' => 59, 'name' => 'Warehousing', 'category_id' => 4, 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => 60, 'name' => 'WholeSale', 'category_id' => 4, 'created_at' => new DateTime, 'updated_at' => new DateTime],

            /* CLASSIFIED */

			['id' => 61, 'name' => 'Baby Items', 'category_id' => 5, 'created_at' => new DateTime, 'updated_at' => new DateTime],
			['id' => 62, 'name' => 'Books', 'category_id' => 5, 'created_at' => new DateTime, 'updated_at' => new DateTime],
			['id' => 63, 'name' => 'Camera', 'category_id' => 5, 'created_at' => new DateTime, 'updated_at' => new DateTime],
			['id' => 64, 'name' => 'Clothing & Accessories', 'category_id' => 5, 'created_at' => new DateTime, 'updated_at' => new DateTime],
			['id' => 65, 'name' => 'Collectibles', 'category_id' => 5, 'created_at' => new DateTime, 'updated_at' => new DateTime],
			['id' => 66, 'name' => 'DVDs & Movies', 'category_id' => 5, 'created_at' => new DateTime, 'updated_at' => new DateTime],
			['id' => 67, 'name' => 'Electronics', 'category_id' => 5, 'created_at' => new DateTime, 'updated_at' => new DateTime],
			['id' => 68, 'name' => 'Free Stuff', 'category_id' => 5, 'created_at' => new DateTime, 'updated_at' => new DateTime],
			['id' => 69, 'name' => 'Furniture & Home Garden', 'category_id' => 5, 'created_at' => new DateTime, 'updated_at' => new DateTime],
			['id' => 70, 'name' => 'Gaming', 'category_id' => 5, 'created_at' => new DateTime, 'updated_at' => new DateTime],
			['id' => 71, 'name' => 'Home Appliances', 'category_id' => 5, 'created_at' => new DateTime, 'updated_at' => new DateTime],
			['id' => 72, 'name' => 'Jewellery & Watches', 'category_id' => 5, 'created_at' => new DateTime, 'updated_at' => new DateTime],
			['id' => 73, 'name' => 'Lost / Found', 'category_id' => 5, 'created_at' => new DateTime, 'updated_at' => new DateTime],
			['id' => 74, 'name' => 'Misc', 'category_id' => 5, 'created_at' => new DateTime, 'updated_at' => new DateTime],
			['id' => 75, 'name' => 'Mobile Phones & PDAs', 'category_id' => 5, 'created_at' => new DateTime, 'updated_at' => new DateTime],
			['id' => 76, 'name' => 'Musical Instruments', 'category_id' => 5, 'created_at' => new DateTime, 'updated_at' => new DateTime],
			['id' => 77, 'name' => 'Pets', 'category_id' => 5, 'created_at' => new DateTime, 'updated_at' => new DateTime],
			['id' => 78, 'name' => 'Sport Equipments', 'category_id' => 5, 'created_at' => new DateTime, 'updated_at' => new DateTime],
			['id' => 79, 'name' => 'Stuff Wanted', 'category_id' => 5, 'created_at' => new DateTime, 'updated_at' => new DateTime],
			['id' => 80, 'name' => 'Ticket & Voucher', 'category_id' => 5, 'created_at' => new DateTime, 'updated_at' => new DateTime],
			['id' => 81, 'name' => 'Toys', 'category_id' => 5, 'created_at' => new DateTime, 'updated_at' => new DateTime],

            /* PROPERTY FOR SALE */

			['id' => 82, 'name' => 'IndustrialManufacturing', 'category_id' => 6, 'created_at' => new DateTime, 'updated_at' => new DateTime],

        );
 
        // Uncomment the below to run the seeder
        DB::table('sub_categories')->insert($cats);
    }
 
}
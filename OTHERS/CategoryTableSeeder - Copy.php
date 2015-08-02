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
            ['name' => 'All of Globex', 'created_at' => new DateTime, 'updated_at' => new DateTime],

            ['name' => 'Used Cars for Sale', 'parent' => 1, 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['name' => 'Boats', 'parent' => 1, 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['name' => 'Heavy Vehicles', 'parent' => 1, 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['name' => 'Motorcycles', 'parent' => 1, 'created_at' => new DateTime, 'updated_at' => new DateTime],

            /* AUTO ACCESSORIES */

            ['name' => 'Apparel , Merchandise & Accessories', 'parent' => 2, 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['name' => 'Automotive Tools', 'parent' => 2, 'created_at' => new DateTime, 'updated_at' => new DateTime],

            /* AUTO SPARES AND PARTS */

            ['name' => 'Boat Parts', 'parent' => 3, 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['name' => 'Car Parts', 'parent' => 3, 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['name' => 'Motorcycle Parts', 'parent' => 3, 'created_at' => new DateTime, 'updated_at' => new DateTime],

            /* JOBS */

            ['name' => 'Accounting', 'parent' => 4, 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['name' => 'Airlines & Aviation', 'parent' => 4, 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['name' => 'Architecture & Interior Design', 'parent' => 4, 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['name' => 'Art & Entertainment', 'parent' => 4, 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['name' => 'Automotive', 'parent' => 4, 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['name' => 'Banking & Finance', 'parent' => 4, 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['name' => 'Beauty', 'parent' => 4, 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['name' => 'Business Development', 'parent' => 4, 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['name' => 'Business Supplies & Equipment', 'parent' => 4, 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['name' => 'Construction', 'parent' => 4, 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['name' => 'Consulting', 'parent' => 4, 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['name' => 'Customer Service', 'parent' => 4, 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['name' => 'Education', 'parent' => 4, 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['name' => 'Engineering', 'parent' => 4, 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['name' => 'Environmental Services', 'parent' => 4, 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['name' => 'Event Management', 'parent' => 4, 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['name' => 'Executive', 'parent' => 4, 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['name' => 'Fashion', 'parent' => 4, 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['name' => 'Food & Beverages', 'parent' => 4, 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['name' => 'Government / Administration', 'parent' => 4, 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['name' => 'Graphic Design', 'parent' => 4, 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['name' => 'Hospitality', 'parent' => 4, 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['name' => 'HR & Recruitment', 'parent' => 4, 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['name' => 'Import & Export', 'parent' => 4, 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['name' => 'Industrial & Manufacturing', 'parent' => 4, 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['name' => 'Information Technology', 'parent' => 4, 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['name' => 'Insurance', 'parent' => 4, 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['name' => 'Internet', 'parent' => 4, 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['name' => 'Legal Services', 'parent' => 4, 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['name' => 'Logistics & Distribution', 'parent' => 4, 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['name' => 'Marketing & Advertising', 'parent' => 4, 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['name' => 'Media', 'parent' => 4, 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['name' => 'Medical & Healthcare', 'parent' => 4, 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['name' => 'Oil, Gas & Energy', 'parent' => 4, 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['name' => 'Online Media', 'parent' => 4, 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['name' => 'Pharmaceuticals', 'parent' => 4, 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['name' => 'Public Relations', 'parent' => 4, 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['name' => 'Real Estate', 'parent' => 4, 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['name' => 'Research & Development', 'parent' => 4, 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['name' => 'Retail & Consumer Goods', 'parent' => 4, 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['name' => 'Safety & Security', 'parent' => 4, 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['name' => 'Sales', 'parent' => 4, 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['name' => 'Secretarial', 'parent' => 4, 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['name' => 'Sports & Fitness', 'parent' => 4, 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['name' => 'Telecommunications', 'parent' => 4, 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['name' => 'Transportation', 'parent' => 4, 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['name' => 'Travel & Tourism', 'parent' => 4, 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['name' => 'Veterinary & Animals', 'parent' => 4, 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['name' => 'Warehousing', 'parent' => 4, 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['name' => 'WholeSale', 'parent' => 4, 'created_at' => new DateTime, 'updated_at' => new DateTime],

            /* CLASSIFIED */

            ['name' => 'Baby Items', 'parent' => 5, 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['name' => 'Books', 'parent' => 5, 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['name' => 'Camera', 'parent' => 5, 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['name' => 'Clothing & Accessories', 'parent' => 5, 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['name' => 'Collectibles', 'parent' => 5, 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['name' => 'DVDs & Movies', 'parent' => 5, 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['name' => 'Electronics', 'parent' => 5, 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['name' => 'Free Stuff', 'parent' => 5, 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['name' => 'Furniture & Home Garden', 'parent' => 5, 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['name' => 'Gaming', 'parent' => 5, 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['name' => 'Home Appliances', 'parent' => 5, 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['name' => 'Jewellery & Watches', 'parent' => 5, 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['name' => 'Lost / Found', 'parent' => 5, 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['name' => 'Misc', 'parent' => 5, 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['name' => 'Mobile Phones & PDAs', 'parent' => 5, 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['name' => 'Musical Instruments', 'parent' => 5, 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['name' => 'Pets', 'parent' => 5, 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['name' => 'Sport Equipments', 'parent' => 5, 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['name' => 'Stuff Wanted', 'parent' => 5, 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['name' => 'Ticket & Voucher', 'parent' => 5, 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['name' => 'Toys', 'parent' => 5, 'created_at' => new DateTime, 'updated_at' => new DateTime],

            /* PROPERTY FOR SALE */

            ['name' => 'IndustrialManufacturing', 'parent' => 6, 'created_at' => new DateTime, 'updated_at' => new DateTime],

            ['name' => 'AUDI', 'parent' => 1, 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['name' => 'BMW', 'parent' => 1, 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['name' => 'Ford', 'parent' => 1, 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['name' => 'Land Rover', 'parent' => 1, 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['name' => 'Mercedese-benz ', 'parent' => 1, 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['name' => 'Ferrari', 'parent' => 1, 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['name' => 'bentley', 'parent' => 1, 'created_at' => new DateTime, 'updated_at' => new DateTime],

            ['name' => 'MotorBoats', 'parent' => 2, 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['name' => 'Row/Paddle Boats', 'parent' => 2, 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['name' => 'Sail Boats', 'parent' => 2, 'created_at' => new DateTime, 'updated_at' => new DateTime],

            ['name' => 'MotorBoats', 'parent' => 3, 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['name' => 'MotorBoats', 'parent' => 3, 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['name' => 'MotorBoats', 'parent' => 3, 'created_at' => new DateTime, 'updated_at' => new DateTime],

            ['name' => 'MotorBoats', 'parent' => 4, 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['name' => 'MotorBoats', 'parent' => 4, 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['name' => 'MotorBoats', 'parent' => 4, 'created_at' => new DateTime, 'updated_at' => new DateTime],

            ['name' => 'MotorBoats', 'parent' => 5, 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['name' => 'MotorBoats', 'parent' => 5, 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['name' => 'MotorBoats', 'parent' => 5, 'created_at' => new DateTime, 'updated_at' => new DateTime],

            ['name' => 'MotorBoats', 'parent' => 5, 'created_at' => new DateTime, 'updated_at' => new DateTime],

            ['name' => 'MotorBoats', 'parent' => 6, 'created_at' => new DateTime, 'updated_at' => new DateTime],

            ['name' => 'MotorBoats', 'parent' => 6, 'created_at' => new DateTime, 'updated_at' => new DateTime],

            ['name' => 'MotorBoats', 'parent' => 6, 'created_at' => new DateTime, 'updated_at' => new DateTime],

            ['name' => 'MotorBoats', 'parent' => 6, 'created_at' => new DateTime, 'updated_at' => new DateTime],

            ['name' => 'MotorBoats', 'parent' => 6, 'created_at' => new DateTime, 'updated_at' => new DateTime],

            ['name' => 'MotorBoats', 'parent' => 7, 'created_at' => new DateTime, 'updated_at' => new DateTime],

            ['name' => 'MotorBoats', 'parent' => 7, 'created_at' => new DateTime, 'updated_at' => new DateTime],

            ['name' => 'MotorBoats', 'parent' => 7, 'created_at' => new DateTime, 'updated_at' => new DateTime],

            ['name' => 'MotorBoats', 'parent' => 7, 'created_at' => new DateTime, 'updated_at' => new DateTime],

            ['name' => 'MotorBoats', 'parent' => 8, 'created_at' => new DateTime, 'updated_at' => new DateTime],

            ['name' => 'MotorBoats', 'parent' => 8, 'created_at' => new DateTime, 'updated_at' => new DateTime],

            ['name' => 'MotorBoats', 'parent' => 8, 'created_at' => new DateTime, 'updated_at' => new DateTime],

            ['name' => 'MotorBoats', 'parent' => 9, 'created_at' => new DateTime, 'updated_at' => new DateTime],

            ['name' => 'MotorBoats', 'parent' => 9, 'created_at' => new DateTime, 'updated_at' => new DateTime],

            ['name' => 'MotorBoats', 'parent' => 9, 'created_at' => new DateTime, 'updated_at' => new DateTime],

            ['name' => 'MotorBoats', 'parent' => 9, 'created_at' => new DateTime, 'updated_at' => new DateTime],

            ['name' => 'MotorBoats', 'parent' => 10, 'created_at' => new DateTime, 'updated_at' => new DateTime],

            ['name' => 'MotorBoats', 'parent' => 10, 'created_at' => new DateTime, 'updated_at' => new DateTime],

            ['name' => 'MotorBoats', 'parent' => 11, 'created_at' => new DateTime, 'updated_at' => new DateTime],

            ['name' => 'MotorBoats', 'parent' => 11, 'created_at' => new DateTime, 'updated_at' => new DateTime],

            ['name' => 'MotorBoats', 'parent' => 11, 'created_at' => new DateTime, 'updated_at' => new DateTime],

            ['name' => 'MotorBoats', 'parent' => 12, 'created_at' => new DateTime, 'updated_at' => new DateTime],

            ['name' => 'MotorBoats', 'parent' => 12, 'created_at' => new DateTime, 'updated_at' => new DateTime],

            ['name' => 'MotorBoats', 'parent' => 12, 'created_at' => new DateTime, 'updated_at' => new DateTime],

            ['name' => 'MotorBoats', 'parent' => 12, 'created_at' => new DateTime, 'updated_at' => new DateTime],

            ['name' => 'MotorBoats', 'parent' => 12, 'created_at' => new DateTime, 'updated_at' => new DateTime],

            ['name' => 'MotorBoats', 'parent' => 12, 'created_at' => new DateTime, 'updated_at' => new DateTime],

            ['name' => 'MotorBoats', 'parent' => 12, 'created_at' => new DateTime, 'updated_at' => new DateTime],

            ['name' => 'MotorBoats', 'parent' => 12, 'created_at' => new DateTime, 'updated_at' => new DateTime],

            ['name' => 'MotorBoats', 'parent' => 12, 'created_at' => new DateTime, 'updated_at' => new DateTime],

            ['name' => 'MotorBoats', 'parent' => 12, 'created_at' => new DateTime, 'updated_at' => new DateTime],

            ['name' => 'MotorBoats', 'parent' => 12, 'created_at' => new DateTime, 'updated_at' => new DateTime],
        );
 
        // Uncomment the below to run the seeder
        DB::table('categories')->insert($cats);
    }
 
}
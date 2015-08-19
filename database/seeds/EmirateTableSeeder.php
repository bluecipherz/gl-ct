<?php
use Illuminate\Database\Seeder;

/**
 * Created by PhpStorm.
 * User: BCz Workstation #01
 * Date: 8/19/2015
 * Time: 5:18 AM
 */

class EmirateTableSeeder extends Seeder {

    public function run()
    {
        DB::table('emirates')->delete();

        $emirates = [
            ['id' => 1, 'name' => 'Abu Dhabi', 'slug' => 'abu-dhabi'],
            ['id' => 2, 'name' => 'Ajman', 'slug' => 'ajman'],
            ['id' => 3, 'name' => 'Dubai', 'slug' => 'dubai'],
            ['id' => 4, 'name' => 'Fujairah', 'slug' => 'fujairah'],
            ['id' => 5, 'name' => 'Ras al Khaimah', 'slug' => 'ras-al-khaimah'],
            ['id' => 6, 'name' => 'Sharjah', 'slug' => 'sharjah'],
            ['id' => 7, 'name' => 'Umm al Quwain', 'slug' =>  'umm-al-quwain']
        ];

        DB::table('emirates')->insert($emirates);
    }

}
<?php
/**
 * Created by PhpStorm.
 * User: bazi
 * Date: 04-Aug-15
 * Time: 9:55 AM
 */

namespace App\Repositories;

use App\Category;

class HomeRepository {

    public function getCatSet() {
        $root = Category::whereIsRoot()->first();

        $catset = []; // complete category set, ready to display

        $counter = 0;
        foreach ($root->children->all() as $cat) {
            if($counter > 11) break;
            $catset[$cat->name]['title'] = $cat->name;
//            echo '<br>' . $cat->name . '<br>';
            $subcats = $cat->children->all();
            $subcatcounter = 0;
            $subcatcount = count($subcats);
            for ($col = 0; $col < 3; $col++) {
                if($subcatcounter == $subcatcount) break;
//                echo 'col ' . $col . '<br>';
                $rowcounter = 0;
                $fillmore = true;
                $postcatcounter = 0;
                $postcats = [];
                $postcatcount = 0;
                $fillhead = true;
                $colarray = [];
                while($fillmore) {
//                    echo 'filling row ' . $rowcounter;
                    if($fillhead) {
//                        echo ' subcat ' . $subcats[$subcatcounter]->name . '<br>';
                        $colarray[$rowcounter]['title'] = $subcats[$subcatcounter]->name;
                        $colarray[$rowcounter]['type'] = 'subcat';
                        $postcats = $subcats[$subcatcounter]->children->all();
                        $postcatcount = count($postcats) - 1;
                        if($postcatcount == -1) {
                            $fillmore = false;
                        }
                        $subcatcounter++;
                        $fillhead = false;
                    } else {
//                        echo ' postcat ' . $postcats[$postcatcounter]->name . '<br>';
                        $colarray[$rowcounter]['title'] = $postcats[$postcatcounter]->name;
                        $colarray[$rowcounter]['type'] = 'postcat';
                        $postcatcounter++;
                        if($postcatcounter > $postcatcount) {
                            $postcatcounter = 0;
                            break;
                        }
                    }
                    $rowcounter++;
                    if($rowcounter > 11) $fillmore = false;
                }
                $catset[$cat->name]['children'][$col] = $colarray;
            }
            $counter++;
        }
        return $catset;
    }

}
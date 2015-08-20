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
        $roots = Category::roots()->get();

        $catset = []; // complete category set, ready to display

        $counter = 0;
        foreach ($roots as $cat) {
            if($counter > 11) break;
            $catset[$cat->name]['title'] = $cat->name;
            $catset[$cat->name]['id'] = $cat->id;
//            $catset[$cat->name]['type'] = 'cat'; // not the solution
//            echo '<br>' . $cat->name . '<br>';
            $subcats = $cat->children()->get();
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
                        $colarray[$rowcounter]['type'] = "subcat";
                        $colarray[$rowcounter]['id'] = $subcats[$subcatcounter]->id;
                        $postcats = $subcats[$subcatcounter]->children()->get();
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
                        $colarray[$rowcounter]['id'] = $postcats[$postcatcounter]->id;
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

    public function getSubCatSet()
    {
        $catarray = [];
        $cats = Category::whereDepth(1)->get();
        $counter = 0;
        for ($col = 0; $col < 3; $col++) {
            $fillmore = true;
            $row = 0;
            $colarray = [];
            while ($fillmore) {
                if(isset($cats[$counter])) {
                    $colarray[$row] = ['id' => $cats[$counter]->id, 'name' => $cats[$counter]->name];
                } else break;
                $row++;$counter++;
                if($row > 11) $fillmore = false;
            }
            $catarray[$col] = $colarray;
        }
        return $catarray;
    }

}
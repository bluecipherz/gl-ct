<?php
/**
 * Created by PhpStorm.
 * User: bazi
 * Date: 31-Jul-15
 * Time: 9:22 AM
 */

namespace App\Repositories;


use App\Category;
use App\Repositories\Eloquent\Repository;

class CategoryRepository extends Repository {

    /**
     * Specify model class
     * @return mixed
     */
    public function model()
    {
        return 'App\Category';
    }

    public function getTree()
    {
        $cattree = [];

        $cats = Category::roots()->get();
        foreach ($cats as $key => $cat) {
            $subcatarray = [];
            foreach ($cat->children->all() as $subcat) {
                $postcatarray = [];
                foreach ($subcat->children->all() as $postcat) {
                    $postcatarray[strtolower($postcat->name)] = $postcat->name;
                }
                $subcatarray[$subcat->name] = $postcatarray;
            }
            $cattree[$cat->name] = $subcatarray;
        }
        return $cattree;
    }

    public function getCats()
    {
        return Category::roots()->get();
    }

    public function recursive()
    {
        $cats = Category::roots()->get();

        $supercatset = [];
        foreach($cats as $cat) {
            $catset = [];
            echo $cat->name . '<br>';
            foreach($cat->children()->get() as $sub) {
                $subcatset = [];
                echo '&nbsp;&nbsp;&nbsp;&nbsp;' . $sub->name . '<br>';
                foreach($sub->children()->get() as $post) {
                    echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;' . $post->name . '<br>';
                    $subcatset[strtolower($post->name)]['title'] = $post->name;
                }
                $catset[strtolower($sub->name)]['title'] = $sub->name;
                $catset[strtolower($sub->name)]['children'] = $subcatset;
            }
            $supercatset[strtolower($cat->name)]['title'] = $cat->name;
            $supercatset[strtolower($cat->name)]['children'] = $catset;
        }
        return $supercatset;
    }

}
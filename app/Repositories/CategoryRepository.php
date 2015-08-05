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

        $root = Category::whereIsRoot()->first();
        foreach ($root->children->all() as $key => $cat) {
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

}
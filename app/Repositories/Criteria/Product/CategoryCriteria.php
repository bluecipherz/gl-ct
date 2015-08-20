<?php
/**
 * Created by PhpStorm.
 * User: bazi
 * Date: 20-Aug-15
 * Time: 1:08 AM
 */

namespace App\Repositories\Criteria\Product;


use App\Category;
use App\Repositories\Contracts\RepositoryInterface as Repository;
use App\Repositories\Criteria\Criteria;

class CategoryCriteria extends Criteria {

    protected $category_list;

    public function __construct($category_list)
    {
        $this->category_list = $category_list;
    }

    /**
     * @param $model
     * @param Repository $repository
     * @return mixed
     */
    public function apply($model, Repository $repository)
    {
        foreach ($this->category_list as $id) {
            $product_list = Category::find($id)->childProducts();
            $model->whereIn('id', $product_list);
        }
        return $model;
    }
}
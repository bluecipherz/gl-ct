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
use Illuminate\Database\Eloquent\Builder;

class CategoryCriteria extends Criteria {

    protected $cat_list;

    public function __construct($cat_list)
    {
        $this->cat_list = $cat_list;
    }

    /**
     * @param $model
     * @param Repository $repository
     * @return mixed
     */
    public function apply($model, Repository $repository)
    {
        $product_list = [];
        foreach ($this->cat_list as $cat) {
            $product_list = array_merge($product_list, Category::find($cat)->childProducts());
        }
        return $model->whereIn('id', $product_list);
    }
}
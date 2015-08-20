<?php
/**
 * Created by PhpStorm.
 * User: bazi
 * Date: 20-Aug-15
 * Time: 1:08 AM
 */

namespace App\Repositories\Criteria\Product;


use App\Repositories\Contracts\RepositoryInterface as Repository;
use App\Repositories\Criteria\Criteria;

class PriceAboveCriteria extends Criteria {

    protected $price;

    public function __construct($price)
    {
        $this->price = $price;
    }

    /**
     * @param $model
     * @param Repository $repository
     * @return mixed
     */
    public function apply($model, Repository $repository)
    {
        return $model->where('price', '>', $this->price);
    }
}
<?php
/**
 * Created by PhpStorm.
 * User: bazi
 * Date: 20-Aug-15
 * Time: 1:07 AM
 */

namespace App\Repositories\Criteria\Product;


use App\Repositories\Contracts\RepositoryInterface as Repository;
use App\Repositories\Criteria\Criteria;

class SearchQueryCriteria extends Criteria {

    protected $query;

    public function __construct($query)
    {
        $this->query = $query;
    }

    /**
     * @param $model
     * @param Repository $repository
     * @return mixed
     */
    public function apply($model, Repository $repository)
    {
        $searchTerms = explode(' ', $this->query);
        foreach ($searchTerms as $term) {
            $model->where('title', 'LIKE', '%' . $term . '%');
        }
        return $model;
    }
}
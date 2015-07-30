<?php namespace App\Repositories\Criteria;
/**
 * Created by PhpStorm.
 * User: bazi
 * Date: 30-Jul-15
 * Time: 9:53 AM
 */
use App\Repositories\Contracts\RepositoryInterface as Repository;

/**
 * Class Criteria
 * @package App\Repositories\Criteria
 */
abstract class Criteria {

    /**
     * @param $model
     * @param Repository $repository
     * @return mixed
     */
    public abstract function apply($model, Repository $repository);

}
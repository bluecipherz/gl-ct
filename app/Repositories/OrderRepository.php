<?php namespace App\Repositories;
/**
 * Created by PhpStorm.
 * User: bazi
 * Date: 30-Jul-15
 * Time: 9:38 AM
 */

use App\Repositories\Eloquent\Repository;

/**
 * Class OrderRepository
 * @package App\Repositories
 */
class OrderRepository extends Repository {

    /**
     * Specify model class
     * @return mixed
     */
    public function model()
    {
        return 'App\Order';
    }

}
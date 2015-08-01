<?php
/**
 * Created by PhpStorm.
 * User: bazi
 * Date: 31-Jul-15
 * Time: 9:21 AM
 */

namespace App\Repositories;


use App\Repositories\Eloquent\Repository;

class ProductRepository extends Repository {

    /**
     * Specify model class
     * @return mixed
     */
    public function model()
    {
        return 'App\Product';
    }
}
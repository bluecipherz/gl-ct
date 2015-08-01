<?php
/**
 * Created by PhpStorm.
 * User: bazi
 * Date: 31-Jul-15
 * Time: 9:23 AM
 */

namespace App\Repositories;


use App\Repositories\Eloquent\Repository;

class ShipperRepository extends Repository {

    /**
     * Specify model class
     * @return mixed
     */
    public function model()
    {
        return 'App\Shipper';
    }
}
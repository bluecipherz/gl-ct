<?php
/**
 * Created by PhpStorm.
 * User: bazi
 * Date: 31-Jul-15
 * Time: 9:22 AM
 */

namespace App\Repositories;


use App\Repositories\Eloquent\Repository;

class AdvertisementRepository extends Repository {

    /**
     * Specify model class
     * @return mixed
     */
    public function model()
    {
        return 'App\Advertisement';
    }

}
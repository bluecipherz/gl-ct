<?php namespace App\Repositories;
/**
 * Created by PhpStorm.
 * User: bazi
 * Date: 30-Jul-15
 * Time: 6:06 PM
 */

use App\Repositories\Eloquent\Repository;

class AdminRepository extends Repository {

    /**
     * @return string
     */
    public function model()
    {
        return 'App\Admin';
    }

}
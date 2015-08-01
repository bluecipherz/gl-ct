<?php
/**
 * Created by PhpStorm.
 * User: bazi
 * Date: 31-Jul-15
 * Time: 9:20 AM
 */

namespace app\Repositories;


use App\Repositories\Eloquent\Repository;

class TransactionRepository extends Repository {

    /**
     * Specify model class
     * @return mixed
     */
    public function model()
    {
        return 'App\Transaction';
    }
}
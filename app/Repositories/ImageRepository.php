<?php
/**
 * Created by PhpStorm.
 * User: bazi
 * Date: 05-Aug-15
 * Time: 1:43 PM
 */

namespace App\Repositories;

use App\Repositories\Eloquent\Repository;

class ImageRepository extends Repository{

    /**
     * Specify model class
     * @return mixed
     */
    public function model()
    {
        return 'App\Image';
    }

    public function processUpload($input)
    {

    }
}
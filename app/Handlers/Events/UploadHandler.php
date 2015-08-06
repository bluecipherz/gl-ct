<?php
/**
 * Created by PhpStorm.
 * User: bazi
 * Date: 05-Aug-15
 * Time: 1:56 PM
 */

namespace App\Handlers\Events;

use Illuminate\Support\Facades\Input;
use App\Events\Upload;

class UploadHandler {

    public function handle(Upload $event)
    {
        Input::file('image')
            ->move(
                public_path(). '/assets/' .$event->imageRepository->model() .'/' . $event->imageRepository->makeModel()->id, $event->imageRepository->makeModel()->name
            );
    }

}
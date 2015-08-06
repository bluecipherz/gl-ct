<?php namespace App\Exceptions;

use RuntimeException;
use Symfony\Component\HttpFoundation\Response;
/**
 * Created by PhpStorm.
 * User: RAMU
 * Date: 29-07-2015
 * Time: 14:31
 */

class LoginException extends RuntimeException {

    protected $response;

    public function __construct(Response $response)
    {
        $this->response = $response;
    }

    public function getResponse() {
        return $this->response;
    }
}
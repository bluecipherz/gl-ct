<?php namespace App\Exceptions;

use RuntimeException;
use Illuminate\Http\Response;
/**
 * Created by PhpStorm.
 * User: RAMU
 * Date: 29-07-2015
 * Time: 14:31
 */

class LoginException extends RuntimeException {

    protected $request;

    public function __construct($request)
    {
        $this->request = $request;
    }

    public function getResponse() {
//        if ($this->request->ajax()) {
            return response('Login Incorrect', 422);
//        } else {
//            return 'Login Incorrect';
//        }
    }
}
<?php namespace App\Http\Controllers;

use App\Exceptions\LoginException;
use Illuminate\Foundation\Bus\DispatchesCommands;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Symfony\Component\HttpFoundation\JsonResponse;

abstract class Controller extends BaseController {

	use DispatchesCommands, ValidatesRequests;

    /**
     * @param Request $request
     */
    public function throwLoginException(Request $request)
    {
        if ($request->ajax()) {
            $response = new JsonResponse('Login incorrect', 422);
        } else {
            $response = redirect()->back()->withErrors(['Login incorrect']);
        }
        throw new LoginException($response);
    }

}

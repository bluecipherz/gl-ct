<?php namespace App\Http\Middleware;

use Closure;
use Auth;
use App\Admin;

class AdminMiddleware {

	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next)
	{
		if(Auth::user()) {
            $user = Auth::user();
            if($user instanceof Admin) {
                return $next($request);
            }
        }
        abort(404);
	}

}

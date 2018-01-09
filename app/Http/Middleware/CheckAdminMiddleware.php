<?php namespace App\Http\Middleware;

use Closure;

class CheckAdminMiddleware {

	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next)
	{
		session_start();
        if (!isset($_SESSION['currentUser'])) {
        	return redirect()->route('getUserLogin');
        }
        return $next($request);
	}

}

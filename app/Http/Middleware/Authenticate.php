<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Closure;

class Authenticate extends Middleware
{
	/**
	 * Get the path the user should be redirected to when they are not authenticated.
	 *
	 * @param \Illuminate\Http\Request $request
	 * @return string|null
	 */
	protected function redirectTo($request)
	{
		if (!$request->expectsJson()) {
			return route('login');
		}
	}

	public function handle($request, Closure $next)
	{
		if (!cas()->isAuthenticated()) {
			if ($request->ajax()) {
				return response('Unauthorized.', 401);
			}
			cas()->authenticate();
		}

		// TODO: Make sure this user is in the database and that they have the appropriate roles
		session()->put('cas_user', cas()->user());

		return $next($request);
	}

	public function logout()
	{
		cas()->logout();
	}
}

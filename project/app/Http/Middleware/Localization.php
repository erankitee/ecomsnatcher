<?php

namespace App\Http\Middleware;

use Closure;

class Localization
{
	/**
	 * Handle an incoming request
	 * 
	 * @param \Illuminate\Http\Request $request
	 * @param \Closure $next
	 * @return mixed
	 */
	
	public function handle($request, Closure $next)
	{
		# Set locale language to Session variable
		if (\Session::has('locale')) {
			\App::setLocale(\Session::get('locale'));
		}

		# return to request
		return $next($request);
	}
}
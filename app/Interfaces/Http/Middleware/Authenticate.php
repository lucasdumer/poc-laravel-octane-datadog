<?php

namespace App\Interfaces\Http\Middleware;

use App\Application\Service\AuthenticationService;
use Closure;
use Exception;

class Authenticate
{
	public function __construct(
		private AuthenticationService $authenticationService
	) {}

	public function handle($request, Closure $next)
	{
		if (empty($request->header('Authorization'))) {
			throw new Exception("Authorization token does not exist.", 401);
		}
		if (!$this->authenticationService->authenticate($request->header('Authorization'))) {
			throw new Exception("Invalid authorization token.", 401);
		}
		return $next($request);
	}
}

<?php

namespace Ekram\LicenseGuard\Middleware;

use Closure;
use Ekram\LicenseGuard\License;

class LicenseMiddleware
{
    public function handle($request, \Closure $next)
    {
        if (!License::check()) {
            abort(403, 'Invalid license.');
        }

        return $next($request);
    }
}

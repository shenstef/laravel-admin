<?php

namespace Encore\Admin\Middleware;

use Illuminate\Http\Request;

class Session
{
    public function handle(Request $request, \Closure $next)
    {
        $path = '/'.trim(config(request_path() .'.route.prefix'), '/');

        config(['session.path' => $path]);

        if ($domain = config(request_path() .'.route.domain')) {
            config(['session.domain' => $domain]);
        }

        return $next($request);
    }
}

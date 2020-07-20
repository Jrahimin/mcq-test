<?php

namespace App\Http\Middleware;

use App\Enums\UserTypes;
use Closure;

class BlockUserFromAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(auth()->user()->type == UserTypes::USER)
            abort(404);

        return $next($request);
    }
}

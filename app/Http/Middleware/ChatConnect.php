<?php

namespace GitScrum\Http\Middleware;

use Auth;
use Closure;

class ChatConnect
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
        dd($request);
        if (!(Auth::user()->slack))
        {
            return redirect()->route('product_backlogs.index');
        }

        return $next($request);
    }
}

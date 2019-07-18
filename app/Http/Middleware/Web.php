<?php

namespace App\Http\Middleware;

use App\Models\Category;
use Closure;

class Web
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        view()->share('categoryList', Category::orderby('id', 'desc')->get());
        return $next($request);
    }
}

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
        $arr = explode('/', trim($request->path(), '.html'));
        view()->share('categoryList', Category::orderby('id', 'desc')->get());
        view()->share('pathCategoryId',array_pop($arr));

        return $next($request);
    }
}

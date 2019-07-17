<?php

namespace App\Http\Middleware;

use Closure;

class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (!auth('admin')->check()) {
            if ($request->ajax()) {
                return response()->json([
                    'code' => 1,
                    'msg' => '没有权限'
                ]);
            } else {
                return redirect('/admin/login');
            }
        }
        return $next($request);
    }
}

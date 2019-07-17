<?php

namespace App\Http\Controllers\Admin;

use App\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LoginController extends Controller
{
    //
    public function index()
    {
        return view('admin.login.index');
    }

    public function doLogin(Request $request)
    {

        $name = $request->get('name');
        $password = $request->get('password');
        $admin = Admin::where('name', $name)->first();
        if (!$admin) {
            return redirect('/admin/login');
        }
        try {
            if (decrypt($admin->password) != $password) {
                return redirect('/admin/login');
            }else{
                auth('admin')->login($admin);
                return redirect('/admin/index');
            }
        } catch (\Exception $exception) {
            return redirect('/admin/login');
        }

    }
}

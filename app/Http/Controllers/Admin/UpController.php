<?php

namespace App\Http\Controllers\Admin;

use App\Models\Up;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UpController extends Controller
{
    //
    public function index()
    {
        $pageData['upList'] = Up::orderby('id', 'desc')->paginate();
        return view('admin.up.index', $pageData);
    }
}

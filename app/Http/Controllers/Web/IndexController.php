<?php

namespace App\Http\Controllers\Web;

use App\Models\Topic;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    //
    public function index(Request $request, $id = 0)
    {
        $pageData['topicList'] = Topic::orderby('id', 'desc')->paginate();
        return view('web.index.index', $pageData);
    }
}

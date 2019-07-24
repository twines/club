<?php

namespace App\Http\Controllers\Web;

use App\Models\Category;
use App\Models\Topic;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    //
    public function index(Request $request, $id = 0)
    {
        $pageData['topicList'] = Topic::orderby('priority', 'desc')
            ->orderby('id', 'desc')
            ->where(function ($q) use ($id) {
                if ($id) {
                    $q->where('category_id', $id);
                }
            })
            ->paginate(16);
        $pageData['category'] = Category::find($id);
        return view('web.index.index', $pageData);
    }

    public function token()
    {
        return 'hanyunmuyu';
    }
}

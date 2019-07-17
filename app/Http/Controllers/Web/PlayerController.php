<?php

namespace App\Http\Controllers\Web;

use App\Models\Topic;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PlayerController extends Controller
{
    //
    public function player(Request $request,$aid)
    {
        $topic = Topic::where('aid', $aid)->first();
        if (!$topic) {
            abort(404);
        }
        $pageData['topic'] = $topic;
        return view('web.index.index',$topic);
    }
}

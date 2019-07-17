<?php

namespace App\Http\Controllers\Web;

use App\Models\Topic;
use App\Models\TopicVideo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PlayerController extends Controller
{
    //
    public function index(Request $request,$aid)
    {
        $topic = Topic::where('av', $aid)->first();
        if (!$topic) {
            abort(404);
        }
        $pageData['topic'] = $topic;
        $pageData['topicList'] = TopicVideo::where('av', $aid)->get();
        return view('web.player.index',$pageData);
    }
}

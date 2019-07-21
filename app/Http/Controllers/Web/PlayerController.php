<?php

namespace App\Http\Controllers\Web;

use App\Models\Topic;
use App\Models\TopicVideo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PlayerController extends Controller
{
    //
    public function index(Request $request, $av, $p = 1)
    {
        $pageData['p'] = $request->get('p', 1);
        $topicVideo = TopicVideo::where('av', $av)->where('p', $p)->first();
        if (!$topicVideo) {
            abort(404);
        }
        $pageData['topic'] = $topicVideo;
        $pageData['topicVideo'] = $topicVideo;
        $pageData['topicList'] = TopicVideo::where('av', $av)->get();
        return view('web.player.index', $pageData);
    }
}

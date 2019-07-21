<?php

namespace App\Http\Controllers\Web;

use App\Models\Topic;
use App\Models\TopicVideo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cache;

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
        $pageData['topicVideo'] = $topicVideo;
        $pageData['topicList'] = TopicVideo::where('av', $av)->get();
        return view('web.player.index', $pageData);
    }

    public function changeCategory(Request $request)
    {
        $videoId = $request->get('videoId');
        $categoryId = $request->get('categoryId');
        $key = 'video:' . $videoId;
        Cache::increment($key);
        if (Cache::has($key)) {
             $val = Cache::get($key);
            if ($val >= 5) {
                return TopicVideo::where('id', $videoId)
                    ->update(['category_id' => $categoryId]);
            }
        }
    }
}

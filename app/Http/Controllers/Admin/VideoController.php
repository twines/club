<?php

namespace App\Http\Controllers\Admin;

use App\Models\TopicVideo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class VideoController extends Controller
{
    //
    public function index()
    {
        $pageData['videoList'] = TopicVideo::orderby('id', 'desc')->paginate();
        return view('admin.video.index', $pageData);
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Models\Topic;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TopicController extends Controller
{
    //
    public function index()
    {
        $pageData['topicList'] = Topic::orderby('id', 'desc')->paginate();
        return view('admin.topic.index', $pageData);
    }
}

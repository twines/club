<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>戏曲乐园@yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <meta name="referrer" content="never">
    <meta http-equiv="cache-control" content="no-cache"/>
    <meta http-equiv="expires" content="Tue, 01 Jan 1980 1:00:00 GMT"/>
    <meta name="keywords" content="@yield('keyword')京剧、评剧、晋剧、豫剧、越剧、沪剧、昆曲、秦腔、梆子、黄梅戏、二人转、地方戏，在线观看，戏曲下载">
    <meta name="description" content="@yield('description')戏曲乐园致力于为广大戏迷提供优质戏曲视频，戏曲下载">
    <link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://cdn.staticfile.org/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="/ckplayer/ckplayer.js" charset="UTF-8"></script>
</head>

<body>
<nav class="navbar navbar-inverse container">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/">戏曲乐园</a>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav">
                <li class="active"><a href="/">主页</a></li>
                @foreach($categoryList as $category)
                    <li><a href="{{url('/',['id'=>$category->id])}}.html">{{$category->category_name}}</a></li>
                @endforeach
            </ul>
        </div>
    </div>
</nav>
<div class="container">
    @yield('content')
</div>
<div class="jumbotron text-center" style="margin-bottom:0">
    <h5 class="small">网站展示的内容来自互联网，本站没有存储任何相关视频和图片，本站的目的是方便戏曲爱好者收看戏曲节目，同时希望为戏曲事业做一点自己的贡献，如果侵犯了您的权益请联系我们。QQ：1355081829</h5>
</div>
</body>

</html>

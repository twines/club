<!DOCTYPE html>
<html manifest="IGNORE.manifest">
<head>
    <meta charset="UTF-8">
    <title>戏曲乐园</title>

    <meta name="referrer" content="never">
    <meta http-equiv="cache-control" content="max-age=0"/>
    <meta http-equiv="cache-control" content="no-cache"/>
    <meta http-equiv="expires" content="0"/>
    <meta http-equiv="expires" content="Tue, 01 Jan 1980 1:00:00 GMT"/>
    <meta http-equiv="pragma" content="no-cache"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
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
            <a class="navbar-brand" href="#">戏曲乐园</a>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav">
                <li class="active"><a href="#">主页</a></li>
                <li><a href="#">京剧</a></li>
                <li><a href="#">豫剧</a></li>
                <li><a href="#">河南坠子</a></li>
                <li><a href="#">梆子戏</a></li>
                <li><a href="#">黄梅戏</a></li>
                <li><a href="#">昆腔</a></li>
            </ul>
        </div>
    </div>
</nav>

<div class="container">
    <ul class="breadcrumb">
        <li><a href="/">首页</a></li>
        <li class="active">{{$topic->title}}</li>
    </ul>
    <div class="row">
        <div class="col-sm-9">
            <div id="video" style="width: 100%; height: 400px;max-width: 600px;margin: 0 auto">
            </div>
            <div class="row text-center center-block">
                <a class="btn btn-primary" id="refresh">刷新重试</a>
            </div>
        </div>
        <div class="col-sm-3">
            <a href="#" class="list-group-item active">
                {{$topic->title}}
            </a>
            @foreach($topicList as $item)
                <a class="list-group-item" href="{{url('/player',['id'=>$item->av])}}?=p{{$item->p}}">
                    {{$item->title}}
                </a>
            @endforeach
        </div>
    </div>


    <div class="jumbotron text-center" style="margin-bottom:0">
        <h5 class="small">网站展示的内容来自互联网，如果侵犯了您的权益请联系我们。QQ：1355081829</h5>
    </div>
    <script>
        $('#refresh').click(function () {
            window.location.href = window.location.href + '?v=' + Math.random()
        });

        function callbackfunction(j) {
            var u = j.durl[0].url;
            var videoObject = {
                container: '#video', //容器的ID或className
                variable: 'player', //播放函数名称
                loop: true, //播放结束是否循环播放
                autoplay: false,//是否自动播放
                poster: 'https://timgsa.baidu.com/timg?image&quality=80&size=b9999_10000&sec=1562957718296&di=f7f9b430582e683c320815300d97aa2d&imgtype=0&src=http%3A%2F%2Fimg1.gtimg.com%2Frushidao%2Fpics%2Fhv1%2F54%2F85%2F2239%2F145612704.jpg',
                preview: {
                    file: [j.img],
                    scale: 2
                },
                // flashplayer:true,
                //live:true,
                //debug:true,
                video: [
                    [u, 'video/mp4', '中文标清', 0],
                ]
            };
            new ckplayer(videoObject);
        }

        function parseVideo(page) {
            $.getScript("https://api.bilibili.com/playurl?callback=callbackfunction&aid={{$topic->av}}&page=" + page + "&platform=html5&quality=1&vtype=mp4&type=jsonp");
        }

        function getQueryString(name) {
            var reg = new RegExp("(^|&)" + name + "=([^&]*)(&|$)", "i");
            var r = window.location.search.substr(1).match(reg);
            if (r != null) return unescape(r[2]);
            return null;
        }

        var p2 = '{{$topic->p}}';
        if (getQueryString("p")) {
            p2 = getQueryString("p");
        }
        parseVideo(p2);
    </script>

    <iframe style="display: none" src="https://www.bilibili.com/"
            sandbox="allow-forms allow-scripts allow-same-origin  allow-popups">
    </iframe>
</body>
</html>

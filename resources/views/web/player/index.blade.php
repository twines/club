@extends('web.layout.app')
@section('title')
    {{$topic->title}}
@endsection
@section('content')
    <ul class="breadcrumb">
        <li><a href="/">首页</a></li>
        <li class="active">{{$topic->title}}</li>
    </ul>
    <div class="row">
        <div class="col-sm-9">
            <div id="video" style="width: 100%; height: 400px;max-width: 600px;margin: 0 auto">
            </div>
            <div class="row text-center center-block">
                <a class="btn btn-primary hidden" id="refresh">刷新重试</a>
            </div>
        </div>
        <div class="col-sm-3">
            <a href="#" class="list-group-item active">
                {{$topic->title}}
            </a>
            @foreach($topicList as $item)
                <a class="list-group-item" href="{{url('/player',['id'=>$item->av])}}?p={{$item->p}}">
                    {{$item->title}}
                </a>
            @endforeach
        </div>
    </div>
    <script>
        $('#refresh').click(function () {
            window.location.href = window.location.href + '?v=' + Math.random()
        });
        var timer = setTimeout(function () {
            $('#refresh').show();
        }, 5000);

        function callbackfunction(j) {
            clearTimeout(timer);
            var u = j.durl[0].url;
            var videoObject = {
                container: '#video', //容器的ID或className
                variable: 'player', //播放函数名称
                loop: true, //播放结束是否循环播放
                autoplay: false,//是否自动播放
                poster: j.img,
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

        function parseVideo() {
            $.getScript("https://api.bilibili.com/playurl?callback=callbackfunction&aid={{$topic->av}}&page={{$p}}&platform=html5&quality=1&vtype=mp4&type=jsonp");
        }

        parseVideo();
    </script>

    <iframe style="display: none" src="https://www.bilibili.com/"
            sandbox="allow-forms allow-scripts allow-same-origin  allow-popups">
    </iframe>
@endsection

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>戏曲乐园</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://cdn.staticfile.org/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
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
    <div class="row">
        @foreach($topicList as $topic)
            <div class="col-xs-6 col-md-3">
                <div class="thumbnail">
                    <img src="https://timgsa.baidu.com/timg?image&quality=80&size=b9999_10000&sec=1562957718296&di=f7f9b430582e683c320815300d97aa2d&imgtype=0&src=http%3A%2F%2Fimg1.gtimg.com%2Frushidao%2Fpics%2Fhv1%2F54%2F85%2F2239%2F145612704.jpg"
                         alt="通用的占位符缩略图">
                    <div class="caption">
                        <h3>{{$topic->title}}</h3>
                        <p>{{$topic->description}}</p>
                        <p>
                            <a href="{{url('/player',['id'=>$topic->av])}}" class="btn btn-primary" role="button">
                                观看
                            </a>
                        </p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <div class="row text-center">
        {{$topicList->links()}}
    </div>
</div>
<div class="jumbotron text-center" style="margin-bottom:0">
    <h5 class="small">网站展示的内容来自互联网，如果侵犯了您的权益请联系我们。QQ：1355081829</h5>
</div>
</body>

</html>

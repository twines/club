@extends('web.layout.app')
@section('title')
    {{$topic->title}}
@endsection
@section('content')
    {{--<iframe style="display: none" src="https://www.bilibili.com/"--}}
    {{--sandbox="allow-forms allow-scripts allow-same-origin  allow-popups">--}}
    {{--</iframe>--}}
    <ul class="breadcrumb">
        <li><a href="/">首页</a></li>
        <li class="active">{{$topic->title}}</li>
    </ul>
    <div class="row">
        <div class="col-sm-9">
            <iframe
                    width="8"
                    height="8"
                    id="main"
                    src="https://www.bilibili.com/blackboard/html5mobileplayer.html?aid=54886554&cid=95990482&page=4&high_quality=1">
            </iframe>
            <div id="video" style="width: 100%;margin: 0 auto">
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
            <img src="/pay.jpg" class="img-responsive">
            <h2>期待您的赞赏，有您的支持才有更加丰富的戏曲节目。</h2>
        </div>
    </div>
    <script>
        var flag = false;
        var browser = {
            versions: function () {
                var u = navigator.userAgent, app = navigator.appVersion;
                return {         //移动终端浏览器版本信息
                    trident: u.indexOf('Trident') > -1, //IE内核
                    presto: u.indexOf('Presto') > -1, //opera内核
                    webKit: u.indexOf('AppleWebKit') > -1, //苹果、谷歌内核
                    gecko: u.indexOf('Gecko') > -1 && u.indexOf('KHTML') == -1, //火狐内核
                    mobile: !!u.match(/AppleWebKit.*Mobile.*/), //是否为移动终端
                    ios: !!u.match(/\(i[^;]+;( U;)? CPU.+Mac OS X/), //ios终端
                    android: u.indexOf('Android') > -1 || u.indexOf('Linux') > -1, //android终端或uc浏览器
                    iPhone: u.indexOf('iPhone') > -1, //是否为iPhone或者QQHD浏览器
                    iPad: u.indexOf('iPad') > -1, //是否iPad
                    webApp: u.indexOf('Safari') == -1 //是否web应该程序，没有头部与底部
                };
            }(),
            language: (navigator.browserLanguage || navigator.language).toLowerCase()
        };
        var ua = navigator.userAgent.toLowerCase();//获取判断用的对象
        $("#main").load(function () {
            if (browser.versions.mobile) {//判断是否是移动设备打开。browser代码在下面
                if (ua.match(/MicroMessenger/i) == "micromessenger") {
                    //在微信中打开
                    $('#main').css({"width": "100%", "height": "100%", "back-ground": "red"});
                    var mainheight = $(this).contents().find("body").width() + 300;
                    $(this).height(mainheight);

                    //如果直接加载成功就展示ckplayer 否则用B的播放器
                    if (!flag) {
                        $('#video').hide();
                    }
                } else {
                    $('#video').show()
                    $('#main').css({'position': 'absolute', "z-index": "-9999", "top": 200, "left": 50})
                }
            }
        });
        var player;

        function callbackfunction(j) {
            if (j.code !== undefined) {
                var ua = navigator.userAgent.toLowerCase();//获取判断用的对象
                if (ua.match(/MicroMessenger/i) != "micromessenger") {
                    setInterval(function () {
                        window.location.reload()
                    }, 1000);
                }
                return;
            }
            flag = true;
            $('#video').show()
            $('#main').hide()
            var u = j.durl[0].url;
            var videoObject = {
                container: '#video', //容器的ID或className
                variable: 'player', //播放函数名称
                loop: false, //播放结束是否循环播放
                autoplay: false,//是否自动播放
                poster: j.img,
                preview: {
                    file: [j.img],
                    scale: 2
                },
                promptSpot: [ //提示点
                    {
                        words: '提示点文字01',
                        time: 30
                    },
                    {
                        words: '提示点文字02',
                        time: 150
                    }
                ],
                // adfront: '/pay.jpg', //前置广告
                // adfronttime: '15',//前置广告单个时长
                // // adfrontlink: 'https://promotion.aliyun.com/ntms/yunparter/invite.html?userCode=8hiawluh,https://promotion.aliyun.com/ntms/yunparter/invite.html?userCode=8hiawluh',
                // adfronttype: 'jpg',

                adpause: '/pay.jpg',
                adpausetime: '15',//暂信广告每个播放5秒种然后循环播放
                // adpauselink: 'https://promotion.aliyun.com/ntms/yunparter/invite.html?userCode=8hiawluh,https://promotion.aliyun.com/ntms/yunparter/invite.html?userCode=8hiawluh',


                adinsert: '/pay.jpg',
                adinserttime: '15',//中间插入广告的单个视频的时长
                // adinsertlink: 'https://promotion.aliyun.com/ntms/yunparter/invite.html?userCode=8hiawluh,https://promotion.aliyun.com/ntms/yunparter/invite.html?userCode=8hiawluh',
                adinserttype: 'jpg',
                inserttime: '300',//中间插入广告需要显示的时间点

                adend: '/pay.jpg',
                adendtime: '15,50',
                adendtype: 'jpg,mp4',
                // adendlink: 'https://promotion.aliyun.com/ntms/yunparter/invite.html?userCode=8hiawluh,https://promotion.aliyun.com/ntms/yunparter/invite.html?userCode=8hiawluh',
                //advertisements:'website:ad.json',//广告部分也可以用一个json文件来进行配置，可以动态文件
                //广告部分结束
                // flashplayer:true,
                //live:true,
                //debug:true,
                video: [
                    [u, 'video/mp4', '中文标清', 0],
                ]
            };
            player = new ckplayer(videoObject);
        }


        function parseVideo() {
            $.getScript("https://api.bilibili.com/playurl?callback=callbackfunction&aid={{$topic->av}}&page={{$p}}&platform=html5&quality=1&vtype=mp4&high_quality=1&type=jsonp");
        }

        parseVideo();
    </script>
@endsection

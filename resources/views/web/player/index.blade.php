@extends('web.layout.app')
@section('title')
    {{$topicVideo->title}}
@endsection
@section('content')
    {{--<iframe style="display: none" src="https://www.bilibili.com/"--}}
    {{--sandbox="allow-forms allow-scripts allow-same-origin  allow-popups">--}}
    {{--</iframe>--}}
    <ul class="breadcrumb">
        <li><a href="/">首页</a></li>
        <li>
            <a href="{{url('/',['id'=>$topicVideo->category->id])}}.html">{{$topicVideo->category->category_name}}</a>
        </li>
        <li class="active">{{$topicVideo->title}}</li>
    </ul>
    <div id="myAlert" class="hidden">
        <div class="alert alert-success">
            <strong>提交成功！</strong>感谢您的支持，您的支持是我不懈的动力。
        </div>
    </div>
    <div class="row">
        <div class="col-sm-9">
            <iframe
                    width="8"
                    height="8"
                    id="main"
                    src="https://www.bilibili.com/blackboard/html5mobileplayer.html?aid={{$topicVideo->av}}&cid={{$topicVideo->cid}}&page={{$topicVideo->p}}&high_quality=1">
            </iframe>
            <div id="video" class="row" style="width: 100%;margin: 0 auto">
            </div>
        </div>
        <div class="col-sm-3">
            <a href="#" class="list-group-item active">
                {{$topicVideo->title}}
            </a>
            @foreach($topicList as $item)
                <a class="list-group-item" title="{{$item->title}}"
                   href="{{url('/player',['id'=>$item->av,'p'=>$item->p])}}.html">
                    {{$item->title}}
                </a>
            @endforeach
            <button class="btn btn-danger" data-toggle="modal" data-target="#myModal">
                我要纠错，这个戏曲分类有误
            </button>
            <img src="/pay.jpg" class="img-responsive">
            <h2>期待您的赞赏，有您的支持才有更加丰富的戏曲节目。</h2>
        </div>
        <!-- 模态框（Modal） -->
    </div>
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
         aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"
                            aria-hidden="true">×
                    </button>
                    <h4 class="modal-title" id="myModalLabel">
                        戏曲纠错（按下 ESC 按钮退出）
                    </h4>
                </div>
                <div class="modal-body">
                    <h4>点击您认为的戏剧类型即可（没有错误请忽略）</h4>
                    @foreach($categoryList as $category)
                        <button type="button"
                                onclick="changeCategory('{{$topicVideo->id}}','{{$category->id}}')"
                                class="btn btn-primary">{{$category->category_name}}</button>

                    @endforeach
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default"
                            data-dismiss="modal">关闭
                    </button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div>
    <script>

        // $('#myModal').modal('show')
        var _token = '{{csrf_token()}}';
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
                    }, 2000);
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
                loaded: 'loadedHandler', //当播放器加载后执行的函数
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


                // adinsert: '/pay.jpg',
                // adinserttime: '15',//中间插入广告的单个视频的时长
                // // adinsertlink: 'https://promotion.aliyun.com/ntms/yunparter/invite.html?userCode=8hiawluh,https://promotion.aliyun.com/ntms/yunparter/invite.html?userCode=8hiawluh',
                // adinserttype: 'jpg',
                // inserttime: '300',//中间插入广告需要显示的时间点

                adend: '/pay.jpg',
                adendtime: '15,0',
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

        function loadedHandler() {
            // player.addListener('pause', pauseHandler); //监听暂停播放
            player.addListener('ended', endedHandler); //监听播放结束
            player.addListener('time', timeHandler); //监听播放时间
        }

        function pauseHandler() {
            // $('#myModal').modal('show')
        }

        var tag = false;

        function timeHandler(time) {
            if (!tag) {
                if (time > 300) {
                    tag = true;
                    $.ajax({
                        url: '/player/time/{{$topicVideo->topic_id}}',
                        data: {_token: _token},
                        method: 'post',
                        success: function () {

                        }
                    });
                }

            }
        }

        function endedHandler() {
            $('#myModal').modal('show')
        }

        function adjump() {
            player.videoPlay();
        }

        function changeCategory(videoId, categoryId) {
            $.ajax({
                url: '{{url('/player/changeCategory')}}',
                method: 'post',
                data: {
                    videoId: videoId, categoryId: categoryId, _token: _token
                },
                success: function () {
                    $('#myModal').modal('hide')
                    player.videoPlay();
                    $("#myAlert").removeClass('hidden');
                    setTimeout(function () {
                        $("#myAlert").addClass('hidden');
                    }, 3000)
                }
            });
        }

        function parseVideo() {
            $.getScript("https://api.bilibili.com/playurl?callback=callbackfunction&aid={{$topicVideo->av}}&page={{$topicVideo->p}}&platform=html5&quality=1&vtype=mp4&high_quality=1&type=jsonp");
        }

        parseVideo();
    </script>
@endsection

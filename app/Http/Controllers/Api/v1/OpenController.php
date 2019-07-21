<?php

namespace App\Http\Controllers\Api\v1;

use App\Models\Category;
use App\Models\Topic;
use App\Models\TopicVideo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OpenController extends Controller
{
    //
    public function index(Request $request)
    {
        $jsonStr = '{"code":0,"message":"0","ttl":1,"data":{"aid":20960807,"videos":20,"tid":122,"tname":"野生技术协会","copyright":1,"pic":"http://i0.hdslb.com/bfs/archive/672fccd12974fcdb9601a864ac724f496c14492f.jpg","title":"20天从零学会下围棋","pubdate":1521444306,"ctime":1521444310,"desc":"Q群1790163\n围棋教学项视频，围棋需要大量的实践练习才能融会贯通知识点，并非速成类的游戏，需要通过大量的做题熟练棋型、增加计算力或者找水平高的人帮忙复盘提高更佳。\n\n个人理解围棋并非非胜即负的游戏，古人用棋来修身养性。我们在长期学习提高过程中，对个人的思维习惯、行为习惯会得到潜移默化的影响。下棋有棋理，棋理很有趣，通生活。这个是围棋最宝贵的东西，学围棋望进得去、出的来。","state":0,"attribute":3162240,"duration":15317,"rights":{"bp":0,"elec":0,"download":1,"movie":0,"pay":0,"hd5":0,"no_reprint":1,"autoplay":1,"ugc_pay":0,"is_cooperation":0,"ugc_pay_preview":0},"owner":{"mid":3171163,"name":"夏知非Song","face":"http://i2.hdslb.com/bfs/face/a2f486065460a0b344e3a45f0d667d155152f88b.jpg"},"stat":{"aid":20960807,"view":208851,"danmaku":4276,"reply":552,"favorite":16219,"coin":4195,"share":1397,"now_rank":0,"his_rank":0,"like":3377,"dislike":0},"dynamic":"Q群1790163\n围棋教学项视频，围棋需要大量的实践练习才能融会贯通知识点，并非速成类的游戏，需要通过大量的做题熟练棋型、增加计算力或者找水平高的人帮忙复盘提高更佳。\n\n个人理解围棋并非非胜即负的游戏，古人用棋来修身养性。我们在长期学习提高过程中，对个人的思维习惯、行为习惯会得到潜移默化的影响。下棋有棋理，棋理很有趣，通生活。这个是围棋最宝贵的东西，学围棋望进得去、出的来。","cid":34359400,"dimension":{"width":1280,"height":720,"rotate":0},"no_cache":false,"pages":[{"cid":34359400,"page":1,"from":"vupload","part":"第一天 棋子的气","duration":558,"vid":"","weblink":"","dimension":{"width":1280,"height":720,"rotate":0}},{"cid":34359482,"page":2,"from":"vupload","part":"第二天 禁入点","duration":441,"vid":"","weblink":"","dimension":{"width":1280,"height":720,"rotate":0}},{"cid":34359525,"page":3,"from":"vupload","part":"第三天 死棋与活棋","duration":804,"vid":"","weblink":"","dimension":{"width":1280,"height":720,"rotate":0}},{"cid":36534014,"page":4,"from":"vupload","part":"第四天 死亡线","duration":556,"vid":"","weblink":"","dimension":{"width":1280,"height":720,"rotate":0}},{"cid":34359626,"page":5,"from":"vupload","part":"第五天 棋子的分块","duration":536,"vid":"","weblink":"","dimension":{"width":1104,"height":622,"rotate":0}},{"cid":34359709,"page":6,"from":"vupload","part":"第六天 双打吃","duration":779,"vid":"","weblink":"","dimension":{"width":1280,"height":720,"rotate":0}},{"cid":34359759,"page":7,"from":"vupload","part":"第七天 征吃","duration":793,"vid":"","weblink":"","dimension":{"width":1280,"height":720,"rotate":0}},{"cid":34359908,"page":8,"from":"vupload","part":"第八天 枷吃","duration":793,"vid":"","weblink":"","dimension":{"width":1280,"height":720,"rotate":0}},{"cid":34359992,"page":9,"from":"vupload","part":"第九天 倒扑","duration":568,"vid":"","weblink":"","dimension":{"width":1280,"height":720,"rotate":0}},{"cid":34360074,"page":10,"from":"vupload","part":"第十天 扑与接不归","duration":637,"vid":"","weblink":"","dimension":{"width":1280,"height":720,"rotate":0}},{"cid":34360123,"page":11,"from":"vupload","part":"第十一天 基础对杀","duration":788,"vid":"","weblink":"","dimension":{"width":1280,"height":720,"rotate":0}},{"cid":34360183,"page":12,"from":"vupload","part":"第十二天 真眼与假眼","duration":1135,"vid":"","weblink":"","dimension":{"width":1280,"height":720,"rotate":0}},{"cid":34360238,"page":13,"from":"vupload","part":"第十三天 棋子的控制点","duration":760,"vid":"","weblink":"","dimension":{"width":1280,"height":720,"rotate":0}},{"cid":34360316,"page":14,"from":"vupload","part":"第十四天 胜负的计算","duration":664,"vid":"","weblink":"","dimension":{"width":1280,"height":720,"rotate":0}},{"cid":34360362,"page":15,"from":"vupload","part":"第十五天 目与单官","duration":636,"vid":"","weblink":"","dimension":{"width":1280,"height":720,"rotate":0}},{"cid":34360426,"page":16,"from":"vupload","part":"第十六天 棋子的作用","duration":1060,"vid":"","weblink":"","dimension":{"width":1280,"height":720,"rotate":0}},{"cid":34360463,"page":17,"from":"vupload","part":"第十七天 大小的判断","duration":1035,"vid":"","weblink":"","dimension":{"width":1280,"height":720,"rotate":0}},{"cid":34360538,"page":18,"from":"vupload","part":"第十八天 劫","duration":944,"vid":"","weblink":"","dimension":{"width":1280,"height":720,"rotate":0}},{"cid":34360630,"page":19,"from":"vupload","part":"第十九天 棋子的强弱","duration":634,"vid":"","weblink":"","dimension":{"width":1280,"height":720,"rotate":0}},{"cid":34360724,"page":20,"from":"vupload","part":"第二十天 19路的实战","duration":1196,"vid":"","weblink":"","dimension":{"width":672,"height":378,"rotate":0}}],"subtitle":{"allow_submit":false,"list":[]}}}';
        $categoryId = 8;
        $token = '1355081829';
        if ($token != $request->get('token')) {
            return ['code' => 1, 'msg' => 'token错误'];
        }
        $categoryId = $request->get('category_id');
        $jsonStr = $request->get('jsonStr');
        try {
            $data = json_decode($jsonStr, true);
            $data = $data['data'];
            $topicData = [];
            $topicData['title'] = $data['title'];
            $topicData['av'] = $data['aid'];
            $topicData['img'] = $data['pic'];
            $topicData['category_id'] = $categoryId;
            $topicData['description'] = $data['desc'];
            $topicData['duration'] = $data['duration'];
            $topic = Topic::where('av', $data['aid'])->first();
            $category = Category::find($categoryId);
            if (!$category) {
                $categoryId = 1;
            }
            if ($topic) {
                return ['code' => 1, 'msg' => '已经存在'];
            }
            $topic = Topic::create($topicData);
            if ($topic) {
                $topicVideoList = [];
                foreach ($data['pages'] as $page) {
                    $video = [];
                    $video['topic_id'] = $topic->id;
                    $video['av'] = $data['aid'];
                    $video['cid'] = $page['cid'];
                    $video['title'] = $page['part'];
                    $video['duration'] = $page['duration'];
                    $video['category_id'] = $categoryId;
                    $video['p'] = $page['page'];
                    $topicVideoList[] = $video;
                }
                TopicVideo::insert($topicVideoList);
            }
            return ['code' => 0, 'msg' => '添加成功'];
        } catch (\Exception $exception) {
            return ['code' => 1, 'msg' => $exception->getMessage()];
        }

    }
}

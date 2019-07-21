@extends('web.layout.app')
@section("title")@if($category){{$category->category_name}}@endif @endsection
@section('content')
    <style>
        .hanyun-title {
            overflow: hidden;
            text-overflow: ellipsis;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            color: #333333;
        }
        a:hover{
            text-decoration: none;
        }
    </style>
    <div class="row">
        @foreach($topicList as $topic)
            <a href="{{url('/player',['id'=>$topic->av,'p'=>1])}}.html" title="{{$topic->title}}">
                <div class="col-xs-6 col-md-3" style="height: 300px;overflow: hidden">
                    <div class="thumbnail">
                        <img src="{{$topic->img}}"
                             alt="{{$topic->title}}">
                        <div class="caption">
                            <h4 class="hanyun-title">{{$topic->title}}</h4>
                            <p>
                                <a href="{{url('/player',['id'=>$topic->av,'p'=>1])}}.html" title="{{$topic->title}}"
                                   class="btn btn-primary" role="button">
                                    观看
                                </a>
                            </p>
                        </div>
                    </div>
                </div>
            </a>
        @endforeach
    </div>
    <div class="row text-center">
        {{$topicList->links()}}
    </div>
@endsection

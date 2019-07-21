@extends('web.layout.app')
@section("title")@if($category){{$category->category_name}}@endif @endsection
@section('content')
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
                            <a href="{{url('/player',['id'=>$topic->av,'p'=>1])}}.html" title="{{$topic->title}}" class="btn btn-primary" role="button">
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
@endsection

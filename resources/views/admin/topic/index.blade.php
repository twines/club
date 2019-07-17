@extends('admin.layout.admin')
@section('content')
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">专辑列表</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table id="example2" class="table table-bordered table-hover">
                        <thead>
                        <tr>
                            <th>id</th>
                            <th>标题</th>
                            <th>专辑地址</th>
                            <th>状态</th>
                            <th>管理</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($topicList as $topic)
                            <tr>
                                <td>{{$topic->id}}</td>
                                <td>{{$topic->title}}</td>
                                <td>
                                    <a href="{{$topic->topic_url}}" target="_blank">{{$topic->title}}</a>
                                </td>
                                <td>
                                    @if($topic->status==1)
                                        可用
                                    @else
                                        不可用
                                    @endif
                                </td>
                                <td>
                                    <button class="btn btn-primary">通过</button>
                                    <button class="btn btn-danger">禁用</button>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
    {{$topicList->links()}}
@endsection

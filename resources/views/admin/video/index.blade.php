@extends('admin.layout.admin')
@section('content')
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Hover Data Table</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table id="example2" class="table table-bordered table-hover">
                        <thead>
                        <tr>
                            <th>id</th>
                            <th>av</th>
                            <th>p</th>
                            <th>title</th>
                            <th>视频地址</th>
                            <th>描述</th>
                            <th>管理</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($videoList as $video)
                            <tr>
                                <td>{{$video->id}}</td>
                                <td>{{$video->av}}</td>
                                <td>{{$video->p}}</td>
                                <td>{{$video->title}}</td>
                                <td>
                                    <a href="https://www.bilibili.com/video/av{{$video->av}}?p={{$video->p}}"
                                       target="_blank">{{$video->title}}</a>
                                </td>
                                <td>{{$video->description}}</td>
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
    {{$videoList->links()}}
@endsection

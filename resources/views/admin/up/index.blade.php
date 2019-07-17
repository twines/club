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
                            <th>名字</th>
                            <th>头像</th>
                            <th>主页地址</th>
                            <th>状态</th>
                            <th>管理</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($upList as $up)
                            <tr>
                                <td>{{$up->id}}</td>
                                <td>{{$up->name}}</td>
                                <td>
                                    <div class="col-md-2 col-xs-6">
                                        <img src="{{$up->img}}" class="img-responsive">
                                    </div>
                                </td>
                                <td>
                                    <a href="{{$up->up_center}}" target="_blank">{{$up->name}}</a>
                                </td>
                                <td>
                                    @if($up->status==1)
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
    {{$upList->links()}}
@endsection

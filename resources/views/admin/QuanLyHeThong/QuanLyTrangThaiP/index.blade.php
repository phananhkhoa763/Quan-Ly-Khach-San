@extends('admin.layouts.master')
@section('title','Quản Lý Trạng Thái')
@section('header','Quản Lý Trạng Thái')
@section('link')
<li class="active">Quản Lý Trạng Thái</li>
@endsection
@section('content')
<div class="col-xs-12 col-md-7 col-lg-12">
    <div class="panel panel-primary">
        <a href="{{route('TrangThai.create')}}" class="btn btn-success"><span></span> Thêm Mới</a>
        <div class="panel-body">
            <div class="bootstrap-table">
                <table class="table table-dark table-striped">
                    <thead>
                        <tr class="bg-danger">
                            <th>Tên Tên Trạng Thái</th>
                            <th style="width:30%">Tùy chọn</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($trangThai as $k)
                        <tr>
                            <td><b>{{$k->name}}</b></td>
                            <td>
                                <a href="{{route('TrangThai.edit', ['id' => $k->id])}}" class="btn btn-warning"><span class="glyphicon glyphicon-edit"></span> Sửa</a>
                                <a href="{{route('TrangThai.destroy', ['id' => $k->id])}}" onclick="return confirm('Bạn có chắc chắn muốn xóa?')" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> Xóa</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="pagination-area" style="margin-left: 40%;">
                <ul class="pagination">
                    {{ $trangThai->links() }}
                </ul>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
</div>
</div>
<!--/.row-->



@endsection
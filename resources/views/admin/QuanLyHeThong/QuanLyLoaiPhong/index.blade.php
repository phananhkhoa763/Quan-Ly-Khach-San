@extends('admin.layouts.master')
@section('title','Quản Lý Loại Phòng')
@section('header','Quản Lý Loại Phòng')
@section('link')
<li class="active">Quản Lý Loại Phòng</li>
@endsection
@section('content')
<div class="col-xs-12 col-md-7 col-lg-12">
    <div class="panel panel-primary">
        <a href="{{route('LoaiPhong.create')}}" class="btn btn-success"><span></span> Thêm Mới</a>
        <div class="panel-body">
            <div class="bootstrap-table">
                <table class="table table-dark table-striped">
                    <thead>
                        <tr class="bg-danger">
                            <th>Loại Phòng</th>
                            <th>Chi Tiết</th>
                            <th>Giá</th>
                            <th style="width:30%">Tùy chọn</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($LoaiPhong as $k)
                        <tr>
                            <td><b>{{$k->name}}</b></td>
                            <td><b>{!!$k->chitiet!!}</b></td>
                            <td><b>{{ number_format($k->gia) }}$</b></td>
                            <td>
                                <a href="{{route('LoaiPhong.edit', ['id' => $k->id])}}" class="btn btn-warning"><span class="glyphicon glyphicon-edit"></span> Sửa</a>
                                <a href="{{route('LoaiPhong.destroy', ['id' => $k->id])}}" onclick="return confirm('Bạn có chắc chắn muốn xóa?')" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> Xóa</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="pagination-area" style="margin-left: 40%;">
                <ul class="pagination">
                    {{ $LoaiPhong->links() }}
                </ul>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
</div>
</div>
<!--/.row-->



@endsection
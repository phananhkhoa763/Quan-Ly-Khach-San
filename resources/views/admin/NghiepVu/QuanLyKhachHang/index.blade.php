@extends('admin.layouts.master')
@section('title','Quản Lý Khách Hàng')
@section('header','Quản Lý Khách Hàng')
@section('link')
<li class="active">Quản Lý Khách Hàng</li>
@endsection
@section('content')
<div class="col-sm-9">
    <form action="{{route('hopDong.seach')}}" class="searchform">
        @csrf
        <div class="col-sm-3">
            <input type="text" name="name" placeholder="name" />
        </div>
        <button type="submit" class="btn btn-warning">search</button>
    </form>
</div>
<div class="col-xs-12 col-md-7 col-lg-12">
    <div class="panel panel-primary">
        <a href="{{route('khachHang.create')}}" class="btn btn-success"><span></span> Thêm Mới</a>
        <div class="panel-body">
            <div class="bootstrap-table">
                <table class="table table-dark table-striped">
                    <thead>
                        <tr class="bg-danger">
                            <th>STT</th>
                            <th>Họ Tên</th>
                            <th>Ngày Sinh</th>
                            <th>GT</th>
                            <th>CMND</th>
                            <th>SDT</th>
                            <th>Địa Chỉ</th>
                            <th>Email</th>
                            <th style="width:20%">Tùy chọn</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                        $i=1;
                        @endphp
                        @foreach($khachhang as $k)
                        @php
                        $date=date_create($k->NgaySinh);
                        @endphp
                        <tr>
                            <td><b>{{$i++}}</b></td>
                            <td><b>{{$k->HoTen}}</b></td>
                            <td><b>{{ date_format($date,"m-d-Y")}}</b></td>
                            <td><b>{{$k->GioTinh}}</b></td>
                            <td><b>{{$k->CMND}}</b></td>
                            <td><b>{{ $k->SDT }}</b></td>
                            <td><b>{{$k->DiaChi}}</b></td>
                            <td><b>{{$k->email}}$</b></td>
                            <td>
                                <a href="{{route('khachHang.edit', ['id' => $k->id])}}" class="btn btn-warning"><span class="glyphicon glyphicon-edit"></span> Sửa</a>
                                <a  onclick="return confirm('Bạn có chắc chắn muốn xóa?')" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> Xóa</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="pagination-area" style="margin-left: 40%;">
                <ul class="pagination">
                    {{ $khachhang->links() }}
                </ul>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
</div>
</div>
<!--/.row-->



@endsection
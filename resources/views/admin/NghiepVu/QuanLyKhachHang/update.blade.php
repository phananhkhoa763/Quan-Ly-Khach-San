@extends('admin.layouts.master')
@section('title','Add Khách Hàng')
@section('header','Add Khách Hàng')
@section('link')
<li class="active">Add Khách Hàng</li>
@endsection
@section('content')
<form action="{{route('khachHang.update',['id'=>$KhachHang->id])}}" method="post" enctype="multipart/form-data">
    @csrf
    <div>
        <div class="col-sm-7">
            <div class="form-group">
                <label>Họ Tên</label>
                <input type="text" name="HoTen" class="form-control" value="{{$KhachHang->HoTen}}" placeholder="Họ Tên Khách Hàng" required />
            </div>
            <div class="form-group">
                <label>Ngày Sinh</label>
                <input type="date" name="NgaySinh" class="form-control" value="{{$KhachHang->NgaySinh}}" placeholder="Ngày sinh" required />
            </div>
            <div class="form-group">
                <label>Giới Tinh</label>
                <select name="GioTinh" id="GioTinh">
                    <option selected><b>Chọn giới tính</b></option>
                    @if($KhachHang->GioTinh=='Nam')
                    <option value="Nam" selected><b>Nam</b></option>
                    <option value="Nữ"><b>Nữ</b></option>
                    @else
                    <option value="Nam"><b>Nam</b></option>
                    <option value="Nữ" selected><b>Nữ</b></option>
                    @endif
                </select>
            </div>
            <div class="form-group">
                <label>CMND</label>
                <input type="number" name="CMND" value="{{$KhachHang->CMND}}" class="form-control" placeholder="CMND" required />
            </div>
            <div class="form-group">
                <label>Số Điện thoại</label>
                <input type="number" name="SDT" value="{{$KhachHang->SDT}}" class="form-control" placeholder="VD:0979539600" required />
            </div>
            <div class="form-group">
                <label>email</label>
                <input type="email" name="email" value="{{$KhachHang->email}}" class="form-control" placeholder="email" required />
            </div>
            <div class="form-group">
                <label>Địa chỉ</label>
                <textarea name="DiaChi" class="form-control">{{$KhachHang->DiaChi}}</textarea>
            </div>
            <input type="submit" name="submit" value="Thêm mới" class="btn btn-primary" />

        </div>
    </div>
</form>
@endsection
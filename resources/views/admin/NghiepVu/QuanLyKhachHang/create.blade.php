@extends('admin.layouts.master')
@section('title','Add Khách Hàng')
@section('header','Add Khách Hàng')
@section('link')
<li class="active">Add Khách Hàng</li>
@endsection
@section('content')
<form action="{{route('khachHang.store')}}" method="post" enctype="multipart/form-data">
    @csrf
    <div>
        <div class="col-sm-7">
            <div class="form-group">
                <label>Họ Tên</label>
                <input type="text" name="HoTen" class="form-control" placeholder="Họ Tên Khách Hàng" required />
            </div>
            <div class="form-group">
                <label>Ngày Sinh</label>
                <input type="date" name="NgaySinh" class="form-control" value="" placeholder="Ngày sinh" required />
            </div>
            <div class="form-group">
                <label>Giới Tinh</label>
                <select name="GioTinh" id="GioTinh">
                    <option selected><b>Chọn giới tính</b></option>
                    <option value="Nam"><b>Nam</b></option>
                    <option value="Nữ"><b>Nữ</b></option>
                </select>
            </div>
            <div class="form-group">
                <label>CMND</label>
                <input type="number" name="CMND" class="form-control" placeholder="CMND" required />
            </div>
            <div class="form-group">
                <label>Số Điện thoại</label>
                <input type="number" name="SDT" class="form-control"  placeholder="VD:0979539600" required />
            </div>
            <div class="form-group">
                <label>email</label>
                <input type="email" name="email" class="form-control"  placeholder="email" required />
            </div>
            <div class="form-group">
                <label>Địa chỉ</label>
                <textarea name="DiaChi" class="form-control" ></textarea>
            </div>
            <input type="submit" name="submit" value="Thêm mới" class="btn btn-primary" />

        </div>
    </div>
</form>
@endsection
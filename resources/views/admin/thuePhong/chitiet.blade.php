@extends('admin.layouts.master')
@section('title','Hợp Đồng Thuê Phòng')
@section('header','Hợp Đồng Thuê Phòng')
@section('link')
<li class="active">Hợp Đồng Thuê Phòng</li>
@endsection
@section('content')
<div class="col-xs-12 col-md-7 col-lg-12">
    <div class="panel panel-primary">
        @php
        $date1=date_create($array['NgayDen']);
        $date2=date_create($array['NgayDi']);
        @endphp
        <div class="row">
            <div class="col-sm-5">
                <div class="form-group">
                    <label><b>Mã Hợp Đồng:</b></label>
                    <input type="text" id="MaHD" value="{{$array['id']}}" class="form-control" name="MaHD">
                </div>
                <div class="form-group">
                    <label for="country"><b>Tên Khách Hàng:</b></label>
                    <input type="text" value="{{$array['HoTen']}}" class="form-control" id="SL" name="SL" />
                </div>
                <div class="form-group">
                    <label for="country"><b>Ngày Đến:</b></label>
                    <input type="text" value="{{ date_format($date1,"m-d-Y")}}" class="form-control" id="SL" name="SL" />
                </div>
            </div>
            <div class="col-sm-2">
            </div>
            <div class="col-sm-5">
                <div class="form-group">
                    <label for="country"><b>Tên Phòng:</b></label>
                    <input type="text" id="TenKH" value="{{$array['TenP']}}" class="form-control" name="TenKH">
                </div>
                <div class="form-group">
                    <label for="country"><b>Giá Phòng:</b></label>
                    <input type="number" value="{{$array['gia']}}" class="form-control" id="GiaT" name="GiaT">
                </div>
                <div class="form-group">
                    <label for="country"><b>Ngày Đi:</b></label>
                    <input type="text" value="{{ date_format($date2,"m-d-Y")}}" class="form-control" id="SL" name="SL" />
                </div>
            </div>
        </div>
        <div class="col-sm-4 form-group">
        </div>
        <div class="col-sm-8 form-group">
            <h2><b>Dịch Vụ Đã Sử Dụng</b></h2>
        </div>
        <table class="table table-bordered table-sm">
            <thead>
                <tr class="thead-dark">
                    <th>STT</th>
                    <th>Tên Dịch Vụ</th>
                    <th>Số Lương</th>
                    <th>Đơn Giá</th>
                    <th>Tổng</th>
                </tr>
            </thead>
            <tbody>
                @php
                $i=1;
                @endphp
                @foreach($array1 as $k)
                <tr>
                    <td><b>{{$i++}}</b></td>
                    <td><b>{{$k->TenDV}}</b></td>
                    <td><b>{{$k->soLuong}}</b></td>
                    <td><b>{{$k->GiaDV}}</b></td>
                    <td><b>{{$k->soLuong*$k->GiaDV}}</b></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
<!--/.row-->
@endsection
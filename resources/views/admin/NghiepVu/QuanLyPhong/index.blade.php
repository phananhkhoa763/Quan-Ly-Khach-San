@extends('admin.layouts.master')
@section('title','Quản Lý Phòng')
@section('header','Quản Lý Phòng')
@section('link')
<li class="active">Quản Lý Phòng</li>
@endsection
@section('content')
<div class="content mt-3">

    <div class="col-sm-12">
        <div class="alert  alert-success alert-dismissible fade show" role="alert">
            <span style="margin-right: 20px" class="badge badge-pill badge-success">Ghi chú </span>
            <a class="btn btn-primary"><span>{{$PhongT}}</span></a> <b><a style="color:black;">:Phòng Trống &nbsp </a></b>
            <a class="btn btn-danger"><span>{{$PhongDO}}</span></a> <b><a style="color:black;">:Đang ở &nbsp </a></b>
            <a class="btn btn-warning"><span>{{$PhongCK}}</span></a> <b><a style="color:black;">:Chờ khách &nbsp </a></b>
            <a class="btn btn-success"><span>{{$PhongHH}}</span></a> <b><a style="color:black;">:Hết hạng &nbsp </a></b>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    </div>
</div>

@foreach($Phong as $k)
<div class="col-sm-6 col-lg-3">
    @if($k->trangthai_id==1)
    <div class="card text-white bg-flat-color-1">
        @elseif($k->trangthai_id==2)
        <div class="card text-white bg-flat-color-3">
            @elseif($k->trangthai_id==3)
            <div class="card text-white bg-flat-color-4">
                @else
                <div class="card text-white bg-flat-color-5">
                    @endif
                    <div class="card-body pb-0" style="height: 115px;">
                        <div class="dropdown float-right">
                            <button class="btn bg-transparent dropdown-toggle theme-toggle text-light" type="button" id="dropdownMenuButton1" data-toggle="dropdown">
                                <i class="fa fa-cog"></i>
                            </button>
                            <div class="dropdown-menu index" aria-labelledby="dropdownMenuButton1">
                                <div class="dropdown-menu-content">
                                    @if($k->trangthai_id==3 or $k->trangthai_id==4)
                                    @if($k->booking == 0)
                                    <a class="dropdown-item" onclick="modalTT( {{ $k->thuePhong_id }} )">Thanh Toán Phòng</a>
                                    <a class="dropdown-item" onclick="modalGH( {{ $k->thuePhong_id }} )">Gia Hạng Phòng</a>
                                    @endif
                                    @endif
                                    @if($k->trangthai_id==1)
                                    <a class="dropdown-item" onclick="modalDKP( {{ $k->id }} )">Đăng Ký Phòng</a>
                                    <a class="dropdown-item" onclick="modalBooking( {{ $k->id }} )">Đặt cọc phòng</a>
                                    @endif
                                    @if($k->trangthai_id==2 and $k->booking == 1)
                                    <a class="dropdown-item" onclick="return confirm('Bạn có chắc chắn muốn Hủy ?')" href="{{route('phong.HuyPhong',['id'=>$k->thuePhong_id])}}">Hủy Đặt Cọc Phòng</a>
                                    <a class="dropdown-item" onclick="return confirm('Bạn có chắc chắn muốn Đặt Phòng Bây Giờ ?')" href="{{route('phong.thuePhong1',['id'=>$k->thuePhong_id])}}">Đăng Ký Phòng</a>
                                    @endif
                                    @if($k->trangthai_id==4 and $k->booking == 1)
                                    <a class="dropdown-item" href="{{route('phong.HuyPhong',['id'=>$k->thuePhong_id])}}">Hủy Đặt Cọc Phòng</a>
                                    @endif
                                    @if($k->trangthai_id==3)
                                    <a class="dropdown-item" onclick="modalDKDV( {{ $k->thuePhong_id }} )">Đăng Ký Dịch Vụ </a>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <h2 class="mb-0">
                            <span> <b>{{$k->name}} </b></span>
                        </h2>
                        <h4 class="mb-0">
                            <span> <b>{{$k->Lau}} </b></span>
                        </h4>
                        <h4 class="mb-0">
                            <span> <b>{{$k->loaiP}} </b></span>
                        </h4>
                        <div class="chart-wrapper px-0" style="height:70px;visibility: hidden" height="70">
                            <canvas id="widgetChart1"></canvas>
                        </div>
                    </div>
                    @php
                    $date1=date_create($k->NgayDen);
                    $date2=date_create($k->NgayDi);
                    @endphp
                    <h4 class="mb-0">
                        <i class='far fa-calendar-check'></i>
                        <span> <b>{{ date_format($date1,"d:m:Y h:i a")}}</b></span>
                    </h4>
                    <h4 class="mb-0">
                        <i class='fas fa-calendar-minus'></i>
                        <span> <b>{{ date_format($date2,"d:m:Y h:i a")}}</b></span>
                    </h4>
                </div>
            </div>
            @endforeach
            <!--Thanh toán tiền phòng -->

            <div class="container">
                <!-- Modal -->
                <div class="modal fade" id="myModal" role="dialog">
                    <div class="modal-dialog">
                        <!-- Modal content-->
                        <form action="{{route('phong.traPhong')}}" method="get">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">Thanh Toán Phòng</h4>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>
                                <div>
                                    <div class="col-sm-5">
                                        <div class="form-group">
                                            <label><b>Mã Hơp Đồng</b></label>
                                            <input type="text" name="MaHD1" id="MaHD1" class="form-control" readonly />
                                        </div>
                                        <div class="form-group">
                                            <label><b>Họ Tên KH</b></label>
                                            <input type="text" name="HoTenKH" id="HoTenKH" class="form-control" readonly />
                                        </div>
                                        <div class="form-group">
                                            <label><b>Ngày Đến</b></label>
                                            <input type="text" class="form-control " name="NgayDen1" id="NgayDen1" readonly />
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label><b>Tên Phòng</b></label>
                                            <input type="text" name="TenP" id="TenP" class="form-control" readonly />
                                        </div>
                                        <div class="form-group">
                                            <label><b>Loại Phòng</b></label>
                                            <input type="text" name="TenLP" id="TenLP" class="form-control" readonly />
                                        </div>
                                        <div class="form-group">
                                            <label><b>Ngày Đi</b></label>
                                            <input type="text" class="form-control" readonly name="NgayDi1" id="NgayDi1" />
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer"></div>
                                <div>
                                    <div class="col-sm-5">
                                        <div class="form-group">
                                            <label><b>Giá Phòng</b></label>
                                            <input type="text" name="GiaP" id="GiaP" class="form-control" readonly />
                                        </div>
                                        <div class="form-group">
                                            <label><b>Tổng Tiền Phòng</b></label>
                                            <input type="text" name="TTienP" id="TTienP" class="form-control" readonly />
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label><b>Số Dịch Vụ Đã Sử Dụng</b></label>
                                            <input type="text" name="SoLanDV" id="SoLanDV" class="form-control" readonly />
                                        </div>
                                        <div class="form-group">
                                            <label><b>Tiền Dịch Vụ Còn Nợ</b></label>
                                            <input type="text" name="TTienDV" id="TTienDV" class="form-control" readonly />
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary">Đặt Phòng</button>
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
            <!--Gia hạng phòng-->
            <div class="container">
                <!-- Modal -->
                <div class="modal fade" id="ModalGH" role="dialog">
                    <div class="modal-dialog">
                        <!-- Modal content-->
                        <form action="{{route('phong.giaHPhong')}}" method="get">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">Gia Hạng Phòng</h4>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>
                                <div>
                                    <div class="col-sm-5">
                                        <div class="form-group">
                                            <label><b>Mã Hơp Đồng</b></label>
                                            <input type="text" name="MaHD1" id="MaHDGH" class="form-control" readonly />
                                        </div>
                                        <div class="form-group">
                                            <label><b>Họ Tên KH</b></label>
                                            <input type="text" name="HoTenKH" id="HoTenKHGH" class="form-control" readonly />
                                        </div>
                                        <div class="form-group">
                                            <label><b>Ngày Đến</b></label>
                                            <input type="text" class="form-control " name="NgayDen1GH" id="NgayDen1GH" readonly />
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label><b>Tên Phòng</b></label>
                                            <input type="text" name="TenP" id="TenPGH" class="form-control" readonly />
                                        </div>
                                        <div class="form-group">
                                            <label><b>Loại Phòng</b></label>
                                            <input type="text" name="TenLP" id="TenLPGH" class="form-control" readonly />
                                        </div>
                                        <div class="form-group">
                                            <label><b>Ngày Đi</b></label>
                                            <input type="text" class="form-control piker" name="NgayDi1" id="pikerGH" />
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer"></div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary">Gia Hạng</button>
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
            <!--/Hiển thị thông tin -->

            <!--Đăng Ký Dịch Vụ--->
            <div class="container">
                <!-- Modal -->
                <div class="modal fade" id="myModalDV" role="dialog">
                    <div class="modal-dialog">
                        <!-- Modal content-->
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Dịch Vụ</h4>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-sm-5">
                                        <div class="form-group">
                                            <label><b>Mã Hợp Đồng:</b></label>
                                            <input type="text" id="MaHD" class="form-control" name="MaHD" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label for="country"><b>Số Lượng:</b></label>
                                            <input type="number" class="form-control" id="SL" name="SL" onkeyup="TongDV(this.value)" />
                                        </div>
                                        <div>
                                            <label for="country"><b>Phương Thức Thanh Toán:</b></label>
                                        </div>
                                        <div class="form-group">
                                            <input type="radio" name="thanhToan" value="0" id="thanhToan1" checked="checked" /><b>Trả Sau</b>
                                            <input type="radio" name="thanhToan" value="1" id="thanhToan2" /><b>Trả Trước</b>
                                        </div>
                                    </div>
                                    <div class="col-sm-2">
                                    </div>
                                    <div class="col-sm-5">
                                        <div class="form-group">
                                            <label for="country"><b>Tên Khách Hàng:</b></label>
                                            <input type="text" id="TenKH" class="form-control" name="TenKH" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label for="country"><b>Giá Tiền:</b></label>
                                            <input type="number" class="form-control" id="GiaT" name="GiaT" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label for="country"><b>Tổng Tiền:</b></label>
                                            <input type="number" class="form-control" id="TongTien" name="TongTien" readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <select class="js-example-basic-single" name="dichVu" id="dichVu" onchange="seachDV()" style="width:100%; margin-bottom: 10px;margin-top: 10px;">
                                        <option selected value="0"><b>Nhập Tên Dịch Vụ</b></option>
                                        @foreach($DichVu as $k)
                                        <option value="{{$k->id}}">{{$k->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <h5><b>Dịch Vụ Đã Sử Dụng</b></h5>
                                </div>
                                <table class="table table-bordered table-sm" id="tableDV"></table>
                            </div>
                            <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Đăng ký</button>
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <!--//Đăng Ký Dịch VỤ--->

            <!--Đăng Ký Phòng -->
            <div class="container">
                <div class="modal fade" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
                    <div class="modal-dialog oan">
                        <form action="{{route('phong.thuePhong')}}" method="get" enctype="multipart/form-data">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title" id="TenPhong"></h4>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>
                                <div>
                                    <div class="col-sm-5">
                                        <div class="form-group">
                                            <select class="js-example-basic-single" name="KhachHang" id="KhachHang" onchange="onSearch()" style="width:280px; margin-bottom: 10px;margin-top: 10px;">
                                                <option selected value="0"><b>Nhập Tên Khách Hàng</b></option>
                                                @foreach($KhachHang as $k)
                                                <option value="{{$k->id}}">{{$k->HoTen}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <input type="hidden" name="idKhachHang" value="0" id="id" />
                                        <input type="hidden" name="idPhong" id="idPhong" />
                                        <div class="form-group">
                                            <label><b>Họ Tên</b></label>
                                            <input type="text" name="HoTen" id="HoTen" class="form-control" placeholder="Tên Khách Hàng" required />
                                        </div>
                                        <div class="form-group">
                                            <label><b>Ngày Sinh</b></label>
                                            <input type="date" name="NgaySinh" id="NgaySinh" class="form-control" required />
                                        </div>
                                        <div class="form-group">
                                            <label><b>Giới Tính</b></label>
                                            <select name="GioTinh" id="GioTinh">
                                                <option selected><b>Chọn giới tính</b></option>
                                                <option value="Nam"><b>Nam</b></option>
                                                <option value="Nữ"><b>Nữ</b></option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label><b>Số CMND</b></label>
                                            <input type="number" name="CMND" id="CMND" class="form-control" placeholder="Số cmnd" required />
                                        </div>
                                        <div class="form-group">
                                            <label><b>Số Điện Thoại</b></label>
                                            <input type="number" name="SDT" id="SDT" class="form-control" placeholder="Số ĐT" required />
                                        </div>
                                        <div class="form-group">
                                            <label><b>Đại Chỉ</b></label>
                                            <input type="text" name="DiaChi" id="DiaChi" class="form-control" placeholder="Địa Chỉ" required />
                                        </div>
                                        <div class="form-group">
                                            <label><b>Email</b></label>
                                            <input type="text" name="email" id="email" class="form-control" placeholder="Email" required />
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label><b>Ngày Đến</b></label>
                                            <input type="text" class="form-control piker" name="NgayDen" id="piker1" />
                                        </div>
                                        <div class="form-group">
                                            <label><b>Ngày Đi</b></label>
                                            <input type="text" class="form-control piker" name="NgayDi" id="piker2" />
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary">Đặt Phòng</button>
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!--đặt phòng trước-->
            <div class="container">
                <div class="modal fade" id="myModalBooking" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
                    <div class="modal-dialog oan">
                        <form action="{{route('phong.DatCoPhong')}}" method="get" enctype="multipart/form-data">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title" id="TenPhong1"></h4>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>
                                <div>
                                    <div class="col-sm-5">
                                        <div class="form-group">
                                            <select class="js-example-basic-single" name="KhachHang1" id="KhachHang1" onchange="onSearch1()" style="width:280px; margin-bottom: 10px;margin-top: 10px;">
                                                <option selected value="0"><b>Nhập Tên Khách Hàng</b></option>
                                                @foreach($KhachHang as $k)
                                                <option value="{{$k->id}}">{{$k->HoTen}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <input type="hidden" name="idKhachHang" value="0" id="id1" />
                                        <input type="hidden" name="idPhong" id="idPhong1" />
                                        <div class="form-group">
                                            <label><b>Họ Tên</b></label>
                                            <input type="text" name="HoTen" id="HoTen1" class="form-control" placeholder="Tên Khách Hàng" required />
                                        </div>
                                        <div class="form-group">
                                            <label><b>Ngày Sinh</b></label>
                                            <input type="date" name="NgaySinh" id="NgaySinh1" class="form-control" required />
                                        </div>
                                        <div class="form-group">
                                            <label><b>Giới Tính</b></label>
                                            <select name="GioTinh" id="GioTinh1">
                                                <option selected><b>Chọn giới tính</b></option>
                                                <option value="Nam"><b>Nam</b></option>
                                                <option value="Nữ"><b>Nữ</b></option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label><b>Số CMND</b></label>
                                            <input type="number" name="CMND" id="CMND1" class="form-control" placeholder="Số cmnd" required />
                                        </div>
                                        <div class="form-group">
                                            <label><b>Số Điện Thoại</b></label>
                                            <input type="number" name="SDT" id="SDT1" class="form-control" placeholder="Số ĐT" required />
                                        </div>
                                        <div class="form-group">
                                            <label><b>Đại Chỉ</b></label>
                                            <input type="text" name="DiaChi" id="DiaChi1" class="form-control" placeholder="Địa Chỉ" required />
                                        </div>
                                        <div class="form-group">
                                            <label><b>Email</b></label>
                                            <input type="text" name="email" id="email1" class="form-control" placeholder="Email" required />
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label><b>Ngày Đến</b></label>
                                            <input type="text" class="form-control piker" name="NgayDen" id="piker3" />
                                        </div>
                                        <div class="form-group">
                                            <label><b>Ngày Đi</b></label>
                                            <input type="text" class="form-control piker" name="NgayDi" id="piker4" />
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary">Đặt Phòng</button>
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection
    <script src='https://kit.fontawesome.com/a076d05399.js'></script>
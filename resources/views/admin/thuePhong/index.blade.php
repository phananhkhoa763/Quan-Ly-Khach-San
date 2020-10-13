@extends('admin.layouts.master')
@section('title','Hợp Đồng Thuê Phòng')
@section('header','Hợp Đồng Thuê Phòng')
@section('link')
<li class="active">Hợp Đồng Thuê Phòng</li>
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
<div class="col-sm-3">
</div>
<div class="col-xs-12 col-md-7 col-lg-12">
    <div class="panel panel-primary">
        <div class="panel-body">
            <div class="bootstrap-table">
                <table class="table table-dark table-striped">
                    <thead>
                        <tr class="bg-danger">
                            <th>STT</th>
                            <th>Mã HĐ</th>
                            <th>Tên KH</th>
                            <th>Ngày Đến</th>
                            <th>Ngày Đi</th>
                            <th style="width:20%">Tùy chọn</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                        $i=1;
                        @endphp
                        @foreach($thuephong as $k)
                        @php
                        $date1=date_create($k->NgayDen);
                        $date2=date_create($k->NgayDi);
                        @endphp
                        <tr>
                            <td><b>{{$i++}}</b></td>
                            <td><b>{{$k->id}}</b></td>
                            <td><b>{{$k->HoTen}}</b></td>
                            <td><b>{{ date_format($date1,"m-d-Y")}}</b></td>
                            <td><b>{{ date_format($date2,"m-d-Y")}}</b></td>
                            <td><a href="{{route('hopDong.chitet', ['id' => $k->id])}}" class="btn btn-warning"><span class="glyphicon glyphicon-edit"></span>Chi Tiết</a> </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="pagination-area" style="margin-left: 40%;">
                <ul class="pagination">
                    {{ $thuephong->links() }}
                </ul>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
</div>
</div>
<!--/.row-->
@endsection
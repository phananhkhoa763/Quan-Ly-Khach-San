@extends('admin.layouts.master')
@section('title','Quản Lý Dịch Vụ')
@section('header','Quản Lý Dịch Vụ')
@section('link')
<li class="active">Quản Lý Dịch Vụ</li>
@endsection
@section('content')
<div class="col-xs-12 col-md-7 col-lg-12">
    <div class="panel panel-primary">
        <a href="{{route('DichVu.create')}}" class="btn btn-success"><span></span> Thêm Mới</a>
        <div class="panel-body">
            <div class="bootstrap-table">
                <table class="table table-dark table-striped">
                    <thead>
                        <tr class="bg-danger">
                            <th>STT</th>
                            <th>Tên</th>
                            <th>Giá</th>
                            <th style="width:20%">Tùy chọn</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                        $i=1;
                        @endphp
                        @foreach($dichvus as $k)
                        <tr>
                            <td><b>{{$i++}}</b></td>
                            <td><b>{{$k->name}}</b></td>
                            <td><b>{{$k->Gia}}$</b></td>
                            <td>
                                <a href="{{route('DichVu.edit', ['id' => $k->id])}}" class="btn btn-warning"><span class="glyphicon glyphicon-edit"></span> Sửa</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="pagination-area" style="margin-left: 40%;">
                <ul class="pagination">
                    {{ $dichvus->links() }}
                </ul>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
</div>
</div>
<!--/.row-->



@endsection
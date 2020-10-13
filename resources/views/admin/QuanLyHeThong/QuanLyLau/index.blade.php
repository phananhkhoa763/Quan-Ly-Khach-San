@extends('admin.layouts.master')
@section('title','Quản Lý Lầu')
@section('header','Quản Lý Lầu')
@section('link')
<li class="active">Quản Lý Lầu</li>
@endsection
@section('content')
<div class="col-xs-12 col-md-7 col-lg-12">
    <div class="panel panel-primary">
        <a href="{{route('lau.create')}}" class="btn btn-success"><span></span> Thêm Mới</a>
        <div class="panel-body">
            <div class="bootstrap-table">
                <table class="table table-dark table-striped">
                    <thead>
                        <tr class="bg-danger">
                            <th>Tên Lầu</th>
                            <th style="width:30%">Tùy chọn</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($Lau as $k)
                        <tr>
                            <td><b>{{$k->name}}</b></td>
                            <td>
                                <a href="{{route('lau.edit', ['id' => $k->id])}}"  class="btn btn-warning"><span class="glyphicon glyphicon-edit"></span> Sửa</a>
                                <a href="{{route('lau.destroy', ['id' => $k->id])}}" onclick="return confirm('Bạn có chắc chắn muốn xóa?')" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> Xóa</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="pagination-area" style="margin-left: 40%;">
                <ul class="pagination">
                    {{ $Lau->links() }}
                </ul>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
</div>
</div>
<!--/.row-->



@endsection
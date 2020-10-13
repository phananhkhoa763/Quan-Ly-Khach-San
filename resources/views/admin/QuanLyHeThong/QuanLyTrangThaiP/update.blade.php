@extends('admin.layouts.master')
@section('title','Update Trạng Thái')
@section('header','Update Trạng Thái')
@section('link')
    <li class="active">Update Trạng Thái</li>
@endsection
@section('content')
<form action="{{route('TrangThai.update', ['id' => $trangThai->id])}}" method="POST">
    @csrf
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header"><strong>Update</strong>
            <div class="card-body card-block" style="width:50%">
                <div class="form-group"><label class=" col-12 col-md-9"></label><input type="text" name="name" placeholder="Tên Phòng" value="{{$trangThai->name}}" class="form-control"></div>
</div>
    <div class="card-footer">
        <button type="submit" class="btn btn-primary btn-sm">
            <i class="fa fa-dot-circle-o"></i> update
        </button>
        <button type="reset" class="btn btn-danger btn-sm">
            <i class="fa fa-ban"></i> Reset
        </button>
    </div>
</form>
    
@endsection
@extends('admin.layouts.master')
@section('title','Thêm mới lầu')
@section('header','Thêm mới lầu')
@section('link')
    <li class="active">Thêm Mới Lầu</li>
@endsection
@section('content')
<form action="{{route('lau.store')}}" method="POST">
    @csrf
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header"><strong>Thêm Mới</strong>
            <div class="card-body card-block" style="width:50%">
                <div class="form-group"><label class=" col-12 col-md-9"></label><input type="text" name="name" placeholder="Tên Lầu" value="" class="form-control"></div>
                
                
</div>
    <div class="card-footer">
        <button type="submit" class="btn btn-primary btn-sm">
            <i class="fa fa-dot-circle-o"></i> Thêm mới
        </button>
        <button type="reset" class="btn btn-danger btn-sm">
            <i class="fa fa-ban"></i> Reset
        </button>
    </div>
</form>
    
@endsection
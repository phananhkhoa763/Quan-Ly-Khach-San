@extends('admin.layouts.master')
@section('title','Quản Lý Phòng')
@section('header','Quản Lý Phòng')
@section('link')
    <li class="active">Quản Lý Phòng</li>
@endsection
@section('content')
<form action="" method="POST">
    @csrf
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header"><strong>Update</strong>
            <div class="card-body card-block" style="width:50%">
                <div class="form-group"><label class=" col-12 col-md-9"></label><input type="text" name="name" placeholder="Tên Phòng" value="" class="form-control"></div>
                <div class="row form-group">
                    <div class="col-12 col-md-9">
                        <select name="select" id="select" class="form-control">
                            <option value="0">Lầu</option>
                            @foreach($Lau as $k)
                                <option value="{{$k->id}}">{{$k->name}}</option>
                            @endforeach         
                        </select>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-12 col-md-9">
                        <select name="select" id="select" class="form-control">
                            <option value="0">Loại Phòng</option>
                            @foreach($LoaiP as $h)
                                <option value="{{$h->id}}">{{$h->name}}</option>
                            @endforeach 
                        </select>
                    </div>
                </div>
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
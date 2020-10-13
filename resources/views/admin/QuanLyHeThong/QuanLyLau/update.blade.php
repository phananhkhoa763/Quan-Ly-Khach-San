@extends('admin.layouts.master')
@section('title','Update Lầu')
@section('header','Update Lầu')
@section('link')
    <li class="active">Update Lầu</li>
@endsection
@section('content')
<form action="{{route('lau.update', ['id' => $Lau->id])}}" method="POST">
    @csrf
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header"><strong>Update</strong>
            <div class="card-body card-block" style="width:50%">
                <div class="form-group"><label class=" col-12 col-md-9"></label><input type="text" name="name" placeholder="Tên Phòng" value="{{$Lau->name}}" class="form-control"></div>
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
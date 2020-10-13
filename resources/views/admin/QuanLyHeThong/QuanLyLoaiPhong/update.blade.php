@extends('admin.layouts.master')
@section('title','Update Loại Phòng')
@section('header','Update Loại Phòng')
@section('link')
<li class="active">Update Loại Phòng</li>
@endsection
@section('content')
<form action="{{route('LoaiPhong.update', ['id' => $LoaiPhong->id])}}" method="POST">
    @csrf
    <div class="col-lg-12">
        <div class="card">
            <div class="col-sm-7">
                <div class="card-header"><strong>Update</strong>
                    <div class="card-body card-block">
                        <label>Tên Loại Phòng</label>
                        <div class="form-group"><label class=" col-12 col-md-9"></label><input type="text" name="name" value="{{$LoaiPhong->name}}" class="form-control"></div>
                    </div>
                    <div class="form-group">
                        <label>Giá Phòng</label>
                        <input type="number" name="gia" class="form-control" value="{{$LoaiPhong->gia}}" required />
                    </div>

                    <div class="form-group">
                        <label>Miêu tả</label>
                        <textarea required class="ckeditor" value="{{$LoaiPhong->chitiet}}" name="chitiet"></textarea>
                    </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary btn-sm">
                            <i class="fa fa-dot-circle-o"></i> update
                        </button>
                        <button type="reset" class="btn btn-danger btn-sm">
                            <i class="fa fa-ban"></i> Reset
                        </button>
                    </div>
                </div>
</form>

@endsection
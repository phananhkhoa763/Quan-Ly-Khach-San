@extends('admin.layouts.master')
@section('title','Add Phòng')
@section('header','Add Phòng')
@section('link')
<li class="active">Add Phòng</li>
@endsection
@section('content')
<form action="{{route('LoaiPhong.store')}}" method="post" enctype="multipart/form-data">
    @csrf
    <div>
        <div class="col-sm-7">
            <div class="form-group">
                <label>Tên Loại Phòng</label>
                <input type="text" name="name" class="form-control" value="{{old('name')}}" placeholder="Loại Phòng" required />
            </div>
            <div class="form-group">
                <label>Giá Phòng</label>
                <input type="number" name="gia" class="form-control" value="{{old('gia')}}" placeholder="Giá" required />
            </div>
            <div class="form-group">
                <label>Miêu tả</label>
                <textarea name="chitiet" class="form-control " id="editor1"></textarea>
            </div>
            <input type="submit" name="submit" value="Thêm mới" class="btn btn-primary" />

        </div>
    </div>
</form>
@endsection
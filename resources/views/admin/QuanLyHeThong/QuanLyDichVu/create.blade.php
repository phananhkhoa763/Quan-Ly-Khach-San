@extends('admin.layouts.master')
@section('title','Thêm Dịch VỤ')
@section('header','Thêm Dịch VỤ')
@section('link')
<li class="active">Thêm Dịch VỤ</li>
@endsection
@section('content')
<form action="{{route('DichVu.store')}}" method="post" enctype="multipart/form-data">
    @csrf
    <div>
        <div class="col-sm-7">
            <div class="form-group">
                <label>Tên Dịch Vụ</label>
                <input type="text" name="name" class="form-control" placeholder="Tên Dịch Vụ" required />
            </div>
            <div class="form-group">
                <label>Giá Dịch VỤ</label>
                <input type="number" name="Gia" class="form-control"  placeholder="Giá" required />
            </div>
            <input type="submit" name="submit" value="Thêm mới" class="btn btn-primary" />

        </div>
    </div>
</form>
@endsection
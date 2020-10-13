@extends('admin.layouts.master')
@section('title','Update Dịch VỤ')
@section('header','Update Dịch VỤ')
@section('link')
<li class="active">Update Dịch VỤ</li>
@endsection
@section('content')
<form action="{{route('DichVu.update', ['id' => $dichVu->id])}}" method="post" enctype="multipart/form-data">
    @csrf
    <div>
        <div class="col-sm-7">
            <div class="form-group">
                <label>Tên Dịch Vụ</label>
                <input type="text" name="name" value="{{$dichVu->name}}" class="form-control" placeholder="Tên Dịch Vụ" required />
            </div>
            <div class="form-group">
                <label>Giá Dịch VỤ</label>
                <input type="number" name="Gia" value="{{$dichVu->Gia}}" class="form-control"  placeholder="Giá" required />
            </div>
            <input type="submit" name="submit" value="Update" class="btn btn-primary" />

        </div>
    </div>
</form>
@endsection
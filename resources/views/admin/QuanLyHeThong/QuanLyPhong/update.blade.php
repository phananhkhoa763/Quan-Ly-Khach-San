@extends('admin.layouts.master')
@section('title','update Phòng')
@section('header','update Phòng')
@section('link')
<li class="active">update Phòng</li>
@endsection
@section('content')
<form action="{{route('QuanLyHeThong-Phong.update', ['id' => $Phong->id])}}" method="post" enctype="multipart/form-data">
	@csrf
	<div>
		<div class="col-sm-7">
			<div class="form-group">
				<label>Tên Phòng</label>
				<input type="text" name="name" class="form-control" value="{{$Phong->name}}" placeholder="Tên Phòng" required />
			</div>
			<div class="form-group">
				<label>Lầu</label>
				<select name="Lau" class="form-control" required>
					<option value="">Lầu</option>
					@foreach($Lau as $k)
					@if($Phong->lau_id == $k->id)
					<option value="{{old('Lau',$k->id)}}" selected>{{$k->name}}</option>
					@endif
					<option value="{{old('Lau',$k->id)}}" >{{$k->name}}</option>
					@endforeach
				</select>
			</div>
			<div class="form-group">
				<label>Loại Phòng</label>
				<select name="LoaiP" class="form-control" required>
					<option value="">Loại Phòng</option>
					@foreach($LoaiP as $h)
					@if($Phong->loaiphong_id == $h->id)
					<option value="{{old($h->id)}}" selected>{{$h->name}}</option>
					@endif
					<option value="{{old($h->id)}}" >{{$h->name}}</option>
					@endforeach
				</select>
			</div>
			<div class="form-group">
				<label>Images</label>
				<input type="file" name="img[]" multiple class="form-control ">
			</div>
			<input type="submit" name="submit" value="Thêm mới" class="btn btn-primary" />
		</div>
	</div>
	<div class="col-md-4">
		@foreach($phongimage as $k)
		<div class="form-group">
			<img class="media-object" width="250px" src="{{asset('update/img/phong_img')}}/{{$k->images}}" alt="">
			<input type='checkbox' name='imgDelete[]' value="{{$k->id}}"><br>
		</div>
		@endforeach
	</div>
</form>
@endsection
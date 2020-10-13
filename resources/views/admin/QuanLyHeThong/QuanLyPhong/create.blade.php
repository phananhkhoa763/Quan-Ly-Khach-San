@extends('admin.layouts.master')
@section('title','Add Phòng')
@section('header','Add Phòng')
@section('link')
    <li class="active">Add Phòng</li>
@endsection
@section('content')
<form action="{{route('QuanLyHeThong-Phong.store')}}" method="post" enctype="multipart/form-data">
@csrf
	<div >
    	<div class="col-sm-7">
            	<div class="form-group">
                	<label>Tên Phòng</label>
                    <input type="text" name="name" class="form-control" value="{{old('name')}}" placeholder="Tên Phòng" required />
                </div>
                <div class="form-group">
                	<label>Lầu</label>
                    <select name="Lau" class="form-control" required>
							<option value="" >Lầu</option>
                    	@foreach($Lau as $k)
                            <option value="{{old('Lau',$k->id)}}">{{$k->name}}</option>
                        @endforeach 
                    </select>
                </div>
				<div class="form-group">
                	<label>Loại Phòng</label>
                    <select name="LoaiP" class="form-control" required>
						<option value="" >Loại Phòng</option>
                    	@foreach($LoaiP as $h)
                                <option value="{{old('Lau',$h->id)}}">{{$h->name}}</option>
                        @endforeach 
                    </select>
                </div>
                <input type="submit" name="submit" value="Thêm mới" class="btn btn-primary" />
            
        </div>
    </div>
	<div class="col-md-4">
		@for($i=1;$i<=6;$i++)
		<div class="form-group" >
			<label>Ảnh {{$i}}</label>
			<input  type="file" name="img[]" class="form-control hidden" >
		</div>
		@endfor
	</div>
</div>
</form>
@endsection
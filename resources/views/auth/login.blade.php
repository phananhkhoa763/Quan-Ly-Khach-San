@extends('auth.layouts.login')
@section('title','Khách Sạn PAK')
@section('content1')

<!-- Body -->
<body>

	<h1>KHÁCH SẠN PAK</h1>

	<div class="w3layoutscontaineragileits">
	<h2>Đăng Nhập</h2>
		<form method="POST" action="{{ route('login') }}">
			@csrf
			 <input type="email" id="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="EMAIL" required autocomplete="email" autofocus>
			  @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
               @enderror
			<input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="PASSWORD" required autocomplete="current-password">
			 @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
             @enderror
			<ul class="agileinfotickwthree">
				<li>
					 <input type="checkbox" name="remember" id="remember" value="{{ old('remember') ? 'checked' : '' }}">
					<label for="brand1"><span></span>Remember me</label>
					@if (Route::has('password.request'))
                        <a href="{{route('password.request')}}">Forgotten Password?</a>
                    @endif
				</li>
			</ul>
			<div class="aitssendbuttonw3ls">
				<input type="submit" value="LOGIN">
				<p> Tạo Tài Khoản Mới <span>→</span> <a class="w3_play_icon1" href="#small-dialog1"> Click Here</a></p>
				<div class="clear"></div>
			</div>
		</form>
	</div>
	
	<!-- for register popup -->
	<div id="small-dialog1" class="mfp-hide">
		<div class="contact-form1">
			<div class="contact-w3-agileits">
				<h3>Register Form</h3>
				 <form method="POST" action="{{ route('register') }}">
				 @csrf
						<div class="form-sub-w3ls">
							<input id="name" type="text" placeholder="User Name" class="form-control				@error('name') is-invalid @enderror" name="name" value="{{ old('name') }}"			required autocomplete="name" autofocus>
							 @error('name')
								<span class="invalid-feedback" role="alert">
									<strong>{{ $message }}</strong>
								</span>
							@enderror
							<div class="icon-agile">
								<i class="fa fa-user" aria-hidden="true"></i>
							</div>
						</div>
						<div class="form-sub-w3ls">
							<input id="email"  type="email" class="form-control @error('email') is-invalid			@enderror" placeholder="Email" name="email" value="{{ old('email') }}" required autocomplete="email">
							 @error('email')
								 <span class="invalid-feedback" role="alert">
									 <strong>{{ $message }}</strong>
								</span>
							 @enderror
							<div class="icon-agile">
								<i class="fa fa-envelope-o" aria-hidden="true"></i>
							</div>
						</div>
						<div class="form-sub-w3ls">
							<input id="password" type="password" class="form-control @error('password') is-invalid @enderror"  name="password" required autocomplete="new-password" placeholder="Password">
							@error('password')
								<span class="invalid-feedback" role="alert">
									<strong>{{ $message }}</strong>
								 </span>
							@enderror
							<div class="icon-agile">
								<i class="fa fa-unlock-alt" aria-hidden="true"></i>
							</div>
						</div>
						<div class="form-sub-w3ls">
							<input id="password-confirm" placeholder="Confirm Password" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
							<div class="icon-agile">
								<i class="fa fa-unlock-alt" aria-hidden="true"></i>
							</div>
						</div>
					<div class="login-check">
						 <label class="checkbox">
							<input type="checkbox" required> Agree the terms and policy
						</label>
					</div>
					<div class="submit-w3l">
						<input type="submit" value="Register">
					</div>
				</form>
			</div>
		</div>	
	</div>
	<!-- //for register popup -->
	
	<div class="w3footeragile">
		<p> &copy; 2017 Existing Login Form. All Rights Reserved | Design by <a href="http://w3layouts.com" target="_blank">W3layouts</a></p>
	</div>

	
	<script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>

	<!-- pop-up-box-js-file -->  
		<script src="js/jquery.magnific-popup.js" type="text/javascript"></script>
	<!--//pop-up-box-js-file -->
	<script>
		$(document).ready(function() {
		$('.w3_play_icon,.w3_play_icon1,.w3_play_icon2').magnificPopup({
			type: 'inline',
			fixedContentPos: false,
			fixedBgPos: true,
			overflowY: 'auto',
			closeBtnInside: true,
			preloader: false,
			midClick: true,
			removalDelay: 300,
			mainClass: 'my-mfp-zoom-in'
		});
																		
		});
	</script>

</body>

@endsection

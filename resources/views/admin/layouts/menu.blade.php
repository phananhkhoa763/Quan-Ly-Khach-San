<div id="main-menu" class="main-menu collapse navbar-collapse">
    <ul class="nav navbar-nav">
            <li>
				<a href="{{route('phong.index')}}"> <i class="menu-icon fa fa-home"></i>Quản Lý Phòng </a>
				<a href="{{route('khachHang.index')}}"> <i class="menu-icon fa fa-address-book-o"></i>Quản Lý Khách Hàng </a>
				<a href="{{route('hopDong.index')}}"> <i class="menu-icon fa fa-book"></i>Hộp Đồng Thuê Phòng</a>
				<a href="{{route('user.index')}}"> <i class="menu-icon fa fa-user"></i>Profile</a>
            </li>
        <li class="menu-item-has-children dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-cogs"></i>Quản Lý Hệ Thống</a>
            <ul class="sub-menu children dropdown-menu">
                <li><i class=""></i><a href="{{route('lau.index')}}">Quản Lý Lầu</a></li>
                <li><i class=""></i><a href="{{route('TrangThai.index')}}">Quản Lý Trạng Thái  </a></li>
				<li><i class=""></i><a href="{{route('QuanLyHeThong-Phong.index')}}">Quản Lý Phòng  </a></li>
				<li><i class=""></i><a href="{{route('LoaiPhong.index')}}">Quản Lý Loại Phòng</a></li>
				<li><i class=""></i><a href="{{route('DichVu.index')}}">Quản Lý Dịch Vụ</a></li>
            </ul>
        </li>
        <h3 class="menu-title">Extras</h3><!-- /.menu-title -->
        <li class="menu-item-has-children dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-glass"></i>Pages</a>
            <ul class="sub-menu children dropdown-menu">
                <li><i class="menu-icon fa fa-sign-in"></i><a href="{{route('login')}}">Login</a></li>
                <li><i class="menu-icon fa fa-sign-in"></i><a href="{{route('register')}}">Register</a></li>
                <li><i class="menu-icon fa fa-paper-plane"></i><a href="{{route('password.request')}}">Forget Pass</a></li>
            </ul>
        </li>
    </ul>
</div>
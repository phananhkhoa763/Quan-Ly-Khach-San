$("div.alert1").delay(5000).slideUp();
// load ảnh
function changeImg(input) {
	//Nếu như tồn thuộc tính file, đồng nghĩa người dùng đã chọn file mới
	if (input.files && input.files[0]) {
		var reader = new FileReader();
		//Sự kiện file đã được load vào website
		reader.onload = function (e) {
			//Thay đổi đường dẫn ảnh
			$('#avatar').attr('src', e.target.result);
		}
		reader.readAsDataURL(input.files[0]);
	}
}
$(document).ready(function () {
	$('#avatar').click(function () {
		$('#img').click();
	});
});

//select2
$(document).ready(function () {
	$('.js-example-basic-single').select2();


});

// modal Thanh toán tiền phòng 
function modalTT(a) {
	var idMaHD = a;
	var url = 'http://localhost:8080/Phong/thanhToanP';
	$.ajax({
		url: url,
		type: 'get',
		dataType: 'json',
		data: { 'idMaHD': idMaHD },
		success: function (data) {
			$('#myModal').addClass('show');
			$('#myModal').modal('show');
			var GiaP = data['1'].gia;
			var nf = new Intl.NumberFormat();
			document.getElementById("MaHD1").value = data['1'].id;
			document.getElementById("HoTenKH").value = data['1'].HoTen;
			document.getElementById("NgayDen1").value = data['2'].NgayDen;
			document.getElementById("TenP").value = data['1'].TenP;
			document.getElementById("TenLP").value = data['1'].TenLP;
			document.getElementById("NgayDi1").value = data['2'].NgayDi;
			document.getElementById("GiaP").value = nf.format(GiaP);
			document.getElementById("SoLanDV").value = data['3'];
			var NgayDen11 = new Date(data['1'].NgayDen);
			var NgayDi11 = new Date(data['1'].NgayDi);
			var NgayCL = parseInt((NgayDi11.getTime() - NgayDen11.getTime()) / (24 * 3600 * 1000));
			var GioCL = NgayDi11.getUTCHours() - NgayDen11.getUTCHours();
			if (GioCL <= 3) {
				var TTienP = ((NgayCL * 24) + GioCL) * data['1'].gia;
			} else {
				var TTienP = ((NgayCL * 24) + 24) * data['1'].gia;
			}
			document.getElementById("TTienP").value = nf.format(TTienP);
			var tongGiaDV = 0;
			data['4'].forEach(k => {
				var gia = k.Gia;
				var soLuong1 = k.soLuong;
				tongGiaDV += soLuong1 * gia;

			});
			document.getElementById("TTienDV").value = nf.format(tongGiaDV);
		}
	});
}
// Gia hạng Phòng
function modalGH(a) {
	var idMaHD = a;
	var url = 'http://localhost:8080/Phong/thanhToanP';
	$.ajax({
		url: url,
		type: 'get',
		dataType: 'json',
		data: { 'idMaHD': idMaHD },
		success: function (data) {
			$('#ModalGH').addClass('show');
			$('#ModalGH').modal('show');
			var GiaP = data['1'].gia;
			var nf = new Intl.NumberFormat();
			document.getElementById("MaHDGH").value = data['1'].id;
			document.getElementById("HoTenKHGH").value = data['1'].HoTen;
			document.getElementById("NgayDen1GH").value = data['2'].NgayDen;
			document.getElementById("TenPGH").value = data['1'].TenP;
			document.getElementById("TenLPGH").value = data['1'].TenLP;
			document.getElementById("pikerGH").value = data['2'].NgayDi;
		}
	});
}
// modal Đăng Ký Phòng
function modalDKP(a) {
	var id = a;
	$('#myModal1').addClass('show');
	$('#myModal1').modal('show');
	$('#TenPhong').text('Đăng Ký Phòng:' + id);
	document.getElementById("idPhong").value = id;
}
function modalBooking(a) {
	var id = a;
	$('#myModalBooking').addClass('show');
	$('#myModalBooking').modal('show');
	$('#TenPhong1').text('Đặt Cọc Phòng:' + id);
	document.getElementById("idPhong1").value = id;
}
//modal Dịch vụ
function modalDKDV(a) {
	var thuePhong_id = a;
	var url = 'http://localhost:8080/Phong/dichVu';
	$.ajax({
		url: url,
		type: 'get',
		dataType: 'json',
		data: { 'thuePhong_id': thuePhong_id },
		success: function (data) {
			$('#myModalDV').addClass('show');
			$('#myModalDV').modal('show');
			document.getElementById("MaHD").value = thuePhong_id;
			document.getElementById("TenKH").value = data['1'].HoTen;
			var table = "<thead class='thead-dark'><tr><th>STT</th><th>Tên Dịch Vụ</th><th>Số Lương</th><th>Đơn Giá</th><th>Tổng</th></tr></thead>";
			var i = 0;
			data['2'].forEach(k => {
				i++
				var tongGia = k.soLuong * k.GiaDV;
				table +=
					"<tr><td>" + i + "</td><td>" + k.TenDV + "</td><td>" + k.soLuong + "</td><td>" + k.GiaDV + "</td><td>" + tongGia + "</td></tr>";
			});
			document.getElementById("tableDV").innerHTML = table;
		}
	});
}

// tìm kiếm danh sách khách hàng
function onSearch() {
	var idKhachHang = document.getElementById("KhachHang").value;
	var url = 'http://localhost:8080/Phong/select2';
	$.ajax({
		url: url,
		type: 'get',
		dataType: 'json',
		data: { 'idKhachHang': idKhachHang },
		success: function (data) {
			document.getElementById("HoTen").value = data.HoTen;
			document.getElementById("NgaySinh").value = data.NgaySinh;
			document.getElementById("GioTinh").value = data.GioTinh;
			document.getElementById("CMND").value = data.CMND;
			document.getElementById("SDT").value = data.SDT;
			document.getElementById("DiaChi").value = data.DiaChi;
			document.getElementById("email").value = data.email;
			document.getElementById("id").value = data.id;

		}
	});
}
function onSearch1() {
	var idKhachHang = document.getElementById("KhachHang1").value;
	var url = 'http://localhost:8080/Phong/select2';
	$.ajax({
		url: url,
		type: 'get',
		dataType: 'json',
		data: { 'idKhachHang': idKhachHang },
		success: function (data) {
			document.getElementById("HoTen1").value = data.HoTen;
			document.getElementById("NgaySinh1").value = data.NgaySinh;
			document.getElementById("CMND1").value = data.CMND;
			document.getElementById("SDT1").value = data.SDT;
			document.getElementById("DiaChi1").value = data.DiaChi;
			document.getElementById("email1").value = data.email;
			document.getElementById("id1").value = data.id;
			document.getElementById("GioTinh1").value = data.GioTinh;

		}
	});
}

$('#piker1').datetimepicker({ footer: true, modal: true, });
$('#piker2').datetimepicker({ footer: true, modal: true, });
$('#piker3').datetimepicker({ footer: true, modal: true, });
$('#piker4').datetimepicker({ footer: true, modal: true, });
$('#pikerGH').datetimepicker({ footer: true, modal: true, });
// sử lý sau khi chọn dịch vụ 
function seachDV(abc) {
	console.log(abc)
	var idDichVu = document.getElementById("dichVu").value;
	var idMaHD = document.getElementById("MaHD").value;
	var url = 'http://localhost:8080/Phong/seachDV';
	$.ajax({
		url: url,
		type: 'get',
		dataType: 'json',
		data: { 'idDichVu': idDichVu, 'idMaHD': idMaHD },
		success: function (data) {
			document.getElementById("GiaT").value = data['1'].Gia;
			document.getElementById("TongTien").value = data['1'].Gia;
			document.getElementById("SL").value = '1';
			var table = "<thead class='thead-dark'><tr><th>STT</th><th>Tên Dịch Vụ</th><th>Số Lương</th><th>Đơn Giá</th><th>Tổng</th></tr></thead>";
			var i = 0;
			data['2'].forEach(k => {
				i++
				var tongGia = k.soLuong * k.GiaDV;
				table +=
					"<tr><td>" + i + "</td><td>" + k.TenDV + "</td><td>" + k.soLuong + "</td><td>" + k.GiaDV + "</td><td>" + tongGia + "</td></tr>";
			});
			document.getElementById("tableDV").innerHTML = table;

		}
	});

}
// tông tiền DV
function TongDV(a) {
	var tienDV = document.getElementById("GiaT").value;
	var tongTienDV = a * tienDV;
	if (a > 0) {
		document.getElementById("TongTien").value = tongTienDV;
	}

}


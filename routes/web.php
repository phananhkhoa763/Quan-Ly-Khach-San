<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


use App\User;

Route::get('/', 'Auth\LoginController@showLoginForm')->name('admin.login');
Route::get('user', function () {
    return view('admin.thuePhong.chitiet');
});
Auth::routes();

Route::get('dashboard', 'HomeController@index')->name('dashboard');

Route::group(['prefix' => 'user'], function () {
    Route::get('index', 'AdminController@index')->name('user.index');
    Route::post('update/{id}', 'AdminController@update')->name('user.update');
});
Route::group(['prefix' => 'hopDong'], function () {
    Route::get('index', 'QuanLyThuePhong\ThuePhongController@index')->name('hopDong.index');
    Route::get('chitet/{id}', 'QuanLyThuePhong\ThuePhongController@chitet')->name('hopDong.chitet');
    Route::get('index/seach', 'QuanLyThuePhong\ThuePhongController@seach')->name('hopDong.seach');
});
Route::group(['prefix' => 'Phong'], function () {
    Route::get('index', 'QuanLyPhong\PhongController@index')->name('phong.index');
    Route::get('thuePhong', 'QuanLyPhong\PhongController@thuePhong')->name('phong.thuePhong');
    Route::get('DatCoPhong', 'QuanLyPhong\PhongController@DatCoPhong')->name('phong.DatCoPhong');
    Route::get('HuyPhong/{id}', 'QuanLyPhong\PhongController@HuyPhong')->name('phong.HuyPhong');
    Route::get('thuePhong1/{id}', 'QuanLyPhong\PhongController@thuePhong1')->name('phong.thuePhong1');
    Route::get('traPhong', 'QuanLyPhong\PhongController@traPhong')->name('phong.traPhong');
    Route::get('giaHPhong', 'QuanLyPhong\PhongController@giaHPhong')->name('phong.giaHPhong');
    // select2
    Route::get('select2', 'QuanLyPhong\PhongController@select2')->name('phong.KhachHang');
    // Sử lý chọn mã phòng và khách hàng cần sử dụng dịch vụ
    Route::get('dichVu', 'QuanLyPhong\PhongController@dichVu')->name('phong.dichVu');
    // sử lý giá sau khi chọn dịch vụ
    Route::get('seachDV', 'QuanLyPhong\PhongController@seachDV')->name('phong.seachDV');
    // sử lý thanh toán phòng
    Route::get('thanhToanP', 'QuanLyPhong\PhongController@thanhToanP')->name('phong.thanhToanP');
});
Route::group(['prefix' => 'KhachHang'], function () {
    Route::get('index', 'QuanLyKhachHang\KhachHangController@index')->name('khachHang.index');
    Route::get('create', 'QuanLyKhachHang\KhachHangController@create')->name('khachHang.create');
    Route::post('store', 'QuanLyKhachHang\KhachHangController@store')->name('khachHang.store');
    Route::get('edit/{id}', 'QuanLyKhachHang\KhachHangController@edit')->name('khachHang.edit');
    Route::post('update/{id}', 'QuanLyKhachHang\KhachHangController@update')->name('khachHang.update');
    Route::get('index/search', 'QuanLyKhachHang\KhachHangController@search')->name('khachHang.search');
});

/* 
            Quản lý Hệ thống
        */
Route::group(['prefix' => 'Lau'], function () {
    Route::get('index', 'QuanLyHeThong\QuanLyLauController@index')->name('lau.index');
    Route::get('create', 'QuanLyHeThong\QuanLyLauController@create')->name('lau.create');
    Route::post('store', 'QuanLyHeThong\QuanLyLauController@store')->name('lau.store');
    Route::get('edit/{id}', 'QuanLyHeThong\QuanLyLauController@edit')->name('lau.edit');
    Route::post('update/{id}', 'QuanLyHeThong\QuanLyLauController@update')->name('lau.update');
    Route::get('destroy/{id}', 'QuanLyHeThong\QuanLyLauController@destroy')->name('lau.destroy');
});
Route::group(['prefix' => 'TrangThai'], function () {
    Route::get('index', 'QuanLyHeThong\QuanLyTrangThaiController@index')->name('TrangThai.index');
    Route::get('create', 'QuanLyHeThong\QuanLyTrangThaiController@create')->name('TrangThai.create');
    Route::post('store', 'QuanLyHeThong\QuanLyTrangThaiController@store')->name('TrangThai.store');
    Route::get('edit/{id}', 'QuanLyHeThong\QuanLyTrangThaiController@edit')->name('TrangThai.edit');
    Route::post('update/{id}', 'QuanLyHeThong\QuanLyTrangThaiController@update')->name('TrangThai.update');
    Route::get('destroy/{id}', 'QuanLyHeThong\QuanLyTrangThaiController@destroy')->name('TrangThai.destroy');
});
Route::group(['prefix' => 'QuanLyHeThong-Phong'], function () {
    Route::get('index', 'QuanLyHeThong\PhongController@index')->name('QuanLyHeThong-Phong.index');
    Route::get('create', 'QuanLyHeThong\PhongController@create')->name('QuanLyHeThong-Phong.create');
    Route::post('store', 'QuanLyHeThong\PhongController@store')->name('QuanLyHeThong-Phong.store');
    Route::get('edit/{id}', 'QuanLyHeThong\PhongController@edit')->name('QuanLyHeThong-Phong.edit');
    Route::post('update/{id}', 'QuanLyHeThong\PhongController@update')->name('QuanLyHeThong-Phong.update');
    Route::get('destroy/{id}', 'QuanLyHeThong\PhongController@destroy')->name('QuanLyHeThong-Phong.destroy');
});
Route::group(['prefix' => 'LoaiPhong'], function () {
    Route::get('index', 'QuanLyHeThong\LoaiPhongConTroller@index')->name('LoaiPhong.index');
    Route::get('create', 'QuanLyHeThong\LoaiPhongConTroller@create')->name('LoaiPhong.create');
    Route::post('store', 'QuanLyHeThong\LoaiPhongConTroller@store')->name('LoaiPhong.store');
    Route::get('edit/{id}', 'QuanLyHeThong\LoaiPhongConTroller@edit')->name('LoaiPhong.edit');
    Route::post('update/{id}', 'QuanLyHeThong\LoaiPhongConTroller@update')->name('LoaiPhong.update');
    Route::get('destroy/{id}', 'QuanLyHeThong\LoaiPhongConTroller@destroy')->name('LoaiPhong.destroy');
});
Route::group(['prefix' => 'DichVu'], function () {
    Route::get('index', 'QuanLyHeThong\DichVuCotroller@index')->name('DichVu.index');
    Route::get('create', 'QuanLyHeThong\DichVuCotroller@create')->name('DichVu.create');
    Route::post('store', 'QuanLyHeThong\DichVuCotroller@store')->name('DichVu.store');
    Route::get('edit/{id}', 'QuanLyHeThong\DichVuCotroller@edit')->name('DichVu.edit');
    Route::post('update/{id}', 'QuanLyHeThong\DichVuCotroller@update')->name('DichVu.update');
});

<?php

namespace App\Http\Controllers\QuanLyKhachHang;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\KhachHang;
use DateTime;


class KhachHangController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['khachhang'] = DB::table('khachhang')->paginate(4);
        return view('admin.NghiepVu.QuanLyKhachHang.index', $data);
    }
    public function create()
    {
        return view('admin.NghiepVu.QuanLyKhachHang.create');
    }
    public function store(Request $request)
    {
        $NgaySinh = new DateTime($request->NgaySinh);
        $KhachHang = new KhachHang();
        $KhachHang->HoTen = $request->HoTen;
        $KhachHang->NgaySinh = $NgaySinh->format('Y-m-d');
        $KhachHang->GioTinh = $request->GioTinh;
        $KhachHang->CMND = $request->CMND;
        $KhachHang->SDT = $request->SDT;
        $KhachHang->DiaChi = $request->DiaChi;
        $KhachHang->email = $request->email;
        if ($KhachHang->save()) {
            return redirect()->route('khachHang.index')->with('thongbao', 'Thêm thành công');
        } else {
            return redirect()->route('khachHang.index')->with('thongbao', 'Thêm Mới Khách hàng không thành công');
        }
    }
    public function edit($id)
    {
        $data['KhachHang'] = KhachHang::find($id);
        return view('admin.NghiepVu.QuanLyKhachHang.update', $data);
    }
    public function search(Request $request)
    {
        $data['khachhang'] = DB::table('khachhang')
            ->where('khachhang.HoTen', 'like', '%' . $request->name . '%')
            ->paginate(4);
        return view('admin.NghiepVu.QuanLyKhachHang.index', $data);
    }
    public function update(Request $request, $id)
    {
        $NgaySinh = new DateTime($request->NgaySinh);
        $KhachHang =  KhachHang::find($id);
        $KhachHang->HoTen = $request->HoTen;
        $KhachHang->NgaySinh = $NgaySinh->format('Y-m-d');
        $KhachHang->GioTinh = $request->GioTinh;
        $KhachHang->CMND = $request->CMND;
        $KhachHang->SDT = $request->SDT;
        $KhachHang->DiaChi = $request->DiaChi;
        $KhachHang->email = $request->email;
        if ($KhachHang->save()) {
            return redirect()->route('khachHang.index')->with('thongbao', 'update thành công');
        } else {
            return redirect()->route('khachHang.index')->with('thongbao', 'update Khách hàng không thành công');
        }
    }
}

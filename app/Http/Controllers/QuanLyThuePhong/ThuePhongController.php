<?php

namespace App\Http\Controllers\QuanLyThuePhong;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\phong;
use App\KhachHang;
use App\loaiPhong;
use App\ThuePhong;
use App\dichVu;


class ThuePhongController extends Controller
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
        $data['thuephong'] = DB::table('thuephong')
            ->leftjoin('khachhang', 'thuephong.KhachHang_id', '=', 'khachhang.id')
            ->select('thuephong.*', 'khachhang.HoTen as HoTen')
            ->paginate(3);
        return view('admin.thuePhong.index', $data);
    }
    public function seach(Request $request)
    {
        $data['thuephong'] = DB::table('thuephong')
            ->leftjoin('khachhang', 'thuephong.KhachHang_id', '=', 'khachhang.id')
            ->select('thuephong.*', 'khachhang.HoTen as HoTen')
            ->where('khachhang.HoTen', 'like', '%' . $request->name . '%')
            ->paginate(3);
        return view('admin.thuePhong.index', $data);
    }
    public function chitet($id)
    {
        $data = ThuePhong::find($id);
        $khachHang_id = $data->KhachHang_id;
        $Phong_id = $data->Phong_id;
        $khachHang = KhachHang::find($khachHang_id);
        $Phong = phong::find($Phong_id);
        $loaiphong_id = $Phong->loaiphong_id;
        $loaiPhong = loaiPhong::find($loaiphong_id);
        $array = array(
            "id" => $data->id,
            "HoTen" => $khachHang->HoTen,
            "NgayDen" => $data->NgayDen,
            "TenP" => $Phong->name,
            "TenLP" => $loaiPhong->name,
            "NgayDi" => $data->NgayDi,
            "gia" => $loaiPhong->gia,
        );
        $array1 =  DB::table('su_dung_dich_vus')
            ->leftjoin('dichvus', 'su_dung_dich_vus.dichVu_id', '=', 'dichvus.id')
            ->select('su_dung_dich_vus.*', 'dichvus.name as TenDV', 'dichvus.Gia as GiaDV')
            ->where('thuePhong_id', $id)
            ->get();
        return view('admin.thuePhong.chitiet', compact('array', 'array1'));
    }
}

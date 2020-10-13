<?php

namespace App\Http\Controllers\QuanLyPhong;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\phong;
use App\KhachHang;
use App\loaiPhong;
use App\ThuePhong;
use App\dichVu;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Carbon\Carbon;
use DateTime;
use Symfony\Component\HttpKernel\DataCollector\AjaxDataCollector;

class PhongController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $now = Carbon::now();
        $data['Phong'] = DB::table('phongs')
            ->leftjoin('laus', 'phongs.lau_id', '=', 'laus.id')
            ->leftjoin('loaiphongs', 'phongs.loaiphong_id', '=', 'loaiphongs.id')
            ->leftjoin('trangthais', 'phongs.trangthai_id', '=', 'trangthais.id')
            ->leftJoin('thuephong', function ($join) {
                $join->on('phongs.id', '=', 'thuephong.Phong_id')->where('thuephong.ThanhToan', '=', '0')->Where('booking', '!=', '2');
            })
            ->select('phongs.*', 'loaiphongs.name as loaiP', 'thuephong.booking as booking', 'thuephong.id as thuePhong_id', 'thuephong.NgayDi as NgayDi', 'thuephong.NgayDen as NgayDen', 'laus.name as Lau', 'trangthais.name as TrangTh')
            ->orderBy('phongs.id')
            ->get();
        $NgayHT = new DateTime($now);
        $data['SoSanhNgay'] = ThuePhong::where('NgayDi', '<=', $NgayHT->format('Y-m-d H:i:s'))->Where('ThanhToan', '=', '0')->get();
        if (count($data['SoSanhNgay']) >= 1) {
            foreach ($data['SoSanhNgay'] as $k) {
                $id = $k->Phong_id;
                $Phong = phong::find($id);
                $Phong->trangthai_id = 4;
                $Phong->save();
            }
        }

        $data['PhongT'] = DB::table('phongs')
            ->leftjoin('trangthais', 'phongs.trangthai_id', '=', 'trangthais.id')
            ->where('trangthai_id', '1')
            ->count();
        $data['PhongDO'] = DB::table('phongs')
            ->leftjoin('trangthais', 'phongs.trangthai_id', '=', 'trangthais.id')
            ->where('trangthai_id', '3')
            ->count();
        $data['PhongCK'] = DB::table('phongs')
            ->leftjoin('trangthais', 'phongs.trangthai_id', '=', 'trangthais.id')
            ->where('trangthai_id', '2')
            ->count();
        $data['PhongHH'] = DB::table('phongs')
            ->leftjoin('trangthais', 'phongs.trangthai_id', '=', 'trangthais.id')
            ->where('trangthai_id', '4')
            ->count();
        $data['DichVu'] = DB::table('dichvus')->get();
        $data['KhachHang'] = DB::table('khachhang')->get();
        return view('admin.NghiepVu.QuanLyPhong.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['Lau'] = DB::table('laus')->get();
        $data['LoaiP'] = DB::table('loaiphongs')->get();
        return view('admin.NghiepVu.QuanLyPhong.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function select2()
    {
        $id = isset($_GET['idKhachHang']) ? (int) $_GET['idKhachHang'] : false;
        $data = KhachHang::find($id);
        $array = array(
            "HoTen" => $data->HoTen,
            "NgaySinh" =>  $data->NgaySinh,
            "GioTinh" =>  $data->GioTinh,
            "CMND" =>  $data->CMND,
            "SDT" =>  $data->SDT,
            "DiaChi" =>  $data->DiaChi,
            "email" =>  $data->email,
            "id" =>  $data->id
        );

        die(json_encode($array));
    }
    //Sử lý chọn mã phòng và khách hàng cần sử dụng dịch vụ
    public function dichVu()
    {
        $thuePhong_id = isset($_GET['thuePhong_id']) ? (int) $_GET['thuePhong_id'] : false;
        $data = ThuePhong::find($thuePhong_id);
        $khachHang_id = $data->KhachHang_id;
        $khachHang = KhachHang::find($khachHang_id);
        $array['1'] = array(
            "HoTen" => $khachHang->HoTen,

        );
        $array['2'] =  DB::table('su_dung_dich_vus')
            ->leftjoin('dichvus', 'su_dung_dich_vus.dichVu_id', '=', 'dichvus.id')
            ->select('su_dung_dich_vus.*', 'dichvus.name as TenDV', 'dichvus.Gia as GiaDV')
            ->where('thuePhong_id', $thuePhong_id)
            ->get();

        die(json_encode($array));
    }
    // sử lý sau khi chọn dịch vụ
    public function seachDV()
    {
        $idDichVu = isset($_GET['idDichVu']) ? (int) $_GET['idDichVu'] : false;
        $idMaHD = isset($_GET['idMaHD']) ? (int) $_GET['idMaHD'] : false;
        $data = dichVu::find($idDichVu);
        $array['1'] = array(
            "Gia" => $data->Gia,

        );
        $array['2'] =  DB::table('su_dung_dich_vus')
            ->leftjoin('dichvus', 'su_dung_dich_vus.dichVu_id', '=', 'dichvus.id')
            ->select('su_dung_dich_vus.*', 'dichvus.name as TenDV', 'dichvus.Gia as GiaDV')
            ->where('thuePhong_id', $idMaHD)
            ->get();
        die(json_encode($array));
    }

    // thanh toán phòng
    public function thanhToanP()
    {
        $idMaHD = isset($_GET['idMaHD']) ? (int) $_GET['idMaHD'] : false;
        $data = ThuePhong::find($idMaHD);
        $khachHang_id = $data->KhachHang_id;
        $Phong_id = $data->Phong_id;
        $khachHang = KhachHang::find($khachHang_id);
        $Phong = phong::find($Phong_id);
        $loaiphong_id = $Phong->loaiphong_id;
        $loaiPhong = loaiPhong::find($loaiphong_id);
        $array['1'] = array(
            "id" => $data->id,
            "HoTen" => $khachHang->HoTen,
            "NgayDen" => $data->NgayDen,
            "TenP" => $Phong->name,
            "TenLP" => $loaiPhong->name,
            "NgayDi" => $data->NgayDi,
            "gia" => $loaiPhong->gia,
        );
        $original_date = $data->NgayDi;
        $original_date1 = $data->NgayDen;
        $timestamp = strtotime($original_date);
        $timestamp1 = strtotime($original_date1);
        $NgayDi = date("d-m-Y H:m:s", $timestamp);
        $NgayDen = date("d-m-Y H:m:s", $timestamp1);
        $array['2'] = array(
            "NgayDi" => $NgayDi,
            "NgayDen" => $NgayDen,
        );
        $array['3'] =  DB::table('su_dung_dich_vus')
            ->where('thuePhong_id', $idMaHD)
            ->sum('su_dung_dich_vus.soLuong');
        $array['4'] =  DB::table('su_dung_dich_vus')
            ->leftjoin('dichvus', 'su_dung_dich_vus.dichVu_id', '=', 'dichvus.id')
            ->select('su_dung_dich_vus.soLuong', 'dichvus.Gia')
            ->where('thuePhong_id', $idMaHD)
            ->where('thanhToan', '0')
            ->get();
        die(json_encode($array));
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function thuePhong(Request $request)
    {
        $NgayDen = new DateTime($request->NgayDen);
        $NgayDi = new DateTime($request->NgayDi);
        if ($request->idKhachHang == 0) {
            // tạo khách hàng nếu chưa có 
            $khachHang = new KhachHang();
            $khachHang->HoTen = $request->HoTen;
            $khachHang->NgaySinh = $request->NgaySinh;
            $khachHang->GioTinh = $request->GioTinh;
            $khachHang->CMND = $request->CMND;
            $khachHang->SDT = $request->SDT;
            $khachHang->DiaChi = $request->DiaChi;
            $khachHang->email = $request->email;
            $khachHang->save();
            // tạo thông tin thuê phòng
            $khachHang_id = $khachHang->id; // lây id khách hàng vừa tạo
            $idPhong = $request->idPhong;
            $thuePhong = new thuePhong();
            $thuePhong->Phong_id = $idPhong;
            $thuePhong->KhachHang_id = $khachHang_id;
            $thuePhong->NgayDen = $NgayDen->format('Y-m-d H:i:s');
            $thuePhong->NgayDi = $NgayDi->format('Y-m-d H:i:s');
            $thuePhong->ThanhToan = 0;
            $thuePhong->NhanVien_id = Auth::id();
            $thuePhong->save();
            //tạo trạng thái của phòng
            $Phong = phong::find($idPhong);
            $Phong->trangthai_id = 3;
            $Phong->save();
        } else {
            $thuePhong = new thuePhong();
            $thuePhong->Phong_id = $request->idPhong;
            $thuePhong->KhachHang_id = $request->idKhachHang;
            $thuePhong->NgayDen = $NgayDen->format('Y-m-d H:i:s');
            $thuePhong->NgayDi = $NgayDi->format('Y-m-d H:i:s');
            $thuePhong->ThanhToan = 0;
            $thuePhong->booking = 0;
            $thuePhong->NhanVien_id =  Auth::id();
            $thuePhong->save();
            //tạo trạng thái của phòng
            $idPhong = $request->idPhong;
            $Phong = phong::find($idPhong);
            $Phong->trangthai_id = 3;
            $Phong->save();
        }
        return redirect()->route('phong.index')->with('thongbao', 'Đặt Phòng thành công');
    }
    public function DatCoPhong(Request $request)
    {
        $NgayDen = new DateTime($request->NgayDen);
        $NgayDi = new DateTime($request->NgayDi);
        if ($request->idKhachHang) {
            $thuePhong = new thuePhong();
            $thuePhong->Phong_id = $request->idPhong;
            $thuePhong->KhachHang_id = $request->idKhachHang;
            $thuePhong->NgayDen = $NgayDen->format('Y-m-d H:i:s');
            $thuePhong->NgayDi = $NgayDi->format('Y-m-d H:i:s');
            $thuePhong->ThanhToan = 0;
            $thuePhong->booking = 1;
            $thuePhong->NhanVien_id =  Auth::id();
            $thuePhong->save();
            //tạo trạng thái của phòng
            $idPhong = $request->idPhong;
            $Phong = phong::find($idPhong);
            $Phong->trangthai_id = 2;
            if ($Phong->save()) {
                return redirect()->route('phong.index')->with('thongbao', 'Đặt Phòng thành công');
            } else {
                return redirect()->route('phong.index')->with('thongbao', 'Đặt Phòng không thành công');
            }
        } else {
            return redirect()->route('phong.index')->with('thongbao', 'Vui lòng chọn khách hàng trước khi đặt phòng');
        }
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function traPhong(Request $request)
    {

        $now = Carbon::now();
        $NgayHT = new DateTime($now);
        $id = $request->MaHD1;
        $ThuePhong = thuePhong::find($id);
        $ThuePhong->ThanhToan = 1;
        $ThuePhong->tongTienPhong = $request->TTienP;
        $ThuePhong->NgayTT = $NgayHT->format('Y-m-d H:i:s');
        $ThuePhong->save();
        $idPhong = $ThuePhong->Phong_id;
        $Phong = phong::find($idPhong);
        $Phong->trangthai_id = 1;
        if ($Phong->save()) {
            $dichVu = DB::table('su_dung_dich_vus')->where('thuePhong_id', $id)->update(['thanhToan' => 1]);
            return redirect()->route('phong.index')->with('thongbao', 'thanh toán phòng thành công');
        } else {
            return redirect()->route('phong.index')->with('thongbao', 'thanh toán phòng không thành công');
        }
    }
    public function giaHPhong(Request $request)
    {

        $id = $request->MaHD1;
        $ThuePhong = thuePhong::find($id);
        $NgayDi1 = new DateTime($request->NgayDi1);
        if (strtotime($ThuePhong->NgayDi) < strtotime($NgayDi1->format('Y-m-d H:i:s'))) {
            $ThuePhong->NgayDi = $NgayDi1->format('Y-m-d H:i:s');
            $idPhong = $ThuePhong->Phong_id;
            $Phong = phong::find($idPhong);
            $Phong->trangthai_id = 3;
            $Phong->save();
            if ($ThuePhong->save()) {
                return redirect()->route('phong.index')->with('thongbao', 'gia hạng phòng thành công');
            } else {
                return redirect()->route('phong.index')->with('thongbao', 'gia hạng phòng không thành công');
            }
        } else {
            return redirect()->route('phong.index')->with('thongbao', 'ngày gia hạng không được thấp hơn ngày trước');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function HuyPhong($id)
    {
        $ThuePhong = thuePhong::find($id);
        $ThuePhong->booking = 2;
        $ThuePhong->ThanhToan = 1;
        if ($ThuePhong->save()) {
            $idPhong = $ThuePhong->Phong_id;
            $Phong = phong::find($idPhong);
            $Phong->trangthai_id = 1;
            $Phong->save();
            return redirect()->route('phong.index')->with('thongbao', 'Hủy Đặt Cọc  thành công');
        } else {
            return redirect()->route('phong.index')->with('thongbao', 'Hủy Đặt Cọc Không thành công');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function thuePhong1($id)
    {
        $ThuePhong = thuePhong::find($id);
        $ThuePhong->booking = 0;
        $ThuePhong->save();
        $idPhong = $ThuePhong->Phong_id;
        $Phong = phong::find($idPhong);
        $Phong->trangthai_id = 3;
        if ($Phong->save()) {
            return redirect()->route('phong.index')->with('thongbao', ' Đặt Phòng  thành công');
        } else {
            return redirect()->route('phong.index')->with('thongbao', 'Đặt Phòng Không thành công');
        }
    }
}

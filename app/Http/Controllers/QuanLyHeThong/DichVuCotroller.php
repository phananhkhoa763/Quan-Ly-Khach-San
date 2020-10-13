<?php

namespace App\Http\Controllers\QuanLyHeThong;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\dichVu;

class DichVuCotroller extends Controller
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
        $data['dichvus'] = DB::table('dichvus')->paginate(4);
        return view('admin.QuanLyHeThong.QuanLyDichVu.index', $data);
    }
    public function create()
    {
        return view('admin.QuanLyHeThong.QuanLyDichVu.create');
    }
    public function store(Request $request)
    {
        $KhachHang = new dichVu();
        $KhachHang->name = $request->name;
        $KhachHang->Gia = $request->Gia;
        if ($KhachHang->save()) {
            return redirect()->route('DichVu.index')->with('thongbao', 'Thêm thành công');
        } else {
            return redirect()->route('DichVu.index')->with('thongbao', 'Thêm Mới  Dịch VỤ không thành công');
        }
    }
    public function edit($id)
    {
        $data['dichVu'] = dichVu::find($id);
        return view('admin.QuanLyHeThong.QuanLyDichVu.update', $data);
    }
    public function update(Request $request, $id)
    {
        $KhachHang =  dichVu::find($id);
        $KhachHang->name = $request->name;
        $KhachHang->Gia = $request->Gia;
        if ($KhachHang->save()) {
            return redirect()->route('DichVu.index')->with('thongbao', 'update thành công');
        } else {
            return redirect()->route('DichVu.index')->with('thongbao', 'update  Dịch VỤ không thành công');
        }
    }
}

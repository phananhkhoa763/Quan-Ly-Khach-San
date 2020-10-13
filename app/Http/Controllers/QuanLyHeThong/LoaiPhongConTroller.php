<?php

namespace App\Http\Controllers\QuanLyHeThong;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\loaiPhong;
use App\phong;
use Illuminate\Support\Facades\DB;

class LoaiPhongConTroller extends Controller
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
        $data['LoaiPhong'] = DB::table('loaiphongs')->paginate(4);
        return view('admin.QuanLyHeThong.QuanLyLoaiPhong.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.QuanLyHeThong.QuanLyLoaiPhong.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $LoaiPhong = new loaiPhong();
        $LoaiPhong->name = $request->name;
        $LoaiPhong->chitiet = $request->chitiet;
        $LoaiPhong->gia = $request->gia;
        $LoaiPhong->save();
        return redirect()->route('LoaiPhong.index')->with('thongbao', 'Thêm thành công');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['LoaiPhong'] = loaiPhong::find($id);
        return view('admin.QuanLyHeThong.QuanLyLoaiPhong.update', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $LoaiPhong = loaiPhong::find($id);
        $LoaiPhong->name = $request->name;
        $LoaiPhong->chitiet = $request->chitiet;
        $LoaiPhong->gia = $request->gia;
        $LoaiPhong->save();
        return redirect()->route('LoaiPhong.index')->with('thongbao', 'Updata Thành Công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Phong = phong::where('loaiphong_id', $id)->count();
        if ($Phong == 0) {
            $LoaiPhong = loaiPhong::find($id);
            $LoaiPhong->delete();
            return redirect()->route('LoaiPhong.index')->with('thongbao', 'Xóa Thành Công');
        } else {
            echo " <script type='text/javascript'>
                alert('Xin lỗi Bạn Không Thể Xóa Thông Tin Này');
                window.location = '";
            echo route('LoaiPhong.index');
            echo "'
            </script> ";
        }
    }
}

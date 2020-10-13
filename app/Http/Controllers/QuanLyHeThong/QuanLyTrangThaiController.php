<?php

namespace App\Http\Controllers\QuanLyHeThong;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\trangThai;
use App\phong;
use Illuminate\Support\Facades\DB;

class QuanLyTrangThaiController extends Controller
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
        $data['trangThai'] = DB::table('trangthais')->paginate(4);
        return view('admin.QuanLyHeThong.QuanLyTrangThaiP.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.QuanLyHeThong.QuanLyTrangThaiP.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $trangThai = new trangThai();
        $trangThai->name = $request->name;
        $trangThai->save();
        return redirect()->route('TrangThai.index')->with('thongbao', 'Thêm Thành Công');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['trangThai'] = trangThai::find($id);
        return view('admin.QuanLyHeThong.QuanLyTrangThaiP.update',$data);
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
        $trangThai = trangThai::find($id);
        $trangThai->name = $request->name;
        $trangThai->save();
        return redirect()->route('TrangThai.index')->with('thongbao', 'Sửa Thành Công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Phong = phong::where('trangthai_id',$id)->count();
        if($Phong==0){
            $trangThai = trangThai::find($id);
            $trangThai->delete();
            return redirect()->route('TrangThai.index')->with('thongbao', 'Xóa Thành Công');
        }else{
            echo " <script type='text/javascript'>
                alert('Xin lỗi Bạn Không Thể Xóa Thông Tin Này');
                window.location = '";
                    echo route('TrangThai.index');
                echo"'
            </script> ";
        }
       
    }
}

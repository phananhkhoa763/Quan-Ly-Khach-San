<?php

namespace App\Http\Controllers\QuanLyHeThong;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\phong;
use App\phong_images;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

class PhongController extends Controller
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
        $data['Phong'] = DB::table('phongs')
            ->leftjoin('laus', 'phongs.lau_id', '=', 'laus.id')
            ->leftjoin('loaiphongs', 'phongs.loaiphong_id', '=', 'loaiphongs.id')
            ->leftjoin('trangthais', 'phongs.trangthai_id', '=', 'trangthais.id')
            ->select('phongs.*', 'loaiphongs.name as loaiP', 'laus.name as Lau', 'trangthais.name as TrangTh')
            ->orderBy('phongs.id')
            ->paginate(4);
        return view('admin.QuanLyHeThong.QuanLyPhong.index', $data);
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
        return view('admin.QuanLyHeThong.QuanLyPhong.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $Phong = new phong();
        $Phong->name = $request->name;
        $Phong->loaiphong_id = $request->LoaiP;
        $Phong->trangthai_id = 1;
        $Phong->lau_id = $request->Lau;
        $Phong->save();
        $Phong_id = $Phong->id;
        if (Input::hasFile('img')) {
            foreach (Input::file('img') as $file) {
                $Phong_images = new phong_images();
                if (isset($file)) {
                    $Phong_images->phong_id = $Phong_id;
                    $Phong_images->images = strtotime(date('Y-m-d H:i:s')) . '_' . $file->getClientOriginalName();
                    $file->move('H:/php/thuNghiem/public/update/img/phong_img', strtotime(date('Y-m-d H:i:s')) . '_' . $file->getClientOriginalName());
                    $Phong_images->save();
                }
            }
        }
        return redirect()->route('QuanLyHeThong-Phong.index')->with('thongbao', 'Thêm thành công');
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
        $data['Phong'] = phong::find($id);
        $data['Lau'] = DB::table('laus')->get();
        $data['LoaiP'] = DB::table('loaiphongs')->get();
        $data['phongimage'] = DB::table('phongimages')->where('phong_id', '=', $id)->get();
        return view('admin.QuanLyHeThong.QuanLyPhong.update', $data);
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
        $Phong = phong::find($id);
        $Phong->name = $request->name;
        $Phong->loaiphong_id = $request->LoaiP;
        $Phong->lau_id = $request->Lau;
        if (Input::hasFile('img')) {
            foreach (Input::file('img') as $file) {
                $Phong_images = new phong_images();
                if (isset($file)) {
                    $Phong_images->phong_id = $id;
                    $Phong_images->images = strtotime(date('Y-m-d H:i:s')) . '_' . $file->getClientOriginalName();
                    $file->move('H:/php/thuNghiem/public/update/img/phong_img', strtotime(date('Y-m-d H:i:s')) . '_' . $file->getClientOriginalName());
                    $Phong_images->save();
                }
            }
        }
        if (!empty($request->imgDelete)) {
            foreach ($request->imgDelete as $k) {
                $Phong_images = phong_images::find($k);
                $deleteImage = public_path('update/img/phong_img/' . $Phong_images->images);
                if (!empty($deleteImage)) {
                    unlink($deleteImage);
                }
                $Phong_images->delete();
            }
        }
        return redirect()->route('QuanLyHeThong-Phong.index')->with('thongbao', 'update thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Phong = phong::find($id);
        $Phong->delete();
        phong::deleteByPhongimages($id);
        return redirect()->route('QuanLyHeThong-Phong.index')->with('thongbao', 'Xóa Thành Công');
    }
}

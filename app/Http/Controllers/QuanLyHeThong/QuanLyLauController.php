<?php

namespace App\Http\Controllers\QuanLyHeThong;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Lau;
use App\phong;
use Illuminate\Support\Facades\DB;

class QuanLyLauController extends Controller
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
        $data['Lau'] = DB::table('laus')->paginate(4);
        return view('admin.QuanLyHeThong.QuanLyLau.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.QuanLyHeThong.QuanLyLau.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $Lau = new Lau();
        $Lau->name = $request->name;
        $Lau->save();
        return redirect()->route('lau.index')->with('thongbao', 'Thêm thành công');
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
        $data['Lau'] = Lau::find($id);
        return view('admin.QuanLyHeThong.QuanLyLau.update', $data);
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
        $Lau = Lau::find($id);
        $Lau->name = $request->name;
        $Lau->save();
        return redirect()->route('lau.index')->with('thongbao', 'Updata Thành Công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Phong = phong::where('lau_id', $id)->count();
        if ($Phong == 0) {
            $Lau = Lau::find($id);
            $Lau->delete();
            return redirect()->route('lau.index')->with('thongbao', 'Xóa Thành Công');
        } else {
            echo " <script type='text/javascript'>
                alert('Xin lỗi Bạn Không Thể Xóa Thông Tin Này');
                window.location = '";
            echo route('lau.index');
            echo "'
            </script> ";
        }
    }
}

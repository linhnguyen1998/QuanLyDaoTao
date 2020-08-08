<?php

namespace App\Http\Controllers;

use App\PhongMay;
use Illuminate\Http\Request;

class PhongMayController extends Controller
{
    public function getList()
    {
        $phongmay = PhongMay::all();
        return view('admin.phongmay.list', ['phongmay'=>$phongmay]);
    }

    public function postAdd(Request $request)
    {
        $this->validate($request, [
            'txtPhong'=>'required|unique:phongmay,id_phong',
            'nmMayhd'=>'required',
        ],[
            'txtPhong.required'=>'Vui lòng điền tên phòng',
            'txtPhong.unique'=>'Tên phòng đã tồn tại',
            'nmMayhd.required'=>'Vui lòng điền số máy còn hoạt động',
        ]);
        $phongmay = new PhongMay;
        $phongmay->id_phong = $request->txtPhong;
        $phongmay->somayhd = $request->nmMayhd;
        $phongmay->save();
        return redirect('admin/phongmay/list')->with('thongbao', 'Thêm thành công');
    }

    public function postEdit(Request $request, $id)
    {
        $this->validate($request, [
            'txtPhong'=>'required',
            'nmMayhd'=>'required',
        ],[
            'txtPhong.required'=>'Vui lòng điền tên phòng',
            'nmMayhd.required'=>'Vui lòng điền số máy còn hoạt động',
        ]);
        $phongmay = PhongMay::find($id);
        $phongmay->id_phong = $request->txtPhong;
        $phongmay->somayhd = $request->nmMayhd;
        $phongmay->save();
        return redirect('admin/phongmay/list')->with('thongbao', 'Cập nhật thành công');
    }

    public function getDel($id)
    {
        $phongmay = PhongMay::find($id);
        $phongmay->delete();
        return redirect('admin/phongmay/list')->with('thongbao', 'Xóa thành công');
    }
}

<?php

namespace App\Http\Controllers;

use App\HocKy;
use Illuminate\Http\Request;

class HocKyController extends Controller
{
    public function getList()
    {
        $hocky = HocKy::all();
        return view('admin.hocky.list', ['hocky'=>$hocky]);
    }

    public function postAdd(Request $request)
    {
        $this->validate($request, [
            'txtHocky'=>'required|unique:hocky,tenhocky',
        ],[
            'txtHocky.required'=>'Vui lòng nhập tên học kỳ',
            'txtHocky.unique'=>'Tên học kỳ đã tồn tại',
        ]);
        $hocky = new HocKy;
        $hocky->tenhocky = $request->txtHocky;
        $hocky->save();
        return redirect('admin/hocky/list')->with('thongbao', 'Thêm thành công');
    }

    public function postEdit(Request $request, $id)
    {
        $this->validate($request, [
            'txtHocky'=>'required|unique:hocky,tenhocky',
        ],[
            'txtHocky.required'=>'Vui lòng nhập tên học kỳ',
            'txtHocky.unique'=>'Tên học kỳ đã tồn tại',
        ]);
        $hocky = HocKy::find($id);
        $hocky->tenhocky = $request->txtHocky;
        $hocky->save();
        return redirect('admin/hocky/list')->with('thongbao', 'Cập nhật thành công');
    }

    public function getDel($id)
    {
        $hocky = HocKy::find($id);
        $hocky->delete();
        return redirect('admin/hocky/list')->with('thongbao', 'Xóa học kỳ thành công');
    }
}

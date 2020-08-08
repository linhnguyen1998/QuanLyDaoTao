<?php

namespace App\Http\Controllers;

use App\HocKy;
use App\HocPhan;
use Illuminate\Http\Request;

class HocPhanController extends Controller
{
    public function getList()
    {
        $hocphan = HocPhan::all();
        return view('admin.hocphan.list', ['hocphan'=>$hocphan]);
    }

    public function postAdd(Request $request)
    {
        $this->validate($request, [
            'txtMahocphan'=>'required|unique:hocphan,id_hocphan',
            'txtHocphan'=>'required',
            'nmSotin'=>'required',
        ],[
            'txtMahocphan.required'=>'Vui lòng điền mã học phần',
            'txtMahocphan.unique'=>'Học phần đã tồn tại',
            'txtHocphan.required'=>'Vui lòng điền mã học phần',
            'nmSotin.required'=>'Vui lòng điền số tín chỉ',
        ]);
        $hocphan = new HocPhan;
        $hocphan->id_hocphan = $request->txtMahocphan;
        $hocphan->tenhocphan = $request->txtHocphan;
        $hocphan->sotinchi = $request->nmSotin;
        $hocphan->tongsogio = $request->nmSotin * 30;
        $hocphan->save();
        return redirect('admin/hocphan/list')->with('thongbao', 'Thêm thành công');
    }

    public function postEdit(Request $request, $id)
    {
        $this->validate($request, [
            'txtMahocphan'=>'required',
            'txtHocphan'=>'required',
            'nmSotin'=>'required',
        ],[
            'txtMahocphan.required'=>'Vui lòng điền mã học phần',
            'txtHocphan.required'=>'Vui lòng điền mã học phần',
            'nmSotin.required'=>'Vui lòng điền số tín chỉ',
        ]);
        $hocphan = HocPhan::find($id);
        $hocphan->id_hocphan = $request->txtMahocphan;
        $hocphan->tenhocphan = $request->txtHocphan;
        $hocphan->sotinchi = $request->nmSotin;
        $hocphan->tongsogio = $request->nmSotin * 30;
        $hocphan->save();
        return redirect('admin/hocphan/list')->with('thongbao', 'Cập nhật thành công');
    }
    public function getDel($id)
    {
        $hocphan = HocPhan::find($id);
        $hocphan->delete();
        return redirect('admin/hocphan/list')->with('thongbao', 'Xóa thành công');
    }
}

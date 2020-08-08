<?php

namespace App\Http\Controllers;

use App\DotDangKy;
use App\HocKy;
use Illuminate\Http\Request;

class DotDangKyController extends Controller
{
    public function getList()
    {
        $dotdk = DotDangKy::all();
        $hocky = HocKy::all();
        return view('admin.dotdk.list', ['dotdk'=>$dotdk, 'hocky'=>$hocky]);
    }

    public function postAdd(Request $request)
    {
        $this->validate($request,[
            'txtTendot'=>'required|unique:dotdangky,tendot',
            'dtNgaybd'=>'required',
            'dtNgaykt'=>'required',
            'Hocky'=>'integer',
        ],[
            'txtTendot.required' => 'Tên đợt không được để trống',
            'txtTendot.unique'=>'Tên đợt đã trùng',
            'dtNgaybd.required'=>'Ngày bắt đầu không được để trống',
            'dtNgaykt.required'=>'Ngày kết thúc không được để trống',
            'Hocky.integer'=>'Học kỳ không được để trống'
        ]);
        $dot = new DotDangKy;
        $dot->tendot = $request->txtTendot;
        $dot->ngaybatdaudk = $request->dtNgaybd;
        $dot->ngayketthucdk = $request->dtNgaykt;
        $dot->id_hocky = $request->Hocky;
        $dot->save();
        return redirect('admin/dotdk/list')->with('thongbao','Thêm thành công');
    }

    public function postEdit(Request $request, $id)
    {
        $this->validate($request,[
            'dtNgaybd'=>'required',
            'dtNgaykt'=>'required',
            'Hocky'=>'integer',
        ],[
            'dtNgaybd.required'=>'Ngày bắt đầu không được để trống',
            'dtNgaykt.required'=>'Ngày kết thúc không được để trống',
            'Hocky.integer'=>'Học kỳ không được để trống'
        ]);
        $dot = DotDangKy::find($id);
        $dot->ngaybatdaudk = $request->dtNgaybd;
        $dot->ngayketthucdk = $request->dtNgaykt;
        $dot->id_hocky = $request->Hocky;
        $dot->save();
        return redirect('admin/dotdk/list')->with('thongbao','Cập nhật thành công');
    }

    public function getDel($id)
    {
        $dot = DotDangKy::find($id);
        $dot->delete();
        return redirect('admin/dotdk/list')->with('thongbao','Xóa thành công');
    }
}

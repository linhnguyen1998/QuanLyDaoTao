<?php

namespace App\Http\Controllers;

use App\ThoiKhoaBieu;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ThoiKhoaBieuController extends Controller
{
    public function getList()
    {
        $tkb = ThoiKhoaBieu::all();
        foreach ($tkb as $row) {
            $ngaybd = Carbon::createFromFormat('Y-m-d', $row->ngaybatdauhp);
            $ngaykt = Carbon::createFromFormat('Y-m-d', $row->ngayketthuchp);

            $tuanbd = $ngaybd->weekOfYear;
            $tuankt = $ngaykt->weekOfYear;
            $tuanhoc = '';
            for ($i = $tuanbd; $i <= $tuankt; $i++) {
                $tuanhoc1 = '-' . $i;
                $tuanhoc .= $tuanhoc1;
            }
            $th[] = [
                'tuanhoc'=>$tuanhoc,
                'id_tkb'=>$row->id_tkb,
            ];
        }
        return view('admin.tkb.list', ['tkb'=>$tkb, 'th'=>$th]);
    }

    public function getDel($id)
    {
        $tkb = ThoiKhoaBieu::find($id);
        $tkb->delete();
        return redirect('admin/tkb/list')->with('thongbao', 'Xóa thành công');
    }
}

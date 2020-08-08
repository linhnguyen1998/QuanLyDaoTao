<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\DangKy;
use App\DotDangKy;
use App\HocKy;
use App\Lop;
use App\ThoiKhoaBieu;
use Carbon\Carbon;
use Illuminate\Http\Request;
use function Symfony\Component\VarDumper\Dumper\esc;

class DangKyController extends Controller
{
    public function getHocKy()
    {
        $hocky = HocKy::all();
        return view('user.student.chooseHP', ['hocky' => $hocky]);
    }

    public function getDotDK($id)
    {
        $dot = DotDangKy::where('id_hocky', $id)->get();
        $date = Carbon::now('Asia/Ho_Chi_Minh')->toDateString();
        foreach ($dot as $d) {
            $startTime = Carbon::createFromFormat('Y-m-d', $d->ngaybatdaudk);
            $endTime = Carbon::createFromFormat('Y-m-d', $d->ngayketthucdk);
            if ($startTime >= $date || $date <= $endTime) {
                echo '<tr>
                           <td>' . $d->tendot . '</td>
                           <td>' . $d->ngaybatdaudk . ' - ' . $d->ngayketthucdk . '</td>
                           <td>Đăng ký/Hủy</td>
                           <td><a class="btn btn-success" href="user/sinhvien/dangky/' . $d->id_hocky . '"><i class="fa fa-check"></i>Chọn</a></td>
                        </tr>';
            } else {
                echo $output = '<tr>
                           <td>' . $d->tendot . '</td>
                           <td>' . $d->ngaybatdaudk . ' - ' . $d->ngayketthucdk . '</td>
                           <td>Đăng ký/Hủy</td>
                           <td>Không được phép DK</td>
                        </tr>';
            }
            // echo $output;
        }
    }

    public function getLopHoc($id)
    {
        $hocky = HocKy::find($id);
        $tkb = ThoiKhoaBieu::where('id_hocky', $hocky->id_hocky)->get();
        foreach ($tkb as $row)
        {
            $ngaybd = Carbon::createFromFormat('Y-m-d', $row->ngaybatdauhp);
            $ngaykt = Carbon::createFromFormat('Y-m-d', $row->ngayketthuchp);

            $tuanbd = $ngaybd->weekOfYear;
            $tuankt = $ngaykt->weekOfYear;
            $tuanhoc = '';
            for ($i = $tuanbd; $i <= $tuankt; $i++)
            {
                $tuanhoc1 = '-'.$i;
                $tuanhoc .= $tuanhoc1;
            }
            if(Auth::check())
                $mssv = Auth::user()->email;
            $demdk = DangKy::where('id_tkb', $row->id_tkb)->count();
            $isDK = DangKy::where('id_tkb', $row->id_tkb)->first();
            //$dk = DangKy::where('mssv', $mssv)->orWhere('id_tkb', $row->id_tkb)->orWhere('isSign', 1)->count();
            if($isDK == null)
            {
                $isSign = 0;
            }
            else
            {
                $isSign = $isDK->isSign;
            }
            $listHP[] = [
                'id_tkb'=>$row->id_tkb,
                'tuanhoc'=>$tuanhoc,
                'demdk'=>$demdk,
                'mssv'=>$mssv,
                'isDK'=>$isSign,
            ];
        }
        return view('user.student.signHP', ['tkb'=>$tkb, 'listHP'=>$listHP]);
    }



    public function Sign(Request $request, $id)
    {
        $dangky = new DangKy;
        $dangky->mssv = $request->get('mssv');
        $dangky->id_hocky = $request->get('hocky');
        $dangky->id_tkb = $request->get('thoikhoabieu');
        $dangky->isSign = 1;
        $dangky->save();

        $demdk = DangKy::where('id_tkb', $request->get('thoikhoabieu'))->orWhere('isSign', 1)->count();
        echo $demdk;

        $listDK = DangKy::where('mssv', $request->get('mssv'))->get();
        foreach ($listDK as $list)
        {
            $output = '<tr>
                        <td>('.$list->thoikhoabieu->lop->hocphan->id_hocphan.') '.$list->thoikhoabieu->lop->hocphan->tenhocphan.'</td>
                        <td>Thứ '.$list->thoikhoabieu->thu.' - Ca: '.$list->thoikhoabieu->ca.'</td>
                        <td><a id="removeHP" onclick="removeHP('.$list->id.')" class="btn btn-danger"><i class="fa fa-trash"></i> Hủy</a></td>
                    </tr>';
            echo $output;
        }
    }

    public function GetDK($id, $mssv)
    {
        $listDK = DangKy::where('mssv', $mssv)->get();
        foreach ($listDK as $list)
        {
            $output = '<tr>
                        <td>('.$list->thoikhoabieu->lop->hocphan->id_hocphan.') '.$list->thoikhoabieu->lop->hocphan->tenhocphan.'</td>
                        <td>Thứ '.$list->thoikhoabieu->thu.' - Ca: '.$list->thoikhoabieu->ca.'</td>
                        <td><a class="btn btn-danger" id="removeHP" onclick="removeHP('.$list->id.')"><i class="fa fa-trash"></i></a></td>
                    </tr>';
            echo $output;
        }
    }

    public function HuyDK(Request $request, $id)
    {
        $dk = DangKy::find($id);
        $dk->delete();
        $hocky = $request->get('hocky');
        $mssv = $request->get('mssv');

        return DangKyController::GetDK($hocky, $mssv);
    }
}
<?php

namespace App\Http\Controllers;

use App\GiangVien;
use App\HocKy;
use App\HocPhan;
use App\Lop;
use App\PhongMay;
use App\ThoiKhoaBieu;
use Carbon\Carbon;
use Illuminate\Http\Request;

class LopController extends Controller
{
    public function getClass()
    {
        $hocphan = HocPhan::all();
        return view('admin.lop.create_class', ['hocphan'=>$hocphan]);
    }

    public function makeClass(Request $request)
    {
        $this->validate($request, [
            'idHocphan'=>'required|max:8',
            'nmSosv'=>'required',
            'nmSoca'=>'required',
        ],[
            'idHocphan.required'=>'Vui lòng chọn học phần',
            'idHocphan.max'=>'Vui lòng chọn học phần',
            'nmSosv.required'=>'Vui lòng điền số sinh viên',
            'nmSoca.required'=>'Vui lòng điền số ca thực hành trong tuần',
        ]);
        $date = Carbon::now();
        $i = 0;
        $id_lop = [
            $date->year,
            '_',
            $request->idHocphan,
        ];
        $addlop = Lop::all();
        foreach ($addlop as $lp)
        {
            if($lp->id_lop == implode($id_lop))
            {
                $i +=1;
                $id_lop = [
                    $date->year,
                    '_',
                    $request->idHocphan,
                    '_',
                    $i,
                ];
            }
        }
        $lop = new Lop();
        $lop->id_lop = implode($id_lop);
        $lop->id_hocphan = $request->idHocphan;
        $lop->sosv = $request->nmSosv;

        $hocphan = HocPhan::find($request->idHocphan);
        $tonggio = $request->nmSoca * 3;
        if($tonggio <= $hocphan->tongsogio)
        {
            $lop->socatrongtuan = $request->nmSoca;
        }
        $lophoc[] = [
            'ca'=>0,
            'thu'=>0,
            'tkb'=>"",
            'tuanhoc'=>"",
            'idlop'=>"",
            'idhocky'=>"",
            'idphong'=>"",
            'tenhocphan'=>"",
            'ngaybd'=>"",
            'ngaykt'=>"",
        ];
        $lop->save();
        $infoLop = implode($id_lop);
        $hocky = HocKy::all();
        $phong = PhongMay::all();
        return view('admin.tkb.makeTKB', ['id_lop'=>$infoLop, 'hocky'=>$hocky, 'phong'=>$phong, 'lophoc'=>$lophoc]);
    }


    public function sortSchel(Request $request)
    {
        $this->validate($request, [
            'idPhong'=>'max:8',
            'dtNgaybd'=>'required',
            'dtNgaykt'=>'required',
        ],[
            'idPhong.max'=>'Vui lòng chọn phòng',
            'dtNgaybd.required'=>'Vui lòng nhập ngày bắt đầu học phần',
            'dtNgaykt.required'=>'Vui lòng nhập ngày kết thúc học phần',
        ]);

        $count = ThoiKhoaBieu::count();
        $lopca = Lop::find($request->idLop);
        $catrongtuan = $lopca->socatrongtuan;
        $idtkb = [
            $request->idLop,
            $request->Ca,
            $request->Thu,
        ];
        $matkb = implode($idtkb);
        if($count == 0)
        {
            $gv = GiangVien::where('email', $request->idGV)->first();
            $tkb = new ThoiKhoaBieu();
            $tkb->id_tkb = $matkb;
            $tkb->id_giangvien = $gv->id_giangvien;
            $tkb->id_hocky = $request->idHocky;
            $tkb->id_lop = $request->idLop;
            $tkb->id_phong = $request->idPhong;
            $tkb->ngaybatdauhp = $request->dtNgaybd;
            $tkb->ngayketthuchp = $request->dtNgaykt;
            $tkb->ca = $request->Ca;
            $tkb->thu = $request->Thu;
            $tkb->save();
        }
        else
        {
            $demtkb = ThoiKhoaBieu::where('id_tkb', $matkb)->count();
            $demlop = ThoiKhoaBieu::where('id_lop', $request->idLop)->count();
            if($demtkb > 0)
                echo "";
            elseif($demtkb < 1)
            {
                if($demlop < $catrongtuan)
                {
                    $gv = GiangVien::where('email', $request->idGV)->first();
                    $tkb = new ThoiKhoaBieu();
                    $tkb->id_tkb = $matkb;
                    $tkb->id_giangvien = $gv->id_giangvien;
                    $tkb->id_hocky = $request->idHocky;
                    $tkb->id_lop = $request->idLop;
                    $tkb->id_phong = $request->idPhong;
                    $tkb->ngaybatdauhp = $request->dtNgaybd;
                    $tkb->ngayketthuchp = $request->dtNgaykt;
                    $tkb->ca = $request->Ca;
                    $tkb->thu = $request->Thu;
                    $tkb->save();
                }
            }
        }
        $hocky = HocKy::all();
        $phong = PhongMay::all();
        $thoikb = ThoiKhoaBieu::where('id_lop', $request->idLop)->get();
        foreach ($thoikb as $lp)
        {
//            if($request->idLop == $lp->id_lop)
//            {
                $lop = Lop::find($lp->id_lop);
                $tenhocphan = [
                    $lop->id_hocphan,
                    ' - ',
                    $lop->hocphan->tenhocphan,
                ];

                $ngaybd = Carbon::createFromFormat('Y-m-d', $lp->ngaybatdauhp);
                $ngaykt = Carbon::createFromFormat('Y-m-d', $lp->ngayketthuchp);

                $tuanbd = $ngaybd->weekOfYear;
                $tuankt = $ngaykt->weekOfYear;
                $tuanhoc = '';
                for ($i = $tuanbd; $i <= $tuankt; $i++)
                {
                    $tuanhoc1 = '-'.$i;
                    $tuanhoc .= $tuanhoc1;
                }
//            }
            $lophoc[] = [
                'tkb'=>$lp->id_tkb,
                'ca'=>$lp->ca,
                'thu'=>$lp->thu,
                'tuanhoc'=>$tuanhoc,
                'idlop'=>$lp->id_lop,
                'idphong'=>$lp->id_phong,
                'idhocky'=>$lp->id_hocky,
                'tenhocphan'=>implode($tenhocphan),
                'ngaybd'=>$lp->ngaybatdauhp,
                'ngaykt'=>$lp->ngayketthuchp,
            ];
        }
        return view('admin.tkb.makeTKB', ['id_lop'=>$request->idLop, 'hocky'=>$hocky, 'phong'=>$phong, 'lophoc'=>$lophoc]);
    }

    public function sortSchelEdit(Request $request, $id)
    {
        $tkb = ThoiKhoaBieu::find($id);
        $tkb->id_hocky = $request->idHocky;
        $tkb->id_phong = $request->idPhong;
        $tkb->ngaybatdauhp = $request->dtNgaybd;
        $tkb->ngayketthuchp = $request->dtNgaykt;
        $tkb->save();
        $hocky = HocKy::all();
        $phong = PhongMay::all();

        $tkbieu = ThoiKhoaBieu::where('id_lop', $tkb->id_lop)->get();
        foreach ($tkbieu as $tk)
        {
            //Lấy tuần học
            $ngaybd = Carbon::createFromFormat('Y-m-d', $tk->ngaybatdauhp);
            $ngaykt = Carbon::createFromFormat('Y-m-d', $tk->ngayketthuchp);

            $tuanbd = $ngaybd->weekOfYear;
            $tuankt = $ngaykt->weekOfYear;
            $tuanhoc = '';
            for ($i = $tuanbd; $i <= $tuankt; $i++)
            {
                $tuanhoc1 = '-'.$i;
                $tuanhoc .= $tuanhoc1;
            }

            //Lấy tên học phần
            $lop = Lop::find($tkb->id_lop);
            $tenhocphan = [
                $lop->id_hocphan,
                ' - ',
                $lop->hocphan->tenhocphan,
            ];
            //Array
            $lophoc[] = [
                'tkb'=>$tk->id_tkb,
                'ca'=>$tk->ca,
                'thu'=>$tk->thu,
                'tuanhoc'=>$tuanhoc,
                'idlop'=>$tk->id_lop,
                'idphong'=>$tk->id_phong,
                'idhocky'=>$tk->id_hocky,
                'tenhocphan'=>implode($tenhocphan),
                'ngaybd'=>$tk->ngaybatdauhp,
                'ngaykt'=>$tk->ngayketthuchp,
            ];
        }
        return view('admin.tkb.makeTKB', ['id_lop'=>$tkb->id_lop, 'hocky'=>$hocky, 'phong'=>$phong, 'lophoc'=>$lophoc]);
    }
}

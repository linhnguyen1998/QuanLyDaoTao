<?php

namespace App\Http\Controllers;

use App\SinhVien;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SinhVienController extends Controller
{
    public function getList()
    {
        $sinhvien = SinhVien::all();
        return view('admin.sinhvien.list', ['sinhvien'=>$sinhvien]);
    }
    public function postAdd(Request $request)
    {
        $this->validate($request,
            [
                'txtMSSV'=>'required|unique:sinhvien,mssv',
                'txtHoten' => 'required|min:3',
                'txtEmail' => 'required|email',
                'dtNgaysinh'=>'required',
                'rdoPhai'=>'required',
            ],
            [
                'txtHoten.required' => 'Bạn chưa nhập họ tên',
                'txtHoten.min' => 'Họ tên không được nhỏ 3 kí tự',
                'txtEmail.required' => 'Bạn phải có Email',
                'txtEmail.email' => 'Eamil không đúng định dạng',
                'txtMSSV.required' => 'Bạn chưa nhập MSSV',
                'txtMSSV.unique' => 'MSSV đã tồn tại',
                'dtNgaysinh.required'=>'Vui lòng chọn ngày sinh',
                'rdoPhai.required'=>'Vui lòng chọn giới tính',
            ]);
        $sinhvien = new SinhVien;
        $sinhvien->mssv = $request->txtMSSV;
        $sinhvien->email = $request->txtEmail;
        $sinhvien->hoten = $request->txtHoten;
        $sinhvien->ngaysinh = $request->dtNgaysinh;
        $sinhvien->gioitinh = $request->rdoPhai;
        $ngaysinh = Carbon::createFromFormat('Y-m-d', $sinhvien->ngaysinh);
        $pass =  array(
            "$ngaysinh->day",
            "$ngaysinh->month",
            "$ngaysinh->year"
        );
        $user = new User;
        $user->email = $request->txtMSSV;
        $user->password = bcrypt(implode($pass));
        $user->quyen = 0;
        $user->save();

        $sinhvien->save();
        return redirect('admin/sinhvien/list')->with('thongbao', 'Thêm thành công');
    }

    public function postEdit(Request $request, $id)
    {
        $sinhvien = SinhVien::find($id);
        $this->validate($request,
            [
                'txtMSSV'=>'required',
                'txtHoten' => 'required|min:3',
                'txtPass' => 'required|min:8|max:32',
                'txtPassAgain' => 'required|same:txtPass',
            ],
            [
                'txtMSSV.required' => 'Bạn chưa nhập MSSV',
                'txtHoten.required' => 'Bạn chưa nhập họ tên',
                'txtHoten.min' => 'Họ tên không được nhỏ 3 kí tự',
                'txtPass.required' => 'Mật khẩu không được trống',
                'txtPass.min' => 'Mật khẩu không được ít hơn 6 kí tự',
                'txtPass.max' => 'Mật khẩu vượt quá 32 kí tự',
                'txtPassAgain.required' => 'Bạn phải nhập lại mật khẩu',
                'txtPassAgain.same' => 'Không trùng khớp với mật khẩu',
            ]);

        $sinhvien->mssv = $request->txtMSSV;
        $sinhvien->email = $request->txtEmail;
        $sinhvien->hoten = $request->txtHoten;
        $sinhvien->ngaysinh = $request->dtNgaysinh;
        $sinhvien->gioitinh = $request->rdoPhai;

        $user = User::where('email', $request->txtMSSV)->first();
        $user->password = bcrypt($request->txtPass);
        $user->quyen = 0;
        $user->save();

        $sinhvien->save();
        return redirect('admin/sinhvien/list')->with('thongbao', 'Cập nhật thành công');
    }

    public function getDel($id)
    {
        $user = SinhVien::find($id);
        $user->delete();
        return redirect('admin/sinhvien/list')->with('thongbao', 'Đã xóa thành công');
    }

    public function getLoginAdmin()
    {
        return view('user.login');
    }

    public function postLoginAdmin(Request $request)
    {
        $this->validate($request,
            [
                'email'=>'required|integer',
                'password'=>'required|min:6|max:32',
            ],
            [
                'email.integer'=>'MSSV phải là số',
                'email.required'=>'MSSV không được phép trống',
                'password.required' => 'Mật khẩu không được trống',
                'password.min' => 'Mật khẩu không được ít hơn 6 kí tự',
                'password.max' => 'Mật khẩu vượt quá 32 kí tự',
            ]);
        if(Auth::attempt(['email'=>$request->email, 'password'=>$request->password]))
        {
            return redirect('user/sinhvien');
        }
        else
            return redirect('user/login')->with('thongbao','Đăng nhập thất bại! Vui lòng thử lại');
    }

    public function getLogoutAdmin()
    {
        Auth::logout();
        return redirect('user/login');
    }
}

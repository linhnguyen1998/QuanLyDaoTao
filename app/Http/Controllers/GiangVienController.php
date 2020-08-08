<?php

namespace App\Http\Controllers;

use App\GiangVien;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GiangVienController extends Controller
{
    public function getList()
    {
        $giangvien = GiangVien::all();
        return view('admin.giangvien.list', ['giangvien'=>$giangvien]);
    }
    public function postAdd(Request $request)
    {
        $this->validate($request,
            [
                'txtHoten' => 'required|min:3',
                'txtEmail' => 'required|email|unique:giangvien,email',
                'dtNgaysinh'=>'required',
                'rdoPhai'=>'required',
                'rdoQuyen'=>'required',
            ],
            [
                'txtHoten.required' => 'Bạn chưa nhập họ tên',
                'txtHoten.min' => 'Họ tên không được nhỏ 3 kí tự',
                'txtEmail.required' => 'Bạn phải có Email',
                'txtEmail.email' => 'Eamil không đúng định dạng',
                'txtEmail.unique' => 'Email đã tồn tại',
                'dtNgaysinh.required'=>'Vui lòng chọn ngày sinh',
                'rdoPhai.required'=>'Vui lòng chọn giới tính',
                'rdoQuyen.required'=>'Vui lòng chọn quyền'
            ]);
        $giangvien = new GiangVien;
        $giangvien->email = $request->txtEmail;
        $giangvien->hoten = $request->txtHoten;
        $giangvien->ngaysinh = $request->dtNgaysinh;
        $giangvien->gioitinh = $request->rdoPhai;
        $ngaysinh = Carbon::createFromFormat('Y-m-d', $giangvien->ngaysinh);
        $pass =  array(
            "$ngaysinh->day",
            "$ngaysinh->month",
            "$ngaysinh->year"
        );
        $user = new User;
        $user->email = $request->txtEmail;
        $user->password = bcrypt(implode($pass));
        $user->quyen = $request->rdoQuyen;
        $user->save();
        $giangvien->save();
        return redirect('admin/giangvien/list')->with('thongbao', 'Thêm thành công');
    }

    public function postEdit(Request $request, $id)
    {
        $giangvien = GiangVien::find($id);
        $this->validate($request,
            [
                'txtHoten' => 'required|min:3',
                'txtPass' => 'required|min:6|max:32',
                'txtPassAgain' => 'required|same:txtPass',
            ],
            [
                'txtHoten.required' => 'Bạn chưa nhập họ tên',
                'txtHoten.min' => 'Họ tên không được nhỏ 3 kí tự',
                'txtPass.required' => 'Mật khẩu không được trống',
                'txtPass.min' => 'Mật khẩu không được ít hơn 6 kí tự',
                'txtPass.max' => 'Mật khẩu vượt quá 32 kí tự',
                'txtPassAgain.required' => 'Bạn phải nhập lại mật khẩu',
                'txtPassAgain.same' => 'Không trùng khớp với mật khẩu',
            ]);
        $giangvien->email = $request->txtEmail;
        $giangvien->hoten = $request->txtHoten;
        $giangvien->ngaysinh = $request->dtNgaysinh;
        $giangvien->gioitinh = $request->rdoPhai;

        $user = User::where('email', $request->txtEmail)->first();
        $user->email = $request->txtEmail;
        $user->password = bcrypt($request->txtPass);
        $user->quyen = $request->rdoQuyen;
        $user->save();
        $giangvien->save();
        return redirect('admin/giangvien/list')->with('thongbao', 'Cập nhật thành công');
    }

    public function getDel($id)
    {
        $gv = GiangVien::find($id);
        $email = GiangVien::where('email', $gv->email)->first();
        $gv->delete();
        $email->delete();
        return redirect('admin/giangvien/list')->with('thongbao', 'Đã xóa thành công');
    }

    public function getLoginAdmin()
    {
        return view('admin.login');
    }

    public function postLoginAdmin(Request $request)
    {
        $this->validate($request,
            [
                'email'=>'required|email',
                'password'=>'required|min:6|max:32',
            ],
            [
                'email.required'=>'Email không được phép trống',
                'email.email'=>'Email không đúng định dạng',
                'password.required' => 'Mật khẩu không được trống',
                'password.min' => 'Mật khẩu không được ít hơn 6 kí tự',
                'password.max' => 'Mật khẩu vượt quá 32 kí tự',
            ]);
        if(Auth::attempt(['email'=>$request->email, 'password'=>$request->password]))
        {
            return redirect('admin/hocphan/list');
        }
        else
            return redirect('admin/login')->with('loi','Đăng nhập thất bại! Vui lòng thử lại');
    }

    public function getLogoutAdmin()
    {
        Auth::logout();
        return redirect('admin/login');
    }
}

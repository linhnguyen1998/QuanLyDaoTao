@foreach($giangvien as $gv)
    <div id="edit-giangvien-Model-{{$gv->id}}" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Cập nhật giảng viên</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <form action="admin/giangvien/edit/{{$gv->id}}" method="POST">
                        {{csrf_field()}}
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" name="txtEmail" id="txtEmail" class="form-control input-lg" value="{{$gv->email}}"/>
                        </div>
                        <div class="form-group">
                            <label>Đổi mật khẩu</label>
                            <input type="password" class="form-control password" name="txtPass" placeholder="Mật khẩu mới"/>
                        </div>
                        <div class="form-group">
                            <label>Nhập lại mật khẩu</label>
                            <input type="password" class="form-control password" name="txtPassAgain" placeholder="Nhập lại mật khẩu" />
                        </div>
                        <div class="form-group">
                            <label>Họ tên</label>
                            <input type="text" name="txtHoten" id="txtHoten" class="form-control input-lg" value="{{$gv->hoten}}" />
                        </div>
                        <div class="form-group">
                            <label>Ngày sinh</label>
                            <input type="date" name="dtNgaysinh" class="form-control input-lg" value="{{$gv->ngaysinh}}"/>
                        </div>
                        <div class="form-group">
                            <label>Giới tính</label>
                            <br>
                            <label class="radio-inline">
                                <input name="rdoPhai" value="0"
                                       @if($gv->gioitinh == 0)
                                               {{"checked"}}
                                       @endif
                                        type="radio">Nam
                            </label>
                            <label class="radio-inline">
                                <input name="rdoPhai" value="1"
                                       @if($gv->gioitinh == 1)
                                       {{"checked"}}
                                       @endif
                                       type="radio">Nữ
                            </label>
                        </div>
                        <div class="form-group">
                            <label>Quyền</label>
                            <br>
                            <label class="radio-inline">
                                <input name="rdoQuyen" value="1"
                                       @if($gv->quyen == 1)
                                       {{"checked"}}
                                       @endif
                                       type="radio">Admin
                            </label>
                            <label class="radio-inline">
                                <input name="rdoQuyen" value="0"
                                       @if($gv->quyen == 0)
                                       {{"checked"}}
                                       @endif
                                       type="radio">Normal
                            </label>
                        </div>
                        <button type="submit" class="btn btn-success">Cập nhật</button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
            </div>

        </div>
    </div>
@endforeach

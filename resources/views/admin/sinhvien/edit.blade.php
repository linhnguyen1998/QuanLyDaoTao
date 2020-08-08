@foreach($sinhvien as $sv)
    <div id="edit-sinhvien-Model-{{$sv->mssv}}" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Cập nhật sinh viên</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <form action="admin/sinhvien/edit/{{$sv->mssv}}" method="POST">
                        {{csrf_field()}}
                        <div class="form-group">
                            <label>MSSV</label>
                            <input type="text" name="txtMSSV" class="form-control input-lg" readonly value="{{$sv->mssv}}"/>
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
                            <input type="text" name="txtHoten" id="txtHoten" class="form-control input-lg" value="{{$sv->hoten}}" />
                        </div>
                        <div class="form-group">
                            <label>Ngày sinh</label>
                            <input type="date" name="dtNgaysinh" class="form-control input-lg" value="{{$sv->ngaysinh}}"/>
                        </div>
                        <div class="form-group">
                            <label>Giới tính</label>
                            <br>
                            <label class="radio-inline">
                                <input name="rdoPhai" value="0"
                                       @if($sv->gioitinh == 0)
                                               {{"checked"}}
                                       @endif
                                        type="radio">Nam
                            </label>
                            <label class="radio-inline">
                                <input name="rdoPhai" value="1"
                                       @if($sv->gioitinh == 1)
                                       {{"checked"}}
                                       @endif
                                       type="radio">Nữ
                            </label>
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" name="txtEmail" id="txtEmail" class="form-control input-lg" value="{{$sv->email}}"/>
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

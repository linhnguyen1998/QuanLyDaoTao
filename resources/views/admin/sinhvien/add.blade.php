<div id="add-sinhvien-Model" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Thêm Sinh Viên</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <form action="admin/sinhvien/add" method="POST">
                        {{csrf_field()}}
                        <div class="form-group">
                            <label>MSSV</label>
                            <input type="text" name="txtMSSV" class="form-control input-lg" placeholder="Nhập MSSV..."/>
                        </div>
                        <div class="form-group">
                            <label>Họ tên</label>
                            <input type="text" name="txtHoten" id="txtHoten" class="form-control input-lg" placeholder="Nhập họ tên..."/>
                        </div>
                        <div class="form-group">
                            <label>Ngày sinh</label>
                            <input type="date" name="dtNgaysinh" class="form-control input-lg"/>
                        </div>
                        <div class="form-group">
                            <label>Giới tính</label>
                            <br>
                            <label class="radio-inline">
                                <input name="rdoPhai" value="0" checked="" type="radio">Nam
                            </label>
                            <label class="radio-inline">
                                <input name="rdoPhai" value="1" type="radio">Nữ
                            </label>
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" name="txtEmail" id="txtEmail" class="form-control input-lg" placeholder="Nhập tên email..."/>
                        </div>
                        <button type="submit" class="btn btn-success">Thêm</button>
                        <button type="reset" class="btn btn-info">Làm mới</button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
            </div>

        </div>
    </div>
<div id="add-dot-Model" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Thêm Đợt</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <form action="admin/dotdk/add" method="POST">
                        {{csrf_field()}}
                        <div class="form-group">
                            <label>Tên đợt</label>
                            <input type="text" name="txtTendot" class="form-control input-lg" placeholder="Nhập tên đợt..."/>
                        </div>
                        <div class="form-group">
                            <label>Ngày bắt đầu đăng ký</label>
                            <input type="date" name="dtNgaybd" class="form-control input-lg" />
                        </div>
                        <div class="form-group">
                            <label>Ngày kết thúc đăng ký</label>
                            <input type="date" name="dtNgaykt" class="form-control input-lg" />
                        </div>
                        <div class="form-group">
                            <label>Học kỳ</label>
                            <select class="form-control" name="Hocky" id="Hocky">
                                <option>Vui lòng chọn học kỳ</option>
                                @foreach($hocky as $hk)
                                    <option value="{{$hk->id_hocky}}">{{$hk->tenhocky}}</option>
                                @endforeach
                            </select>
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
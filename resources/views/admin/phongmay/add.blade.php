<div id="add-phongmay-Model" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Thêm Phòng Máy</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <form action="admin/phongmay/add" method="POST">
                        {{csrf_field()}}
                        <div class="form-group">
                            <label>Phòng</label>
                            <input type="text" name="txtPhong" class="form-control input-lg" placeholder="Nhập tên phòng máy..."/>
                        </div>
                        <div class="form-group">
                            <label>Số máy hoạt động</label>
                            <input type="number" name="nmMayhd" class="form-control input-lg" />
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
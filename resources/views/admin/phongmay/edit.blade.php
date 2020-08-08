@foreach($phongmay as $pm)
    <div id="edit-phongmay-Model-{{$pm->id_phong}}" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Cập nhật phòng máy</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <form action="admin/phongmay/edit/{{$pm->id_phong}}" method="POST">
                        {{csrf_field()}}
                        <div class="form-group">
                            <label>Phòng</label>
                            <input type="text" name="txtPhong" class="form-control input-lg" readonly value="{{$pm->id_phong}}"/>
                        </div>
                        <div class="form-group">
                            <label>Số máy hoạt động</label>
                            <input type="number" name="nmMayhd" class="form-control input-lg" value="{{$pm->somayhd}}"/>
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
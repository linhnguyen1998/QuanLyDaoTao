@foreach($dotdk as $dk)
    <div id="edit-dot-Model-{{$dk->id}}" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Cập nhật đợt đăng ký</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <form action="admin/dotdk/edit/{{$dk->id}}" method="POST">
                        {{csrf_field()}}
                        <div class="form-group">
                            <label>Tên đợt</label>
                            <input type="text" name="txtTendot" class="form-control input-lg" readonly value="{{$dk->tendot}}"/>
                        </div>
                        <div class="form-group">
                            <label>Ngày bắt đầu đăng ký</label>
                            <input type="date" name="dtNgaybd" class="form-control input-lg" value="{{$dk->ngaybatdaudk}}"/>
                        </div>
                        <div class="form-group">
                            <label>Ngày kết thúc đăng ký</label>
                            <input type="date" name="dtNgaykt" class="form-control input-lg" value="{{$dk->ngayketthucdk}}"/>
                        </div>
                        <div class="form-group">
                            <label>Học kỳ</label>
                            <select class="form-control" name="Hocky" id="Hocky">
                                @foreach($hocky as $hk)
                                    <option
                                            @if($hk->id_hocky == $dk->id_hocky)
                                            {{"selected"}}
                                            @endif
                                            value="{{$hk->id_hocky}}">{{$hk->tenhocky}}</option>
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
@endforeach
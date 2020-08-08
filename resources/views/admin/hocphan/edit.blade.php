@foreach($hocphan as $hp)
    <div id="edit-hocphan-Model-{{$hp->id_hocphan}}" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Cập nhật học phần</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <form action="admin/hocphan/edit/{{$hp->id_hocphan}}" method="POST">
                        {{csrf_field()}}
                        <div class="form-group">
                            <label>Mã học phần </label>
                            <input type="text" name="txtMahocphan" id="txtHocphan" class="form-control input-lg" value="{{$hp->id_hocphan}}"/>
                        </div>
                        <div class="form-group">
                            <label>Tên học phần</label>
                            <input type="text" name="txtHocphan" id="txtHocphan" class="form-control input-lg" value="{{$hp->tenhocphan}}"/>
                        </div>
                        <div class="form-group">
                            <label>Số tín chỉ</label>
                            <input type="number" name="nmSotin" class="form-control input-lg" value="{{$hp->sotinchi}}"/>
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
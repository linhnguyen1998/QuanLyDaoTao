@foreach($lophoc as $lh)
<div id="edit-sinhvien-Model-{{$i}}{{$j}}{{$lh["tkb"]}}{{$lh["idhocky"]}}{{$lh["idphong"]}}{{$lh["ngaybd"]}}{{$lh["ngaykt"]}}" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">TKB</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <form action="admin/lop/create/sort/{{$lh["tkb"]}}" method="POST">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label>Tên học kỳ</label>
                        <select class="form-control" name="idHocky" id="idHocky">
                            @foreach($hocky as $hk)
                                <option
                                        @if($lh["idhocky"] == $hk->id_hocky)
                                        {{"selected"}}
                                        @endif
                                        value="{{$hk->id_hocky}}">{{$hk->tenhocky}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Phòng máy</label>
                        <select class="form-control" name="idPhong" id="idPhong">
                            @foreach($phong as $p)
                                <option
                                        @if($lh["idphong"] == $p->id_phong)
                                            {{"selected"}}
                                        @endif
                                        value="{{$p->id_phong}}"
                                >{{$p->id_phong}} - {{$p->somayhd}} máy hoạt động</option>
                            @endforeach
                        </select>
                    </div>
                    @if(Auth::check())
                        <input type="hidden" name="idGV" value="{{Auth::user()->id}}">
                    @endif
                    <div class="form-group">
                        <label>Ngày bắt đầu học phần</label>
                        <input type="date" name="dtNgaybd" class="form-control input-lg" value="{{$lh["ngaybd"]}}"/>
                    </div>
                    <div class="form-group">
                        <label>Ngày kết thúc học phần</label>
                        <input type="date" name="dtNgaykt" class="form-control input-lg" value="{{$lh["ngaykt"]}}"/>
                    </div>
                    <input type="hidden" name="idTKB" value="{{$lh["tkb"]}}">
                    <input type="hidden" name="idLop" value="{{$id_lop}}">
                    <input type="hidden" name="Thu" value="{{$i}}">
                    <input type="hidden" name="Ca" value="{{$j}}">
                    <button type="submit" class="btn btn-success" id="Them">Cập nhật</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
        </div>

    </div>
</div>
@endforeach

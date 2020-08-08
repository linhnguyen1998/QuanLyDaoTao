@extends('user.layout.index')

@section('content')
<div class="row">
    <div class="col-sm-12">
        <div class="card card">
            <div class="card-header" style="background-color: #87C889">
                <i class="fa fa-calendar"></i> ĐĂNG KÝ MÔN HỌC HỌC KỲ 1, 2019-2020
            </div>
            <div class="card-body">
                <div class="col-sm-3 col-sm-push-2">
                </div>
                <div class="col-sm-5">
                    <input type="text" name="" id="txtSearch" class="form-control" placeholder="Mã môn học, tên môn học, tên giảng viên,...">
                </div>

                <button class="btn btn-success" id="btn_search">Tìm kiếm</button>
            </div>
        </div>
    </div>
</div>

<!-- Chọn học phần -->
<div class="row">
    <div class="col-sm-9">
        <div class="card card">
            <div class="card-header bg-inverse">
                <i class="fa fa-calendar"></i> LỚP HỌC PHẦN ĐỀ XUẤT
            </div>
            <div class="card-body">
                <table class="table table-striped" >
                    <thead>
                    <tr>
                        <th>Mã nhóm</th>
                        <th>Học phần</th>
                        <th>Số TC</th>
                        <th>Giảng viên</th>
                        <th width="12%">Sĩ số</th>
                        <th>Ngày/Tiết học</th>
                        <th>Tuần học</th>
                        <th>Đăng ký</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($tkb as $row)
                    <tr>
                        <td>{{$row->id_lop}}</td>
                        <td>({{$row->lop->hocphan->id_hocphan}})<br>
                            {{$row->lop->hocphan->tenhocphan}}
                        </td>
                        <td>{{$row->lop->hocphan->sotinchi}}.0</td>
                        <td>{{$row->giangvien->hoten}}</td>
                        @foreach($listHP as $dk)
                            @if($dk["id_tkb"] == $row->id_tkb)
                        <td>
                            <div class="progress" style=" height: 25px">
                                <div class="progress-bar progress-bar-striped bg-danger" role="progressbar" style="width: {{$dk["demdk"] / $row->lop->sosv * 100}}%; color: black; font-weight: bold;" aria-valuenow="{{$dk["demdk"]}}" aria-valuemin="0" aria-valuemax="{{$row->lop->sosv}}">{{$dk["demdk"]}}/{{$row->lop->sosv}}</div>
                            </div>
                        </td>
                        <td>Thứ: {{$row->thu}}<br>
                            Ca: {{$row->ca}}</td>
                        <td>{{$dk["tuanhoc"]}}</td>
                        <td>
                                @if(Auth::check())
                                    <input type="hidden" name="txtMSSV" id="txtMSSV" value="{{Auth::user()->email}}">
                                @endif
                                    <input type="hidden" name="txtHocky" id="txtHocky" value="{{$row->id_hocky}}">
                                    <input type="hidden" name="txtTKB" id="txtTKB" value="{{$row->id_tkb}}">
                                @if( $dk["isDK"] == 1)
                                        <i class="text-success fa fa-check"></i>Đã đăng ký thành công
                                @elseif( $dk["isDK"] == 0)
                                        <a type="button" class="btn btn-success" onclick="sendData('{{$row->id_hocky}}', '{{$row->id_tkb}}')"  >Đăng ký</a>
                                @endif
                            @endif
                        @endforeach
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Đã đăng ký học phần -->
    <div class="col-sm-3">
        <div class="card card">
            <div class="card-header bg-inverse">
                <i class="fa fa-calendar"></i> KẾT QUẢ ĐĂNG KÝ
            </div>
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>lớp học phần</th>
                        <th>TKB</th>
                        <th>#</th>
                    </tr>
                    <tr>
                        <th colspan="3">Đợt đăng ký hiện tại</th>
                    </tr>
                    </thead>
                    <tbody id="ShowData">

                    </tbody>
                    {{csrf_field()}}
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script type="text/javascript">

            function removeHP($id)
        {
            var mssv = $("#txtMSSV").val();
            var hocky = $("#txtHocky").val();
            var _token = $('input[name="_token"]').val();
            $.post('user/sinhvien/dangky/a/b/delete/'+$id, {hocky:hocky ,mssv:mssv ,_token:_token},function (data) {
                $("#ShowData").html(data);
            });

            window.location.reload();
        }

        $(document).ready(function () {
            var hocky = $("#txtHocky").val();
            var mssv = $("#txtMSSV").val();
            $.get('user/sinhvien/dangky/'+hocky+'/'+mssv, function (data) {
                $("#ShowData").html(data);
            });

            // $("#sendData").click(function () {
            //     var hocky = $("#txtHocky").val();
            //     var thoikhoabieu = $("#txtTKB").val();
            //     var mssv = $("#txtMSSV").val();
            //     var _token = $('input[name="_token"]').val();
            //     $.post('user/sinhvien/dangky/'+hocky+'/sign', {hocky:hocky,thoikhoabieu:thoikhoabieu,mssv:mssv ,_token:_token}, function (data) {
            //         $("#ShowData").html(data);
            //     });
            //
            //     window.location.reload();
            // });


        });
    function sendData($id_hocky, $id_tkb) {
        var mssv = $("#txtMSSV").val();
        var _token = $('input[name="_token"]').val();
        $.post('user/sinhvien/dangky/'+$id_hocky+'/sign', {hocky:$id_hocky,thoikhoabieu:$id_tkb,mssv:mssv ,_token:_token}, function (data) {
            $("#ShowData").html(data);
        });
        window.location.reload();
    };


    </script>
@endsection
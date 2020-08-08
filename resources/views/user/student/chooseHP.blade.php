@extends('user.layout.index')

@section('content')
    <!-- Chọn học phần -->
    <div class="row">
        <div class="col-sm-12">
            <div class="card card">
                <div class="card-header bg-inverse">
                    <i class="fa fa-calendar"></i> LỚP HỌC PHẦN ĐỀ XUẤT
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                        <tr>
                            <td colspan="12">
                                <label>Học kỳ</label>
                                <select class="form-control" id="HocKy">
                                    @foreach($hocky as $hk)
                                    <option value="{{$hk->id_hocky}}">{{$hk->tenhocky}}</option>
                                    @endforeach
                                </select>
                                <hr style="color: yellow;">
                            </td>
                        </tr>
                        <tr>
                            <th>Đợt</th>
                            <th>Thời gian đăng ký</th>
                            <th>Quyền</th>
                            <th>#</th>
                        </tr>
                        </thead>
                        <tbody id="ShowData">
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script type="text/javascript">

        $(document).ready(function () {

            var idHocky = $("#HocKy").val();
            $.get('user/sinhvien/'+idHocky, function (data) {
                $("#ShowData").html(data);
            });


            $("#HocKy").change(function () {
                var idHocky = $(this).val();
                $.get('user/sinhvien/'+idHocky, function (data) {
                    $("#ShowData").html(data);
                });
            });
        });

    </script>
@endsection
@extends('admin.layout.index')

@section('content')
    <div class="breadcrumbs">
        <div class="col-sm-4">
            <div class="page-header float-left">
                <div class="page-title">
                    <h1>XẾP THỜI KHÓA BIỂU</h1>
                </div>
            </div>
        </div>
        <div class="col-sm-8">
            <div class="page-header float-right">
                <div class="page-title">
                    <ol class="breadcrumb text-right">
                        <li class="active">thời khóa biểu cho giảng viên</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="content mt-3">

        <div class="animated fadeIn">
            <div class="row">

                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title">Xếp TKB {{$id_lop}}</strong>
                        </div>
                        <div class="card-body">
                            @if(count($errors) > 0)
                                <div class="alert alert-danger">
                                    @foreach($errors->all() as $err)
                                        {{$err}}<br>
                                    @endforeach
                                </div>
                            @endif

                            @if(session('thongbao'))
                                <div class="alert alert-success">
                                    {{session('thongbao')}}
                                </div>
                            @endif
                            @if(session('loi'))
                                <div class="alert alert-danger">
                                    {{session('loi')}}
                                </div>
                            @endif
                                <table class="table table-bordered">
                                    <thead class="bg-info">
                                    <tr>
                                        <th>Giờ TH</th>
                                        <th colspan="2">Ca 1: 6g30-9g15 | Giải lao 15': 9g15-9g30 | Ca 2: 9g30-12g15</th>
                                        <th colspan="2">Ca 3: 12g30-15g15 | Giải lao 15': 15g15-15g30 | Ca 4: 15g30-18g15</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @for($i=2; $i<=8; $i++)
                                    <tr>
                                        <th>@if($i == 8)
                                                {{"Chủ nhật"}}
                                            @else
                                            Thứ {{$i}}
                                            @endif
                                        </th>
                                        @for($j=1; $j<=4; $j++)
                                        <td>
                                            @foreach($lophoc as $lh)
                                                @if($lh["thu"]== $i && $lh["ca"]== $j)
                                                    {{$lh["idlop"]}}<br>
                                                    <span style="font-weight: bold">{{$lh["tenhocphan"]}}</span><br>
                                                    Phòng: <span style="font-weight: bold">{{$lh["idphong"]}}</span> (Ca: {{$lh["ca"]}})<br>
                                                    Tuần học: <span style="font-weight: bold">{{$lh["tuanhoc"]}}</span><br>
                                                    <a class="btn btn-primary" data-toggle="modal" data-target="#edit-sinhvien-Model-{{$i}}{{$j}}{{$lh["tkb"]}}{{$lh["idhocky"]}}{{$lh["idphong"]}}{{$lh["ngaybd"]}}{{$lh["ngaykt"]}}"><i class="fa fa-edit"></i>Cập nhật</a>
                                                    <a class="btn btn-danger" href="admin/lop/create/sort/delete/{{$lh["tkb"]}}/lop/{{$lh["idlop"]}}"><i class="fa fa-edit"></i>Xóa</a>
                                                    @include('admin.tkb.cahoc')
                                                @endif
                                            @endforeach
                                                    <button class="btn btn-success" data-toggle="modal" data-target="#add-sinhvien-Model-{{$i}}{{$j}}">Chọn</button>
                                                    @include('admin.tkb.Choose')
                                        </td>
                                        @endfor
                                    @endfor
                                    </tbody>
                                </table>
                        </div>
                    </div>
                </div>


            </div>
        </div><!-- .animated -->

    </div>
@endsection


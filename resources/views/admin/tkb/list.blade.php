@extends('admin.layout.index')

@section('content')
    <div class="breadcrumbs">
        <div class="col-sm-4">
            <div class="page-header float-left">
                <div class="page-title">
                    <h1>QUẢN LÝ ĐĂNG KÝ LỊCH HỌC</h1>
                </div>
            </div>
        </div>
        <div class="col-sm-8">
            <div class="page-header float-right">
                <div class="page-title">
                    <ol class="breadcrumb text-right">
                        <li class="active">Lịch học</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="content mt-3">

        <div class="animated fadeIn">
            <div class="row">

{{--                @include('admin.tkb.add')--}}
{{--                @include('admin.tkb.edit')--}}


                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title">DANH SÁCH ĐĂNG KÝ LỊCH HỌC</strong>
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
{{--                            <button style="margin: 5px" type="button" class="btn btn-primary" data-toggle="modal" data-target="#add-phongmay-Model">--}}
{{--                                <span class="fa fa-plus-circle" aria-hidden="true"></span> Thêm--}}
{{--                            </button>--}}
                            <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                <thead>
                                <tr>
                                    <th>Tên giảng viên</th>
                                    <th>Tên học kỳ</th>
                                    <th>Tên lớp học</th>
                                    <th>Tên học phần</th>
                                    <th>Phòng máy</th>
                                    <th>Tuần học</th>
                                    <th>Thứ</th>
                                    <th>Ca</th>
                                    <th>Thao tác</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($tkb as $row)
                                <tr>
                                    <td>{{$row->giangvien->hoten}}</td>
                                    <td>{{$row->hocky->tenhocky}}</td>
                                    <td>{{$row->id_lop}}</td>
                                    <td>{{$row->lop->hocphan->tenhocphan}}</td>
                                    <td>{{$row->id_phong}}</td>
                                    <td>
                                        @foreach($th as $t)
                                            @if($row->id_tkb == $t["id_tkb"])
                                            {{$t["tuanhoc"]}}
                                            @endif
                                        @endforeach
                                    </td>
                                    <td>{{$row->thu}}</td>
                                    <td>{{$row->ca}}</td>
                                    <td>
                                        <a class="btn" href="admin/tkb/delete/{{$row->id_tkb}}"><i class="fa fa-trash">Xóa</i></a>
                                    </td>
                                </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>


            </div>
        </div><!-- .animated -->

    </div>
@endsection
@extends('admin.layout.index')

@section('content')
    <div class="breadcrumbs">
        <div class="col-sm-4">
            <div class="page-header float-left">
                <div class="page-title">
                    <h1>QUẢN LÝ ĐỢT ĐĂNG KÝ TKB</h1>
                </div>
            </div>
        </div>
        <div class="col-sm-8">
            <div class="page-header float-right">
                <div class="page-title">
                    <ol class="breadcrumb text-right">
                        <li class="active">Đợt đăng ký</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="content mt-3">

        <div class="animated fadeIn">
            <div class="row">

                @include('admin.dotdk.add')
                @include('admin.dotdk.edit')


                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title">DANH SÁCH ĐỢT ĐĂNG KÝ</strong>
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
                            <button style="margin: 5px" type="button" class="btn btn-primary" data-toggle="modal" data-target="#add-dot-Model">
                                <span class="fa fa-plus-circle" aria-hidden="true"></span> Thêm
                            </button>
                            <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                <thead>
                                <tr>
                                    <th>Tên đợt</th>
                                    <th>Ngày bắt đầu đăng ký</th>
                                    <th>Ngày kết thúc đăng ký</th>
                                    <th>Học kỳ</th>
                                    <th>Thao tác</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($dotdk as $dk)
                                <tr>
                                    <td>{{$dk->tendot}}</td>
                                    <td>{{$dk->ngaybatdaudk}}</td>
                                    <td>{{$dk->ngayketthucdk}}</td>
                                    <td>{{$dk->hocky->tenhocky}}</td>
                                    <td>
                                        <a class="btn" data-toggle="modal" data-target="#edit-dot-Model-{{$dk->id}}"><i class="fa fa-edit">Sửa</i></a>
                                        <a class="btn" href="admin/dotdk/delete/{{$dk->id}}"><i class="fa fa-trash">Xóa</i></a>
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
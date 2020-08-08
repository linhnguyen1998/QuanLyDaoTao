@extends('admin.layout.index')

@section('content')
    <div class="breadcrumbs">
        <div class="col-sm-4">
            <div class="page-header float-left">
                <div class="page-title">
                    <h1>QUẢN LÝ HỌC PHẦN</h1>
                </div>
            </div>
        </div>
        <div class="col-sm-8">
            <div class="page-header float-right">
                <div class="page-title">
                    <ol class="breadcrumb text-right">
                        <li class="active">Học phần</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="content mt-3">

        <div class="animated fadeIn">
            <div class="row">

                @include('admin.hocphan.add')
                @include('admin.hocphan.edit')


                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title">DANH SÁCH CÁC HỌC PHẦN</strong>
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
                            <button style="margin: 5px" type="button" class="btn btn-primary" data-toggle="modal" data-target="#add-hocphan-Model">
                                <span class="fa fa-plus-circle" aria-hidden="true"></span> Thêm
                            </button>
                            <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                <thead>
                                <tr>
                                    <th>Mã học phần</th>
                                    <th>Tên học phần</th>
                                    <th>Số tín chỉ</th>
                                    <th>Tổng số giờ</th>
                                    <th>Thao tác</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($hocphan as $hp)
                                <tr>
                                    <td>{{$hp->id_hocphan}}</td>
                                    <td>{{$hp->tenhocphan}}</td>
                                    <td>{{$hp->sotinchi}}</td>
                                    <td>{{$hp->tongsogio}} giờ</td>
                                    <td>
                                        <a class="btn" data-toggle="modal" data-target="#edit-hocphan-Model-{{$hp->id_hocphan}}"><i class="fa fa-edit">Sửa</i></a>
                                        <a class="btn" href="admin/hocphan/delete/{{$hp->id_hocphan}}"><i class="fa fa-trash">Xóa</i></a>
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
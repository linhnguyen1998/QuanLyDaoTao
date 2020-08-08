@extends('admin.layout.index')

@section('content')
    <div class="breadcrumbs">
        <div class="col-sm-4">
            <div class="page-header float-left">
                <div class="page-title">
                    <h1>QUẢN LÝ PHÒNG MÁY</h1>
                </div>
            </div>
        </div>
        <div class="col-sm-8">
            <div class="page-header float-right">
                <div class="page-title">
                    <ol class="breadcrumb text-right">
                        <li class="active">Phòng máy</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="content mt-3">

        <div class="animated fadeIn">
            <div class="row">

                @include('admin.phongmay.add')
                @include('admin.phongmay.edit')


                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title">DANH SÁCH PHÒNG MÁY</strong>
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
                            <button style="margin: 5px" type="button" class="btn btn-primary" data-toggle="modal" data-target="#add-phongmay-Model">
                                <span class="fa fa-plus-circle" aria-hidden="true"></span> Thêm
                            </button>
                            <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                <thead>
                                <tr>
                                    <th>Phòng</th>
                                    <th>Số máy hoạt động</th>
                                    <th>Thao tác</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($phongmay as $pm)
                                <tr>
                                    <td>{{$pm->id_phong}}</td>
                                    <td>{{$pm->somayhd}}</td>
                                    <td>
                                        <a class="btn" data-toggle="modal" data-target="#edit-phongmay-Model-{{$pm->id_phong}}"><i class="fa fa-edit">Sửa</i></a>
                                        <a class="btn" href="admin/phongmay/delete/{{$pm->id_phong}}"><i class="fa fa-trash">Xóa</i></a>
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
@extends('admin.layout.index')

@section('content')
    <div class="breadcrumbs">
        <div class="col-sm-4">
            <div class="page-header float-left">
                <div class="page-title">
                    <h1>QUẢN LÝ HỌC KỲ</h1>
                </div>
            </div>
        </div>
        <div class="col-sm-8">
            <div class="page-header float-right">
                <div class="page-title">
                    <ol class="breadcrumb text-right">
                        <li class="active">Học kỳ</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="content mt-3">

        <div class="animated fadeIn">
            <div class="row">

                @include('admin.hocky.add')
                @include('admin.hocky.edit')


                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title">DANH SÁCH CÁC HỌC KỲ</strong>
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
                            <button style="margin: 5px" type="button" class="btn btn-primary" data-toggle="modal" data-target="#add-hocky-Model">
                                <span class="fa fa-plus-circle" aria-hidden="true"></span> Thêm
                            </button>
                            <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Học kỳ</th>
                                    <th>Thao tác</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($hocky as $hk)
                                <tr>
                                    <td>{{$hk->id_hocky}}</td>
                                    <td>{{$hk->tenhocky}}</td>
                                    <td>
                                        <a class="btn" data-toggle="modal" data-target="#edit-hocky-Model-{{$hk->id_hocky}}"><i class="fa fa-edit">Sửa</i></a>
                                        <a class="btn" href="admin/hocky/delete/{{$hk->id_hocky}}"><i class="fa fa-trash">Xóa</i></a>
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
@extends('admin.layout.index')

@section('content')
    <div class="breadcrumbs">
        <div class="col-sm-4">
            <div class="page-header float-left">
                <div class="page-title">
                    <h1>TẠO LỚP</h1>
                </div>
            </div>
        </div>
        <div class="col-sm-8">
            <div class="page-header float-right">
                <div class="page-title">
                    <ol class="breadcrumb text-right">
                        <li class="active">lớp</li>
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
                            <strong class="card-title">Tạo lớp</strong>
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
                            <form href="admin/lop/create" method="post">
                                {{csrf_field()}}
                                <div class="form-group">
                                    <label>Tên học phần</label>
                                    <select class="form-control" name="idHocphan" id="idHocphan">
                                        <option>Vui lòng chọn tên học phần</option>
                                        @foreach($hocphan as $hp)
                                            <option value="{{$hp->id_hocphan}}">{{$hp->tenhocphan}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Số sinh viên</label>
                                    <input type="number" class="form-control" name="nmSosv" />
                                </div>
                                <div class="form-group">
                                    <label>Số ca trong tuần (3h/ca)</label>
                                    <input type="number" class="form-control" name="nmSoca" />
                                </div>
                                <button type="submit" class="btn btn-success">Tạo lớp</button>
                                <button type="reset" class="btn btn-info">Làm mới</button>
                            </form>
                        </div>
                    </div>
                </div>


            </div>
        </div><!-- .animated -->

    </div>
@endsection


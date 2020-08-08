<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="en">
<!--<![endif]-->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Đăng nhập Admin</title>
    <meta name="description" content="Sufee Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <base href="{{asset('')}}">

    <link rel="apple-touch-icon" href="admin_asset/apple-icon.png">
    <link rel="shortcut icon" href="admin_asset/favicon.ico">


    <link rel="stylesheet" href="admin_asset/vendors/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="admin_asset/vendors/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="admin_asset/vendors/themify-icons/css/themify-icons.css">
    <link rel="stylesheet" href="admin_asset/vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="admin_asset/vendors/selectFX/css/cs-skin-elastic.css">

    <link rel="stylesheet" href="admin_asset/assets/css/style.css">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>



</head>

<body class="bg-dark">


<div class="sufee-login d-flex align-content-center flex-wrap">
    <div class="container">
        <div class="login-content">
            <div class="login-logo">
                <a href="index.html">
                    <img class="align-content" src="admin_asset/images/login-quiz.png" alt=""><br>
                    <span>ĐÀO TẠO SINH VIÊN</span>
                </a>
            </div>
            <div class="login-form">
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
                <form action="user/login" method="post">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label>MSSV</label>
                        <input type="text" name="email" class="form-control" placeholder="mssv...">
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" name="password" class="form-control" placeholder="Password">
                    </div>
                    <button type="submit" class="btn btn-success btn-flat m-b-30 m-t-30">Đăng nhập</button>
                </form>
            </div>
        </div>
    </div>
</div>


<script src="admin_asset/vendors/jquery/dist/jquery.min.js"></script>
<script src="admin_asset/vendors/popper.js/dist/umd/popper.min.js"></script>
<script src="admin_asset/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="admin_asset/assets/js/main.js"></script>


</body>

</html>

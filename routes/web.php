<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('admin/login', 'GiangVienController@getLoginAdmin');
Route::post('admin/login', 'GiangVienController@postLoginAdmin');
Route::get('admin/logout', 'GiangVienController@getLogoutAdmin');

Route::group(['prefix'=>'admin', 'middleware'=>'adminlogin'], function () {

    //Học kỳ
    Route::group(['prefix' => 'hocky'], function () {

        Route::get('/list', 'HocKyController@getList');

        Route::post('/add', 'HocKyController@postAdd');

        Route::post('/edit/{id}', 'HocKyController@postEdit');

        Route::get('/delete/{id}', 'HocKyController@getDel');
    });

    //Đợt đk
    Route::group(['prefix' => 'dotdk'], function () {

        Route::get('/list', 'DotDangKyController@getList');

        Route::post('/add', 'DotDangKyController@postAdd');

        Route::post('/edit/{id}', 'DotDangKyController@postEdit');

        Route::get('/delete/{id}', 'DotDangKyController@getDel');
    });

    //Học phần
    Route::group(['prefix' => 'hocphan'], function () {

        Route::get('/list', 'HocPhanController@getList');

        Route::post('/add', 'HocPhanController@postAdd');

        Route::post('/edit/{id}', 'HocPhanController@postEdit');

        Route::get('/delete/{id}', 'HocPhanController@getDel');
    });

    //Phòng máy
    Route::group(['prefix' => 'phongmay'], function () {

        Route::get('/list', 'PhongMayController@getList');

        Route::post('/add', 'PhongMayController@postAdd');

        Route::post('/edit/{id}', 'PhongMayController@postEdit');

        Route::get('/delete/{id}', 'PhongMayController@getDel');
    });

    //Phòng máy
    Route::group(['prefix' => 'phongmay'], function () {

        Route::get('/list', 'PhongMayController@getList');

        Route::post('/add', 'PhongMayController@postAdd');

        Route::post('/edit/{id}', 'PhongMayController@postEdit');

        Route::get('/delete/{id}', 'PhongMayController@getDel');
    });

    //Sinh viên
    Route::group(['prefix' => 'sinhvien'], function () {

        Route::get('/list', 'SinhVienController@getList');

        Route::post('/add', 'SinhVienController@postAdd');

        Route::post('/edit/{id}', 'SinhVienController@postEdit');

        Route::get('/delete/{id}', 'SinhVienController@getDel');
    });

    //Giảng viên
    Route::group(['prefix' => 'giangvien'], function () {

        Route::get('/list', 'GiangVienController@getList');

        Route::post('/add', 'GiangVienController@postAdd');

        Route::post('/edit/{id}', 'GiangVienController@postEdit');

        Route::get('/delete/{id}', 'GiangVienController@getDel');
    });

    //Lịch học
    Route::group(['prefix' => 'tkb'], function () {

        Route::get('/list', 'ThoiKhoaBieuController@getList');

//        Route::post('/add', 'ThoiKhoaBieuController@postAdd');

        Route::post('/edit/{id}', 'ThoiKhoaBieuController@postEdit');

        Route::get('/delete/{id}', 'ThoiKhoaBieuController@getDel');
    });

    //Lớp
    Route::group(['prefix' => 'lop'], function () {
        Route::get('/create', 'LopController@getClass');
        Route::post('/create', 'LopController@makeClass');
        Route::post('/create/sort', 'LopController@sortSchel');
        Route::post('/create/sort/{id}', 'LopController@sortSchelEdit');
        Route::post('/create/sort/delete/{id}/lop/{lop}', 'LopController@sortSchelDel');
    });

});


Route::get('user/login', 'SinhVienController@getLoginAdmin');
Route::post('user/login', 'SinhVienController@postLoginAdmin');
Route::get('user/logout', 'SinhVienController@getLogoutAdmin');

Route::group(['prefix'=>'user', 'middleware'=>'userlogin'], function () {


    Route::get('/sinhvien','DangKyController@getHocKy');

    Route::get('/sinhvien/{id}','DangKyController@getDotDK');

    Route::get('/sinhvien/dangky/{id}','DangKyController@getLopHoc');

    Route::post('/sinhvien/dangky/{id}/sign','DangKyController@Sign');


    Route::get('/sinhvien/dangky/{idhocky}/{mssv}','DangKyController@GetDK');
    Route::post('/sinhvien/dangky/a/b/delete/{iddk}','DangKyController@HuyDK');

    Route::post('/search/dangky','DangKyController@searchData');
});
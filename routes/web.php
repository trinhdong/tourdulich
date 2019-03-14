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
use App\loaitour;
Route::get('/', function () {
	return view('public/admin/loaitin/danhsach');
});

// Route::get('thu',function(){
// 	return view('admin.dongtour.danhsach');
// });
Route::get('admin/dangnhap','UserController@DangNhapAdmin');
Route::post('admin/dangnhap','UserController@XuLyDangNhapAdmin');
Route::get('admin/logout','UserController@DangXuatAdmin');
    //
Route::group(['prefix'=>'admin','middleware'=>'adminLogin'],function(){
	Route::group(['prefix'=>'loaitour'],function(){
		//admin/loaitour/
		Route::get('danhsach','LoaitourController@getDanhSach');

		Route::get('them','LoaitourController@getThem');

		Route::get('sua/{id}','LoaitourController@getSua');

		Route::post('them','LoaitourController@XuLyThemLoaiTour');

		Route::post('sua/{id}','LoaitourController@XuLySuaLoaiTour');
		
		Route::get('xoa/{id}','LoaitourController@XuLyXoa');
	});

	Route::group(['prefix'=>'dongtour'],function(){
		Route::get('danhsach','DongtourController@getDanhSach');

		Route::get('them','DongtourController@getThem');

		Route::post('them','DongtourController@XuLyThemDongTour');

		Route::get('sua/{id}','DongtourController@getSua');

		Route::post('sua/{id}','DongtourController@XuLySuaDongTour');

		Route::get('xoa/{id}','DongtourController@XuLyXoa');

	});

	Route::group(['prefix'=>'tour'],function(){
		Route::get('danhsach','TourController@getDanhSach');

		Route::get('them','TourController@getThem');

		Route::post('them','TourController@XuLyThemTour');

		Route::get('sua/{id}','TourController@getSua');

		Route::post('sua/{id}','TourController@XuLySuaTour');

		Route::get('xoa/{id}','TourController@XuLyXoa');
	});

	Route::group(['prefix'=>'noiden'],function(){
		Route::get('danhsach','NoidenController@getDanhSach');	

		Route::get('them','NoidenController@getThem');

		Route::post('them','NoidenController@XuLyThemNoiDen');

		Route::get('sua/{id}','NoidenController@getSua');

		Route::post('sua/{id}','NoidenController@XuLySuaNoiDen');

		Route::get('xoa/{id}','NoidenController@XuLyXoa');
	});

	Route::group(['prefix'=>'slide'],function(){
		Route::get('danhsach','SlideController@getDanhSach');	

		Route::get('them','SlideController@getThem');

		Route::post('them','SlideController@XuLyThemSlide');

		Route::get('sua/{id}','SlideController@getSua');

		Route::post('sua/{id}','SlideController@XuLySuaSlide');

		Route::get('xoa/{id}','SlideController@XuLyXoa');
	});

	Route::group(['prefix'=>'user'],function(){
		Route::get('danhsach','UserController@getDanhSach');

		Route::get('them','UserController@getThem');

		Route::post('them','UserController@XuLyThemUser');

		Route::get('sua/{id}','UserController@getSua');

		Route::post('sua/{id}','UserController@XuLySuaUser');

		Route::get('xoa/{id}','UserController@XuLyXoa');
	});

	Route::group(['prefix'=>'hoadon'],function(){
		Route::get('danhsach','HoadonController@getDanhSach');

		Route::get('sua/{id}','HoadonController@getSua');
		
		// Route::post('sua/{id}','HoadonController@XulySuaHoaDon');

		Route::get('xoa/{id}','HoadonController@XuLyXoa');

		Route::get('danhsachxacnhan','HoadonController@getDanhsachdaxacnhan');
	});

	
	Route::group(['prefix'=>'ajax'],function(){
		Route::get('noiden/{idloaitour}','AjaxController@getNoiden');	
	});
});

Route::get('dattour/{id}','HoadonController@getHoadon');

Route::post('dattour/{id}','HoadonController@XuLyThemHoadon');

Route::group(['prefix'=>'ajax'],function(){
	Route::get('trangchu/{idloaitour}','AjaxController@getNoiden');	
});




Route::get('trangchu', 'PageController@trangchu');

Route::get('lienhe', 'PageController@lienhe');

Route::get('loaitour/{id}/{tenkhongdau}','PageController@loaitour');

Route::get('dongtour/{id}/{tenkhongdau}','PageController@dongtour');

Route::get('diadiem/{id}/{tenkhongdau}','PageController@diadiem');

Route::get('chitiettour/{id}/{tieudekhongdau}.html','PageController@chitiettour');

Route::get('timkiem','PageController@timkiem');


Route::get('database', function() {
    Schema::table('hoadon', function($table) {
        $table->string('tenkh');
            $table->string('email');
            $table->string('sodt');
            $table->string('diachi');
            $table->integer('tinhtrang')->default(0);
    });
});
Route::get('dangnhap','PageController@DangNhapUser');
Route::post('dangnhap','PageController@XuLyDangNhapUser');

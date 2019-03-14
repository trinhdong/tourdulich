<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\loaitour;
class LoaitourController extends Controller
{
    public function getDanhsach()
    {
    	$loaitour = loaitour::all();
    	return view('admin.loaitour.danhsach',['loaitour'=>$loaitour]);
    }
    public function getThem()
    {
    	return view('admin.loaitour.them');
    }

    public function XuLyThemLoaiTour(Request $request)
    {
    	// Kiểm tra dữ liệu đầu vào (không được rỗng, giới hạn của dữ liệu được nhập)
    	$this->validate($request,
    		[
    			'tenloaitour'=>'required|unique:loaitour,tenloaitour|min:3|max:100'
    			// Unique: Dữ liệu nhập vào không được trùng với dữ liệu hiện tại
    			// Cú pháp của unique:tên_bảng,tên_cột
    		],
    		[
    			'tenloaitour.required'=>'Bạn chưa nhập Tên Loại Tour!',
    			'tenloaitour.unique' => 'Tên Loại Tour đã tồn tại, vui lòng nhập lại!',
    			'tenloaitour.min'=>'Tên Loại Tour gồm ít nhất 3 ký tự!',
    			'tenloaitour.max'=>'Tên Loại Tour gồm tối đa 100 ký tự!'
    		]);


    	// Thêm dữ liệu vào CSDL, ở đây 1 record dữ liệu được xem như một đối tượng (object), vì ta sử dụng Eloquent nên tất cả các bảng trong CSDL đã được ánh xạ thành Model trong Laravel. Do đó dữ liệu mới được thêm vào bằng cách tạo 1 đối tượng mới.
    	
    	$loaitour = new loaitour;
    	$loaitour->tenloaitour = $request->tenloaitour;
        $loaitour->tenkhongdau = changeTitle($request->tenloaitour);
    	$loaitour->save();
    	return redirect('admin/loaitour/them')->with('thongbao','Thêm Thành Công');
    }

    public function getSua($id)
    {
    	$loaitour = loaitour::find($id);
    	return view('admin.loaitour.sua',['loaitour'=>$loaitour]);
    }
    public function XuLySuaLoaiTour(Request $request,$id)
    {
    	$loaitour = loaitour::find($id);
    	$this->validate($request,
    		[
    			'tenloaitour'=>'required|unique:loaitour,tenloaitour|min:3|max:100'
    		],
    		[
    			'tenloaitour.required'=>'Bạn chưa nhập Tên Loại Tour!',
    			'tenloaitour.unique' => 'Tên Loại Tour đã tồn tại, vui lòng nhập lại!',
    			'tenloaitour.min'=>'Tên Loại Tour gồm ít nhất 3 ký tự!',
    			'tenloaitour.max'=>'Tên Loại Tour gồm tối đa 100 ký tự!'
    		]);
    	$loaitour->tenloaitour = $request->tenloaitour;
        $loaitour->tenkhongdau = changeTitle($request->tenloaitour);
    	$loaitour->save();
    	return redirect('admin/loaitour/sua/'.$id)->with('thongbao','Cập Nhật Thành Công');
    }

    public function XuLyXoa($id)
    {
    	$loaitour = loaitour::find($id);
    	$loaitour->delete();
    	return redirect('admin/loaitour/danhsach')->with('thongbao','Xóa Thành Công');
    }
}

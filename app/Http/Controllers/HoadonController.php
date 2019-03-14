<?php 

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\hoadon;
use App\tour;

class HoadonController extends Controller
{
	public function getDanhsach()
	{
		// $hoadon = hoadon::all();
    $hoadon = hoadon::where('tinhtrang',0)->get();
		return view('admin.hoadon.danhsach',['hoadon'=>$hoadon]);
	}
  public function getDanhsachdaxacnhan()
  {
    $hoadon = hoadon::where('tinhtrang',1)->get();
    return view('admin.hoadon.hoadondaxacnhan',['hoadon'=>$hoadon]);
  }

	public function getHoadon($id)
    {
    	$tour=tour::find($id);
		return view('pages.dattour',['tour'=>$tour]);
    }


	public function XuLyThemHoadon(Request $request, $id)
	{
		$tour=tour::find($id);
		//Kiểm tra dữ liệu đầu vào (không được rỗng, giới hạn của dữ liệu được nhập)
    	$this->validate($request,
    		[
    			'tenkh'=>'required|min:3|max:100',
                'email'=>'required|email|unique:hoadon,email',
                'sodt'=>'required|min:10|max:11',
                'diachi'=>'required|min:3|max:100'
    			// Unique: Dữ liệu nhập vào không được trùng với dữ liệu hiện tại
    			// Cú pháp của unique:tên_bảng,tên_cột
            ],
            [
               'tenkh.required' => 'Bạn chưa nhập họ tên!',
               'tenkh.min' => 'Họ tên gồm tối thiểu 3 ký tự!',
               'tenkh.max' => 'Họ tên không được vượt quá 100 ký tự!',
               'email.required' => 'Bạn chưa nhập địa chỉ Email!',
               'email.email' => 'Bạn chưa nhập đúng định dạng Email!',
               'email.unique' => 'Địa chỉ Email đã tồn tại!',
               'sodt.required' => 'Bạn chưa nhập số điện thoai!',
               'sodt.min' => 'Số điện thoại gồm tối thiểu 10 ký tự!',
               'sodt.max' => 'Số điện thoại không được vượt quá 11 ký tự!',
               'diachi.min' => 'Địa chỉ gồm tối thiểu 5 ký tự!',
               'diachi.max' => 'Địa chỉ thoại không được vượt quá 100 ký tự!'
           ]);

    	
    	

    	$hoadon = new hoadon();
    	$hoadon->tenkh=$request->tenkh;
    	$hoadon->email=$request->email;
    	$hoadon->sodt=$request->sodt;
    	$hoadon->diachi=$request->diachi;
    	$hoadon->idtour=$request->idtour;
    	$hoadon->tinhtrang=0;
      $hoadon->soluong=$request->soluong;
      $hoadon->tongtien=$request->giatour*$request->soluong;

    	$hoadon->save();

    	return redirect('dattour/'.$id)->with('thongbao','Bạn đã đặt tour thành công! Nhân viên sẽ liên hệ bạn để xác nhận hóa đơn!');

	}

	public function getSua($id)
    {
    	$hoadon = hoadon::find($id);
      $hoadon->tinhtrang=1;
      $hoadon->save();
    	return redirect('admin/hoadon/danhsach');
    }

    // public function XulySuaHoaDon(Request $request, $id)
    // {
    // 	$hoadon=hoadon::find($id);

    // 	//Kiểm tra dữ liệu đầu vào (không được rỗng, giới hạn của dữ liệu được nhập)
    // 	$this->validate($request,
    // 		[
    // 			'tenkh'=>'required|min:3|max:100',
    //             'email'=>'required|email',
    //             'sodt'=>'required|min:10|max:11',
    //             'diachi'=>'required|min:3|max:100'
    // 			// Unique: Dữ liệu nhập vào không được trùng với dữ liệu hiện tại
    // 			// Cú pháp của unique:tên_bảng,tên_cột
    //         ],
    //         [
    //            'tenkh.required' => 'Bạn chưa nhập họ tên!',
    //            'tenkh.min' => 'Họ tên gồm tối thiểu 3 ký tự!',
    //            'tenkh.max' => 'Họ tên không được vượt quá 100 ký tự!',
    //            'email.required' => 'Bạn chưa nhập địa chỉ Email!',
    //            'email.email' => 'Bạn chưa nhập đúng định dạng Email!',
    //            'sodt.required' => 'Bạn chưa nhập số điện thoai!',	
    //            'sodt.min' => 'Số điện thoại gồm tối thiểu 10 ký tự!',
    //            'sodt.max' => 'Số điện thoại không được vượt quá 11 ký tự!',
    //            'diachi.min' => 'Địa chỉ gồm tối thiểu 5 ký tự!',
    //            'diachi.max' => 'Địa chỉ thoại không được vượt quá 100 ký tự!'
    //        ]);


    // 	$hoadon->tenkh=$request->tenkh;
    // 	$hoadon->email=$request->email;
    // 	$hoadon->sodt=$request->sodt;
    // 	$hoadon->diachi=$request->diachi;
    // 	$hoadon->idtour=$request->idtour;
    // 	$hoadon->tinhtrang=$request->tinhtrang;
     

    // 	$hoadon->save();

    // 	return redirect('admin/hoadon/sua/'.$id)->with('thongbao','Cập Nhật thành công!');
    // }

     public function XuLyXoa($id)
    {
    	$hoadon = hoadon::find($id);
    	$hoadon->delete();
    	return redirect('admin/hoadon/danhsach')->with('thongbao','Xóa Thành Công');
    }
	
}
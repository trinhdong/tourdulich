<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
class UserController extends Controller
{
    public function getDanhsach()
    {
    	$user = user::all();
    	return view('admin.user.danhsach',['user'=>$user]);
    }
    public function getThem()
    {

    	return view('admin.user.them');
    }

    public function XuLyThemUser(Request $request)
    {
    	// Kiểm tra dữ liệu đầu vào (không được rỗng, giới hạn của dữ liệu được nhập)
    	$this->validate($request,
    		[
    			'tenuser'=>'required|unique:users,name|min:3|max:100',
                'tenemail'=>'required|email|unique:users,email',
                'matkhau'=>'required|min:3|max:32',
                'nhaplaimatkhau'=>'required|same:matkhau'
    			// Unique: Dữ liệu nhập vào không được trùng với dữ liệu hiện tại
    			// Cú pháp của unique:tên_bảng,tên_cột
            ],
            [
               'tenuser.required' => 'Bạn chưa nhập Tên tài khoản!',
               'tenuser.min' => 'Tên tài khoản gồm tối thiểu 3 ký tự!',
               'tenuser.unique' => 'Tài khoản đã tồn tại',
               'tenuser.max' => 'Tên tài khoản không được vượt quá 100 ký tự!',
               'tenemail.required' => 'Bạn chưa nhập địa chỉ Email!',
               'tenemail.email' => 'Bạn chưa nhập đúng định dạng Email!',
               'tenemail.unique' => 'Địa chỉ Email đã tồn tại!',
               'matkhau.required' => 'Bạn chưa nhập mật khẩu!',
               'matkhau.min' => 'Mật khẩu gồm tối thiểu 3 ký tự!',
               'matkhau.max' => 'Mật khẩu không được vượt quá 32 ký tự!',
               'nhaplaimatkhau.required' => 'Bạn chưa xác nhận mật khẩu!',
               'nhaplaimatkhau.same' => 'Mật khẩu xác nhận chưa khớp với mật khẩu đã nhập!'
           ]);


    	$user = new User;
        $user->name = $request->tenuser;
        $user->email = $request->tenemail;
        $user->password = bcrypt($request->matkhau);
        $user->quyen = $request->quyen;

        $user->save();
        return redirect('admin/user/them')->with('thongbao','Thêm thành công!');
    }

    public function getSua($id)
    {
    	$user = User::find($id);
    	return view('admin.user.sua',['user'=>$user]);
    }
    public function XuLySuaUser(Request $request,$id)
    {
    	$user = user::find($id);
    	// Kiểm tra dữ liệu đầu vào (không được rỗng, giới hạn của dữ liệu được nhập)
        $this->validate($request,
            [
                'tenuser'=>'required|min:3|max:100',

            ],
            [
                'tenuser.required' => 'Bạn chưa nhập Tên tài khoản!',
                'tenuser.min' => 'Tên tài khoản gồm tối thiểu 3 ký tự!',
                'tenuser.max' => 'Tên tài khoản không được vượt quá 100 ký tự!',
                
            ]);

        $user->name = $request->tenuser;
        

        if($request->has('matkhau'))
        {
            
            $this->validate($request,
                [
                    'matkhau'=>'required|min:3|max:32',
                    'nhaplaimatkhau'=>'required|same:matkhau'
                ],
                [
                    'matkhau.required' => 'Bạn chưa nhập mật khẩu!',
                    'matkhau.min' => 'Mật khẩu gồm tối thiểu 3 ký tự!',
                    'matkhau.max' => 'Mật khẩu không được vượt quá 32 ký tự!',
                    'nhaplaimatkhau.required' => 'Bạn chưa xác nhận mật khẩu!',
                    'nhaplaimatkhau.same' => 'Mật khẩu xác nhận chưa khớp với mật khẩu đã nhập!'
                ]);
            $user->password = bcrypt($request->matkhau);
        }
        $user->quyen = $request->quyen;
        $user->save();
        return redirect('admin/user/sua/'.$id)->with('thongbao','Cập Nhật thành công!');
    }

    public function XuLyXoa($id)
    {
    	$user = user::find($id);
    	$user->delete();
    	return redirect('admin/user/danhsach')->with('thongbao','Xóa Thành Công');
    }

    public function DangNhapAdmin()
    {
        return view('admin.login');
    }

    public function XuLyDangNhapAdmin(Request $request)
    {
        $this->validate($request,
            [
                'email' => 'required',
                'pws' => 'required|min:3|max:32'
            ],
            [
                'email.required' => 'Bạn chưa nhập Địa chỉ Email!',
                'pws.required' => 'Bạn chưa nhập Mật khẩu!',
                'pws.min' => 'Mật Khẩu gồm tối thiểu 3 ký tự!',
                'pws.max' => 'Mật Khẩu gồm tối đa 32 ký tự!'
            ]);
        if(Auth::attempt(['email' => $request->email, 'password' => $request->pws]))
            return redirect('admin/loaitour/danhsach');
        else
            return redirect('admin/dangnhap')->with('thongbao','Đăng Nhập không thành công!');
    }

    public function DangXuatAdmin(){
        Auth::logout();
        return redirect('admin/dangnhap');
    }
}

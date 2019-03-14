<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Loaitour;
use App\noiden;
use App\Tour;
use App\dongtour;
class PageController extends Controller
{

	public function trangchu()
	{
		return view('pages.trangchu');
	}
	public function lienhe()
	{
		return view('pages.lienhe');
	}

	public function chitiettour($id)
	{
		$tour = tour::find($id);
		$tournoibat = tour::where('noibat',1)->take(4)->get();
		$tourlienquan = tour::where('idnoiden',$tour->idnoiden)->take(4)->get();
		return view('pages.chitiettour',['tourct'=>$tour,'tournoibat'=>$tournoibat,'tourlienquan'=>$tourlienquan]);
	}

	public function loaitour($id)
	{
		$loaitour = loaitour::find($id);		
		
		return view('pages.loaitour',['lt'=>$loaitour]);
	}

	public function dongtour($id)
	{
		$dongtour = dongtour::find($id);		
		
		return view('pages.dongtour',['dt'=>$dongtour]);
	}

	public function diadiem($id)
	{
		$noiden = noiden::find($id);		
		
		return view('pages.diadiem',['nd'=>$noiden]);
	}

	public function timkiem(Request $request)
	{
		$noiden = $request->noiden;
		$dongtour=$request->dongtour;
		$giatour = $request->gia;

		if($giatour==1)
		{
			$gia = tour::whereBetween('giatour', [0, 1000]);
		}
		elseif ($giatour==2) {
			$gia = tour::whereBetween('giatour', [1000, 5000]);
		}
		else
		{
			$gia = tour::where('giatour','>','5000');	
		}
		if($noiden && $dongtour)
		{
			$timkiem = tour::where('idnoiden',$noiden)->where('iddongtour',$dongtour)->take(5)->simplePaginate(1);
		}
		elseif($noiden && $dongtour && $giatour)
		{
			$timkiem = $gia->where('idnoiden',$noiden)->where('iddongtour',$dongtour)->take(5)->simplePaginate(5);
		}
		elseif($dongtour && $giatour)
		{
			$timkiem = $gia->where('iddongtour',$dongtour)->take(5)->simplePaginate(5);
		}
		elseif($noiden && $giatour)
		{
			$timkiem = $gia->where('idnoiden',$noiden)->take(5)->simplePaginate(5);
		}
		elseif($noiden)
		{
			$timkiem = tour::where('idnoiden',$noiden)->take(5)->simplePaginate(5);
		}
		elseif($dongtour)
		{
			$timkiem = tour::where('iddongtour',$dongtour)->take(5)->simplePaginate(5);
		}
		elseif($giatour)
		{
			$timkiem = $gia->take(5)->simplePaginate(5);
		}
		else
		{
			$timkiem = "";
		}
		return view('pages.timkiem',['timkiem'=>$timkiem]);	
	}



	public function DangNhapUser()
	{
		return view('login');
	}

    // public function XuLyDangNhapUser(Request $request)
    // {
    //     $this->validate($request,
    //         [
    //             'email' => 'required',
    //             'pws' => 'required|min:3|max:32'
    //         ],
    //         [
    //             'email.required' => 'Bạn chưa nhập Địa chỉ Email!',
    //             'pws.required' => 'Bạn chưa nhập Mật khẩu!',
    //             'pws.min' => 'Mật Khẩu gồm tối thiểu 3 ký tự!',
    //             'pws.max' => 'Mật Khẩu gồm tối đa 32 ký tự!'
    //         ]);
    //     if(Auth::attempt(['email' => $request->email, 'password' => $request->pws]))
    //         return redirect('loaitour/danhsach');
    //     else
    //         return redirect('dangnhap')->with('thongbao','Đăng Nhập không thành công!');
    // }

    // public function DangXuatUser(){
    //     Auth::logout();
    //     return redirect('dangnhap');
    // }

}

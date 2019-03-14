<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\loaitour;
use App\noiden;
use App\dongtour;
use App\tour;
class TourController extends Controller
{
    public function getDanhsach()
    {
        $tour = tour::orderBy('id','DESC')->get();
    	return view('admin.tour.danhsach',['tour'=>$tour]);
    }
    public function getThem()
    {
        $loaitour = loaitour::all();
        $noiden = noiden::all();
        $dongtour = dongtour::all();
    	return view('admin.tour.them',['loaitour'=>$loaitour,'noiden'=>$noiden,'dongtour'=>$dongtour]);
    }

    public function XuLyThemTour(Request $request)
    {
        $this->validate($request,[
            // 'loaitour'=>'required',
            // 'noiden'=>'required',
            // 'dongtour'=>'required',
            'tentour'=>'required|min:3|unique:tour,tentour',
            'tieude'=>'required|unique:tour,tieude',
            'ngaybatdau'=>'required',
            'ngayketthuc'=>'required',
            'thoigian'=>'required|min:3|max:20',
            'phuongtien'=>'required|min:1|max:100',
            'noidung'=>'required',
            'hinh'=>'image|mimes:jpeg,jpg,png|max:1000'
        ],[
            'loaitour.required'=>'Bạn chưa chọn loại tour',
            'noiden.required'=>'Bạn chưa chọn nơi đến',
            'dongtour.required'=>'Bạn chưa chọn dòng tour',
            'tentour.min'=>'Tên tour có ít nhất 3 ký tự',
            'tentour.unique'=>'Tên tour không được trùng',
            'tieude.unique'=>'Tiêu đề tour không được trùng',
            'ngaybatdau.required'=>'Bạn chưa chọn ngày bắt đầu',
            'ngayketthuc.required'=>'Bạn chưa chọn ngày kết thúc',
            'thoigian.min'=>'Thời gian có ít nhất 3 ký tự',
            'thoigian.max'=>'Thời gian không quá 20 ký tự',
            'thoigian.required'=>'Bạn chưa nhập thời gian',
            'phuongtien.min'=>'Phương tiện có ít nhất 1 ký tự',
            'phuongtien.required'=>'Bạn chưa nhập phương tiện',
            'noidung.required'=>'Bạn chưa nhập nội dung',
            'hinh.mimes'=>'Sai định dạng hình',
            'hinh.max'=>'Sai kích thước hình'

        ]);

        $tour = new tour;
        $tour->tentour=$request->tentour;
        $tour->tieude=$request->tieude;
        $tour->tieudekhongdau = changeTitle($request->tieude);
        $tour->idnoiden=$request->tennoiden;
        $tour->iddongtour=$request->tendongtour;
        $tour->noidung=$request->noidung;
        $tour->ngaybatdau=$request->ngaybatdau;
        $tour->ngayketthuc=$request->ngayketthuc;
        $tour->thoigian=$request->thoigian;
        $tour->phuongtien=$request->phuongtien;
        $tour->giatour=$request->giatour;
        $tour->noibat=$request->noibat;
        $tour->luotxem=0;
        if($request->hasFile('hinh'))
        {   
            $file = $request->file('hinh');
            $duoi = $file->getClientOriginalExtension();
            if($duoi != 'jpg' && $duoi != 'png' && $duoi != 'jpeg')
            {
                return redirect('admin/slide/them')->with('loi','Bạn chọn sai định dạng file');
            }
            $name = $file->getClientOriginalName();
             $hinh=str_random(4)."_".$name;
            while (file_exists("img/tour/".$hinh)) {
                $hinh=str_random(4)."_".$name;
            }
            $file->move("img/tour/",$hinh);
            $tour->hinh=$hinh;
        }
        // else
        // {
        //     $hinh->hinh = "";   
        // }

        $tour->save();
        return redirect('admin/tour/them')->with('thongbao','Thêm tour thành công!');

    }
    public function getSua($id)
    {
        $loaitour = loaitour::all();
        $noiden = noiden::all();
        $dongtour = dongtour::all();
        $tour = tour::find($id);
        return view('admin.tour.sua',['tour'=>$tour,'loaitour'=>$loaitour,'noiden'=>$noiden,'dongtour'=>$dongtour]);
    }

    public function XuLySuaTour(Request $request,$id)
    {
        $tour=tour::find($id);
        $this->validate($request,[
            'tentour'=>'required|min:3',
            'ngaybatdau'=>'required',
            'ngayketthuc'=>'required',
            'thoigian'=>'required|min:3|max:20',
            'phuongtien'=>'required|min:1|max:100',
            'giatour'=>'required',
            'noidung'=>'required',
            'hinh'=>'image|mimes:jpeg,jpg,png|max:1000'
        ],[
            'loaitour.required'=>'Bạn chưa chọn loại tour',
            'noiden.required'=>'Bạn chưa chọn nơi đến',
            'dongtour.required'=>'Bạn chưa chọn dòng tour',
            
            'tentour.min'=>'Tên tour có ít nhất 3 ký tự',
            'ngaybatdau.required'=>'Bạn chưa chọn ngày bắt đầu',
            'ngayketthuc.required'=>'Bạn chưa chọn ngày kết thúc',
            'thoigian.min'=>'Thời gian có ít nhất 3 ký tự',
            'thoigian.max'=>'Thời gian không quá 20 ký tự',
            'thoigian.required'=>'Bạn chưa nhập thời gian',
            'phuongtien.min'=>'Phương tiện có ít nhất 1 ký tự',
            'phuongtien.required'=>'Bạn chưa nhập phương tiện',
            'noidung.required'=>'Bạn chưa nhập nội dung',
            'hinh.mimes'=>'Sai định dạng hình',
            'hinh.max'=>'Sai kích thước hình'

        ]);

        $tour->tentour=$request->tentour;
        $tour->tieude = $request->tieude;
        $tour->tieudekhongdau = changeTitle($request->tieude);
        $tour->idnoiden=$request->tennoiden;
        $tour->iddongtour=$request->tendongtour;
        $tour->noidung=$request->noidung;
        $tour->ngaybatdau=$request->ngaybatdau;
        $tour->ngayketthuc=$request->ngayketthuc;
        $tour->thoigian=$request->thoigian;
        $tour->phuongtien=$request->phuongtien;
        $tour->giatour=$request->giatour;
        $tour->noibat=$request->noibat;
        $tour->luotxem=0;
        if($request->hasFile('hinh'))
        {   
            $file = $request->file('hinh');

            $name = $file->getClientOriginalName();
             $hinh=str_random(4)."_".$name;
            while (file_exists("img/tour/".$hinh)) {
                $hinh=str_random(4)."_".$name;
            }
            $file->move("img/tour/",$hinh);
            unlink('img/tour/'.$tour->hinh);
            $tour->hinh=$hinh;
        }
     
        $tour->save();
        return redirect('admin/tour/sua/'.$id)->with('thongbao','Cập nhật thành công!');
    }

    public function XuLyXoa($id)
    {
        $tour=tour::find($id);
        $tour->delete();
        return redirect('admin/tour/danhsach')->with('thongbao','Xóa thành công!');
    }
}

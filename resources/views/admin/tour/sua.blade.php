@extends('admin.layouts.index')

@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Tour
                    <small> {{$tour->tentour}}</small>
                </h1>
            </div>
            <!-- /.col-lg-12 -->
            <div class="col-lg-7" style="padding-bottom:120px">
                @if (count($errors)>0)                                                           

                <div class="alert alert-danger">
                    @foreach ($errors -> all() as $err)
                    {{$err}}<br>
                    @endforeach
                </div>

                @endif

                @if(session('thongbao'))
                <div class="alert alert-success">
                    {{session('thongbao')}}
                </div>
                @endif

                <form action="admin/tour/sua/{{$tour->id}}" method="POST" enctype="multipart/form-data"> <!-- Form bắt buộc phải có thuộc tính enctype thì mới up được file lên -->                          

                    <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                    <div class="form-group">
                        <p><label>Tên tour</label></p>
                        <input type="text" class="form-control input-width" name="tentour" placeholder="Nhập Tên Nơi Đến" value="{{$tour->tentour}}" />
                        <p><label>Tên tour</label></p>
                        <input type="text" class="form-control input-width" name="tieude" placeholder="Nhập Tiêu Đề" value="{{$tour->tieude}}" />
                        <label>Chọn loại tour</label>
                        <select name="tenloaitour" id="loaitour" class="form-control" required="required">
                            @foreach ($loaitour as $lt)
                            <option
                            @if($tour->noiden->loaitour->id == $lt->id)
                            {{'selected'}}
                            @endif

                            value="{{$lt->id}}">{{$lt->tenloaitour}}</option>
                            @endforeach
                        </select>
                        <label>Chọn nơi đến</label>
                        <select name="tennoiden" id="noiden" class="form-control" required="required">
                            @foreach ($noiden as $nd)
                            <option
                            @if($tour->noiden->id == $nd->id)
                            {{'selected'}}
                            @endif
                            value="{{$nd->id}}">{{$nd->tennoiden}}</option>
                            @endforeach
                        </select>
                        <label>Chọn dòng tour</label>
                        <select name="tendongtour" id="dongtour" class="form-control" >
                            @foreach ($dongtour as $dt)
                            <option value="{{$dt->id}}">{{$dt->tendongtour}}</option>
                            @endforeach
                        </select>

                    </div>
                    <div class="form-group">
                        <p><label>Nội dung</label></p>
                        <textarea name="noidung" id="demo" class="form-control ckeditor" rows="3" >{{$tour->noidung}}</textarea>
                    </div>
                    <div class="form-group">
                        <p><label>Ngày bắt đầu</label></p>                               
                        <input type="date" name="ngaybatdau" id="inputNgaybatdau" class="form-control" value="{{$tour->ngaybatdau}}">

                    </div>
                    <div class="form-group">
                        <p><label>Ngày kết thúc</label></p>                               
                        <input type="date" name="ngayketthuc" id="inputNgayketthuc" class="form-control" value="{{$tour->ngayketthuc}}">

                    </div>
                    <div class="form-group">
                        <p><label>Thời gian</label></p>                               
                        <input type="text" name="thoigian" class="form-control" placeholder="Nhập thời gian" value="{{$tour->thoigian}}" >

                    </div>

                    <div class="form-group">
                        <p><label>Phương tiện</label></p>                               
                        <input type="text" name="phuongtien" id="inputPhuongtien" class="form-control" placeholder="nhập phương tiện" value="{{$tour->phuongtien}}" >

                    </div>
                    <div class="form-group">
                        <p><label>Giá tour</label></p>                               
                        <input type="text" name="giatour" id="inputPhuongtien" class="form-control" placeholder="Nhập giá" value="{{$tour->giatour}}" >

                    </div>
                    <div class="form-group">
                        <p><label>Hình</label></p>
                        <p>
                            <img width="400px" src="img/tour/{{$tour->hinh}}" class="img-responsive" alt="Image">
                        </p>
                        <input type="file" name="hinh" id="input" class="form-control" value="{{$tour->hinh}}">
                    </div>

                    <div class="form-group">
                        <p><label>Nổi bật</label></p>
                        <div class="radio">
                            <label>
                                <input type="radio" name="noibat" id="input" value="0" 
                                @if($tour->noibat == 0)
                                {{'checked'}}
                                @endif
    
                                >
                                Không
                            </label>
                            <label>
                                <input type="radio" name="noibat" id="input" value="1" @if($tour->noibat == 1)
                                {{'checked'}}
                                @endif
                                >
                                Có
                            </label>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-default">Cập Nhật</button>
                    <button type="reset" class="btn btn-default btn-mleft">Nhập Lại</button>
                    <form>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->
        @endsection

        @section('script')
        <script>
            $(document).ready(function(){
                $("#loaitour").change(function(){
                    var idloaitour = $(this).val();
                    $.get("admin/ajax/noiden/"+idloaitour,function(data){
                        $("#noiden").html(data);
                    })
                });

            });
        </script>

        @endsection
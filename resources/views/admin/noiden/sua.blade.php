@extends('admin.layouts.index')

@section('content')
<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Nơi đến
                            <small> {{$noiden->tennoiden}}</small>
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

                        <form action="admin/noiden/sua/{{$noiden->id}}" method="POST" enctype="multipart/form-data"> <!-- Form bắt buộc phải có thuộc tính enctype thì mới up được file lên -->                          
                            
                            <input type="hidden" name="_token" value="{{csrf_token()}}"/>

                            <div class="form-group">
                                <p><label>Tên nơi đến</label></p>
                                <input type="text" class="form-control input-width" name="tennoiden" placeholder="Nhập Tên Nơi Đến" value="{{$noiden->tennoiden}}" />
                            </div>

                            <div class="form-group">
                                <p><label>Chọn loại tour</label></p>                               
                                                                 
                                    <select name="tenloaitour" id="idloaitour" class="form-control" required="required">

                                        @foreach ($loaitour as $lt)
                                           
                                            <option  
                                            @if ($noiden->idloaitour == $lt->id)
                                                {{'selected'}}
                                            @endif
                                            value="{{$lt->id}}">{{$lt->tenloaitour}}</option>
                                            option
                                        @endforeach
                                    </select>
                                
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
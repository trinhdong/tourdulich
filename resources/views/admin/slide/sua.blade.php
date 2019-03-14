@extends('admin.layouts.index')

@section('content')
<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Slide
                            <small> {{$slide->tenslide}}</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    <div class="col-lg-7" style="padding-bottom:120px">
                        @if(count($errors)>0)

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
                        <form action="admin/slide/sua/{{$slide->id}}" method="POST" enctype="multipart/form-data"> <!-- Form bắt buộc phải có thuộc tính enctype thì mới up được file lên -->
                            <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                            
                            <div class="form-group">
                                <p><label>Tên</label></p>
                                <input type="text" class="form-control input-width" name="tenslide" placeholder="Nhập Tên" value="{{$slide->tenslide}}" />
                            </div>
                            <div class="form-group">
                                <p><label>Hình</label></p>
                                <img width="400px" src="img/slide/{{$slide->hinh}}" class="img-responsive" alt="Image">
                                <input type="file" class="form-control input-width" name="hinh"  />
                            </div>
                            <div class="form-group">
                                <p><label>Nội dung</label></p>
                                <input type="text" class="form-control input-width" name="noidung" placeholder="Nhập nội dung" value="{{$slide->noidung}}" />
                            </div>
                            <div class="form-group">
                                <p><label>Link</label></p>
                                <input type="text" class="form-control input-width" name="link" placeholder="Nhập link" value="{{$slide->link}}" />
                            </div>

                            

                            <button type="submit" class="btn btn-default">Cập Nhật </button>
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
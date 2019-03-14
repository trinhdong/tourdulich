@extends('admin.layouts.index')

@section('content')
<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Dòng tour
                            <small> Thêm</small>
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
                        <form action="admin/dongtour/them" method="POST" enctype="multipart/form-data"> <!-- Form bắt buộc phải có thuộc tính enctype thì mới up được file lên -->
                            <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                            
                            <div class="form-group">
                                <p><label>Tên dòng tour</label></p>
                                <input type="text" class="form-control input-width" name="tendongtour" placeholder="Nhập Tên Dòng Tour" value="" />
                            </div>

                            

                            <button type="submit" class="btn btn-default">Thêm</button>
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
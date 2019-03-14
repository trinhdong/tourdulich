@extends('admin.layouts.index')

@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">User
                    <small> {{$user->name}}</small>
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
                <form action="admin/user/sua/{{$user->id}}" method="POST" enctype="multipart/form-data"> <!-- Form bắt buộc phải có thuộc tính enctype thì mới up được file lên -->
                    <input type="hidden" name="_token" value="{{csrf_token()}}"/>

                    <div class="form-group">
                        <p><label>Tên User</label></p>
                        <input type="text" class="form-control input-width" name="tenuser" placeholder="Nhập Tên User" value="{{$user->name}}" />
                    </div>
                    <div class="form-group">
                        <p><label>Tên Email</label></p>
                        <input type="email" class="form-control input-width" name="tenemail" placeholder="Nhập Tên Email" value="{{$user->email}}" readonly="" />
                    </div>
                    <div class="form-group">
                        <input type="checkbox" id="changePassword" name="ChangePassword" value="">
                        <label>Đổi mật khẩu</label>
                        <p><label>Mật Khẩu</label></p>
                        <input type="password" class="form-control input-width password" name="matkhau" placeholder="Nhập Mật Khẩu"  disabled="" />
                    </div>
                    <div class="form-group">
                        <p><label>Nhập Lại Mật Khẩu</label></p>
                        <input type="password" class="form-control input-width password" name="nhaplaimatkhau" placeholder="Nhập Lại Mật Khẩu"  disabled="" " />
                    </div>
                    <div class="form-group">
                        <p><label>Quyền</label></p>
                        <div class="radio">

                            <label>
                                <input type="radio" name="quyen" value="0"
                                @if($user->quyen == 0)
                                {{'checked'}}
                                @endif

                                >
                                Khách hàng
                            </label>
                            <label>
                                <input type="radio" name="quyen" value="1" 
                                @if($user->quyen == 1)
                                {{'checked'}}
                                @endif
                                >

                                Admin
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
                $("#changePassword").change(function(){
                    if($(this).is(":checked"))
                    {
                        $(".password").removeAttr('disabled');

                    }
                    else
                    {
                        $(".password").attr('disabled','');
                    }
                });
            });
        </script>
        @endsection
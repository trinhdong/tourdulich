@extends('layouts.index')
@section('content')
@include('layouts.menu')

<!-- Home -->

<div class="home">
	<div class="background_image" style="background-image:url(images/contact.jpg)"></div>
</div>

<!-- Search -->

@include('layouts.timkiem')

<!-- Contact -->

<div class="contact">
	<div class="container">
		<div class="row">

			<!-- Get in touch -->
			<div class="col-lg-6">
				<div class="contact_content">
					<div class="contact_title">{{$tour->tentour}}</div>
					<div class="contact_text">
						<img style="height: 350px ;width: 700px" class="img-fluid" src="img/tour/{{$tour->hinh}}" alt="">
					</div>
					<div class="contact_list">
						<div class="row tour-info-right-frame1">
							<div class="col">
								<div class="row" style="margin-bottom: 22px;margin-top: 30px">
									<div class="col-md-4 col-sm-4 col-xs-5 text-dark">Mã tour:</div>
									<div class="col-md-8 col-sm-8 col-xs-7">NNSGN93041-016-021218EK-H</div>
								</div>
								<div class="row">
									<div class="col-md-4 col-sm-4 col-xs-5 mg-10 text-dark">Khởi hành:</div>
									<div class="col-md-4 col-sm-3 col-xs-7">{{$tour->ngaybatdau}}</div>

								</div>
								<div class="row" style="margin-top: 15px">
									<div class="col-md-4 col-sm-4 col-xs-5 mg-10 text-dark">Kết thúc:</div>
									<div class="col-md-4 col-sm-5 col-xs-12">{{$tour->ngayketthuc}}</div>
								</div>
								<div class="row" style="margin-top: 15px">
									<div class="col-md-4 col-sm-4 col-xs-5 mg-bot15 text-dark">Nơi khởi hành:</div>
									<div class="col-md-3 col-sm-3 col-xs-7"> Hồ Chí Minh</div>
									<div class="col-md-5 col-sm-5 col-xs-12  mg-bot15 text-dark">
										<span>Thời gian: {{$tour->thoigian}}</span>
									</div>
								</div>
								<div class="row" style="margin-top: 15px">
									<div class="col-md-4 col-sm-4 col-xs-5 text-dark">Dòng tour:</div>
									<div class="col-md-8 col-sm-8 col-xs-7">{{$tour->dongtour->tendongtour}}</div>
								</div>

								<hr>
								<div style="font-size: 18px;margin-bottom: 5px;color:#e82c0c;border-bottom: 1px solid #ccc;padding-bottom: 5px;margin-top: 3px;float: left;">
									<span id = "" itemprop="price"><h2>{{$tour->giatour}}Đ</h2></span><span>&nbsp;</span>
								</div> 
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- Contact Form -->


			<div class="col-lg-6">
				<div class="contact_title">THÔNG TIN LIÊN LẠC</div>
				<div class="contact_form_container">
					{{-- Kiểm tra điều kiện nhập của khách hàng --}}
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
					
					<form action="dattour/{{$tour->id}}" method="POST" class="contact_form">

						<input type="hidden" name="_token" value="{{csrf_token()}}"/>

						<div style="margin-bottom: 18px">
							<input name="tenkh" type="text" class="contact_input contact_input_name inpt" placeholder="Họ tên" required="required"><div class="input_border"></div>
						</div>
						<div class="row">
							<div class="col-lg-6" style="margin-bottom: 18px">
								<div>
									<input name="email" type="text" class="contact_input contact_input_email inpt" placeholder="Email" required="required"><div class="input_border"></div></div>
								</div>
								<div class="col-lg-6" style="margin-bottom: 18px">
									<div>
										<input name="sodt" type="text" class="contact_input contact_input_phone inpt" placeholder="Số điện thoai" required="required"><div class="input_border"></div></div>
									</div>
								</div>
								<div style="margin-bottom: 18px">
									<input name="diachi" type="text" class="contact_input contact_input_name inpt" placeholder="Địa chỉ" required="required"><div class="input_border"></div>
								</div>
								<div style="margin-bottom: 18px">
									<input name="soluong" type="text" id="soluong" class="contact_input contact_input_name inpt" placeholder="Số Lượng" required="required" onkeyup="myFunction()"><div class="input_border"></div>
								</div>
								<input type="hidden" name="giatour" id="giatour" value="{{$tour->giatour}}">


								<div style="margin-bottom: 18px">
									
								</div><input name="idtour" type="hidden" readonly="" class="contact_input contact_input_name inpt" value="{{$tour->id}}" required="required">
								<div class="input_border"></div></div>
								<div style="font-weight: bolder;color:black;font-size: 30px">Tổng tiền :<span id="tongtien"></span></div>	


								<button type="submit" class="contact_button">Đặt ngay</button>
								
							</form>
						</div>	
					</div>
				</div>
			</div>
		</div>

		<!-- Map -->

		<div class="contact_map">
			<!-- Google Map -->
			<div class="map">
				<div id="google_map" class="google_map">
					<div class="map_container">
						<div id="map"></div>
					</div>
				</div>
			</div>
		</div>
		@endsection
		<script>
			function myFunction() {
				var sl = $("#soluong").val();
				var gia = $("#giatour").val();
				var kq = sl*gia;
				$("#tongtien").html(kq + "Đ	");
			}
		</script>
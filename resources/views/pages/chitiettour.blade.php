@extends('layouts.index')
@section('content')
@include('layouts.menu')

<!-- Home -->

<div class="home">
	<div class="background_image" style="background-image:url(images/about.jpg)"></div>
</div>

<!-- Search -->

@include('layouts.timkiem')

<!-- About -->




<!-- Page Content -->
<div class="container">

	<!-- Portfolio Item Heading -->
	<h1 class="my-4">{{$tourct->tentour}}
	</h1>
	<hr>
	<!-- Portfolio Item Row -->
	<div class="row">

		<div class="col-md-8	">
			<img style="height: 350px ;width: 700px" class="img-fluid" src="img/tour/{{$tourct->hinh}}" alt="">
			<div  class="content" style="padding-top:45px">
				<h3>Nội Dung Tour</h3>
				{!!$tourct->noidung!!}
			</div>
		</div>

		<div class="col-md-4">
			<div class="row tour-info-right-frame1">
				<div class="col-xs-12">
					<div class="row" style="margin-bottom: 22px;margin-top: 30px">
						<div class="col-md-4 col-sm-4 col-xs-5">Mã tour:</div>
						<div class="col-md-8 col-sm-8 col-xs-7">NNSGN93041-016-021218EK-H</div>
					</div>
					<div class="row">
						<div class="col-md-4 col-sm-4 col-xs-5 mg-10">Khởi hành:</div>
						<div class="col-md-4 col-sm-3 col-xs-7">{{$tourct->ngaybatdau}}</div>
						
					</div>
					<div class="row" style="margin-top: 15px">
						<div class="col-md-4 col-sm-4 col-xs-5 mg-10">Kết thúc:</div>
						<div class="col-md-4 col-sm-5 col-xs-12">{{$tourct->ngayketthuc}}</div>
					</div>
					<div class="row" style="margin-top: 15px">
						<div class="col-md-4 col-sm-4 col-xs-5 mg-bot15">Nơi khởi hành:</div>
						<div class="col-md-3 col-sm-3 col-xs-7"> Hồ Chí Minh</div>
						<div class="col-md-5 col-sm-5 col-xs-12  mg-bot15">
							<span>Thời gian: {{$tourct->thoigian}}</span>
						</div>
					</div>
					<div class="row" style="margin-top: 15px">
						<div class="col-md-4 col-sm-4 col-xs-5">Dòng tour:</div>
						<div class="col-md-8 col-sm-8 col-xs-7">{{$tourct->dongtour->tendongtour}}</div>
					</div>

					<hr>
					
				</div>
			</div>
			
			<div class="col-xs-12 text-center hidden-xs">
				<div style="font-size: 18px;margin-bottom: 5px;color:#e82c0c;border-bottom: 1px solid #ccc;padding-bottom: 5px;margin-top: 3px;float: left;">
					<span itemprop="price">{{$tourct->giatour}}</span><span>&nbsp;</span>đ                                    </div>
					<a href="dattour/{{$tourct->id}}"><button type="button" class="btn btn-success" style="float: left;margin-left: 20px;width: 200px">Đặt Tour</button></a>
				</div>
				
			</div>
			
		</div>
		<!-- /.row -->
		
		<!-- Related Projects Row -->
		<h3 class="my-4">Tour Nổi Bật</h3>

		<div class="row">
			@foreach ($tournoibat as $t)
			<div class="col-md-3 col-sm-6 mb-4">
				<a href="chitiettour/{{$t->id}}/{{$t->tieudekhongdau}}.html">
					
					{{-- expr --}}
					
					<img style="height: 180px;" class="img-fluid" src="img/tour/{{$t->hinh}}" alt="">
					<div>
						<a style="list-style: none; color: black;font-size: 20px" href="chitiettour/{{$t->id}}">{{$t->tieudekhongdau}}</a>
					</div>
				</a>
			</div>
			@endforeach
		</div>
		<h3 class="my-4">Tour Liên Quan</h3>

		<div class="row">
			@foreach ($tourlienquan as $t)
			<div class="col-md-3 col-sm-6 mb-4">
				<a href="chitiettour/{{$t->id}}/{{$t->tieudekhongdau}}.html">
					
					<img style="height: 180px;" class="img-fluid" src="img/tour/{{$t->hinh}}" alt="">
					<div>
						<a style="list-style: none; color: black;font-size: 20px" href="chitiettour/{{$t->id}}">{{$t->tieudekhongdau}}</a>
					</div>
				</a>
			</div>
			@endforeach
		</div>

		<!-- /.row -->

	</div>
	<!-- /.container -->
	<div class="why">
		<div class="parallax_background parallax-window" data-parallax="scroll" data-image-src="images/why.jpg" data-speed="0.8"></div>
		<div class="container">
			<div class="row">
				<div class="col text-center">
					<div class="section_subtitle">simply amazing places</div>
					<div class="section_title"><h2>Why choose us?</h2></div>
				</div>
			</div>
			<div class="row why_row">

				<!-- Why item -->
				<div class="col-lg-4 why_col">
					<div class="why_item">
						<div class="why_image">
							<img src="images/why_1.jpg" alt="">
							<div class="why_icon d-flex flex-column align-items-center justify-content-center">
								<img src="images/why_1.svg" alt="">
							</div>
						</div>
						<div class="why_content text-center">
							<div class="why_title">Fast Services</div>
							<div class="why_text">
								<p>Pellentesque sit amet elementum ccumsan sit amet mattis eget, tristique at leo.</p>
							</div>
						</div>
					</div>
				</div>

				<!-- Why item -->
				<div class="col-lg-4 why_col">
					<div class="why_item">
						<div class="why_image">
							<img src="images/why_2.jpg" alt="">
							<div class="why_icon d-flex flex-column align-items-center justify-content-center">
								<img src="images/why_2.svg" alt="">
							</div>
						</div>
						<div class="why_content text-center">
							<div class="why_title">Great Team</div>
							<div class="why_text">
								<p>Pellentesque sit amet elementum ccumsan sit amet mattis eget, tristique at leo.</p>
							</div>
						</div>
					</div>
				</div>

				<!-- Why item -->
				<div class="col-lg-4 why_col">
					<div class="why_item">
						<div class="why_image">
							<img src="images/why_3.jpg" alt="">
							<div class="why_icon d-flex flex-column align-items-center justify-content-center">
								<img src="images/why_3.svg" alt="">
							</div>
						</div>
						<div class="why_content text-center">
							<div class="why_title">Best Deals</div>
							<div class="why_text">
								<p>Pellentesque sit amet elementum ccumsan sit amet mattis eget, tristique at leo.</p>
							</div>
						</div>
					</div>
				</div>

			</div>
		</div>
	</div>

	<!-- Team -->

@endsection
@section('css')
	<link rel="stylesheet" type="text/css" href="http://www.shieldui.com/shared/components/latest/css/light-glow/all.min.css" />
	<style>
	.pb-product-details-ul {
		list-style-type: none;
		padding-left: 0;
		color: black;
	}

	.pb-product-details-ul > li {
		padding-bottom: 5px;
		font-size: 15px;
	}

	#gradient {
		/* Permalink - use to edit and share this gradient: http://colorzilla.com/gradient-editor/#feffff+0,ddf1f9+31,a0d8ef+62 */
		background: #feffff; /* Old browsers */
		background: -moz-linear-gradient(left, #feffff 0%, #ddf1f9 31%, #a0d8ef 62%); /* FF3.6-15 */
		background: -webkit-linear-gradient(left, #feffff 0%,#ddf1f9 31%,#a0d8ef 62%); /* Chrome10-25,Safari5.1-6 */
		background: linear-gradient(to right, #feffff 0%,#ddf1f9 31%,#a0d8ef 62%); /* W3C, IE10+, FF16+, Chrome26+, Opera12+, Safari7+ */
		filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#feffff', endColorstr='#a0d8ef',GradientType=1 ); /* IE6-9 */
		border: 1px solid #f2f2f2;
		padding: 20px;
	}

	#hits {
		border-right: 1px solid white;
		border-left: 1px solid white;
		vertical-align: middle;
		padding-top: 15px;
		font-size: 17px;
		color: white;
	}

	#fan {
		vertical-align: middle;
		padding-top: 15px;
		font-size: 17px;
		color: white;
	}

	.pb-product-details-fa > span {
		padding-top: 20px;
	}
</style>
@endsection	
@section('script')
<script type="text/javascript" src="http://www.shieldui.com/shared/components/latest/js/shieldui-all.min.js"></script>
<script type="text/javascript">
	jQuery(function ($) {
		$(".tabs_div").shieldTabs();
	});
</script>
@endsection
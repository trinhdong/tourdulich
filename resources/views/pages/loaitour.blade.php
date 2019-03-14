@extends('layouts.index')
@section('content')
@include('layouts.menu')

<!-- Home -->

<div class="home">
	<div class="background_image" style="background-image:url(images/destinations.jpg)"></div>
</div>

<!-- Search -->

@include('layouts.timkiem')

<!-- Destinations -->

<div class="destinations" id="destinations">
	<div class="container">
		<div class="row">
			<div class="col text-center">
				<div class="section_subtitle">simply amazing places</div>
				<div class="section_title"><h2>Popular Destinations</h2></div>
			</div>
		</div>
		<div class="row destination_sorting_row">
			<div class="col">
				<div class="destination_sorting d-flex flex-row align-items-start justify-content-start">
					<div class="sorting">
						<ul class="item_sorting">
							<li>
								<span class="sorting_text">Sort By</span>
								<i class="fa fa-chevron-down" aria-hidden="true"></i>
								<ul>
									<li class="product_sorting_btn" data-isotope-option='{ "sortBy": "original-order" }'><span>Show All</span></li>
									<li class="product_sorting_btn" data-isotope-option='{ "sortBy": "price" }'><span>Price</span></li>
									<li class="product_sorting_btn" data-isotope-option='{ "sortBy": "name" }'><span>Name</span></li>
								</ul>
							</li>
							<li>
								<span class="sorting_text">Categories</span>
								<i class="fa fa-chevron-down" aria-hidden="true"></i>
								<ul>
									<li class="num_sorting_btn"><span>Category</span></li>
									<li class="num_sorting_btn"><span>Category</span></li>
									<li class="num_sorting_btn"><span>Category</span></li>
								</ul>
							</li>
						</ul>
					</div>
					<div class="sort_box ml-auto"><i class="fa fa-th" aria-hidden="true"></i></div>
				</div>
			</div>
		</div>
		<div class="row destinations_row">
			<div class="col">
				<div class="destinations_container item_grid">

					
					
					@foreach ($lt->tour as $t)

					<div class="destination item">
						<div class="destination_image">
							<img width="360px" height="262px" src="img/tour/{{$t->hinh}}" alt="">
							
						</div>
						<div class="destination_content">
							<div class="destination_title"><a href="chitiettour/{{$t->id}}/{{$t->tieudekhongdau}}.html">{{$t->tentour}}</a></div>
							<div class="destination_subtitle"><p>{{$t->noiden->loaitour->tenloaitour}}</p></div>
							<div class="destination_price">From {{$t->giatour}}$</div>
							<div class="destination_list">
								<ul>
									<li>Thời gian: {{$t->thoigian}}</li>
									<li>Phương tiện: {{$t->phuongtien}}</li>
								</ul>
							</div>
						</div>
					</div>
					@endforeach
					

				

				</div>
			</div>
		</div>
		<div class="row load_more_row">
			<div class="col">
				<div class="button load_more_button"><a href="#">load more</a></div>
			</div>
		</div>
	</div>
</div>

@endsection



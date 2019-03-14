<div class="home_search">
	<div class="container">
		<div class="row">
			<div class="col">
				<div class="home_search_container">
					<div class="home_search_title">Tìm kiếm tour</div>
					<div class="home_search_content">
						<form action="timkiem" method="GET" class="home_search_form" id="home_search_form" enctype="multipart/form-data">
							<div class="d-flex flex-lg-row flex-column align-items-start justify-content-lg-between justify-content-start">
								{{ csrf_field() }}
								{{-- <input type="hidden" name="_token" value="{{csrf_token()}}"/> --}}
								<select name="loaitour" id="loaitour" class="search_input search_input_1" id="loaitour">
									<option value="">Loại tour</option>
									@foreach ($loaitour as $lt)
									<option value="{{$lt->id}}">{{$lt->tenloaitour}}</option>
									@endforeach
								</select>
								
								<select name="noiden" id="noiden" class="search_input search_input_3" id="noiden">
									<option value="">Nơi đến</option>
									@foreach ($noiden as $nd)
									<option value="{{$nd->id}}">{{$nd->tennoiden}}</option>
									@endforeach
								</select>
								<select name="dongtour" id="dongtour" class="search_input search_input_4">
									<option value="">Dòng tour</option>
									@foreach ($dongtour as $dt)
									<option value="{{$dt->id}}">{{$dt->tendongtour}}</option>
									@endforeach
								</select>
								<select name="gia" id="gia" class="search_input search_input_2">
									<option value="">Giá</option>
									<option value="1">Dưới 1tr</option>
									<option value="2">1-5tr</option>
									<option value="3">trên 5tr</option>
								</select>
								
								<button class="home_search_button btn btn-secondary" onclick = "return checkSearch('loaitour')">Tìm Kiếm</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>


@section('script')
<script>
	$(document).ready(function(){
		$("#loaitour").change(function(){
			var idloaitour = $(this).val();
			$.get("ajax/trangchu/"+idloaitour,function(data){
				$("#noiden").html(data);
			});                  	                	
		});                          
	});

	function checkSearch(id) {
        loaitour = $('#' + id).val();
        if (loaitour > 0) {
            return true;
        }
        else {
            alert('Bạn cần chọn nơi loại tour');
            return false;
        };
    }

</script>

@endsection
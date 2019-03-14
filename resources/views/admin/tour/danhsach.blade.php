@extends('admin.layouts.index')

@section('content')
<div id="page-wrapper">
	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header">Tour <small>List</small></h1>
			@if(session('thongbao'))
			<div class="alert alert-success">
				{{session('thongbao')}}
			</div>
			@endif
		</div>
		<!-- /.col-lg-12 -->
	</div>
	<!-- /.row -->
	<div class="row">
		<div class="col-lg-12">
			<div class="panel panel-default">
{{-- 				<div class="panel-heading">
					DataTables Advanced Tables
				</div> --}}
				<!-- /.panel-heading -->
				<div class="panel-body">
					<table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
						<thead>
							<tr>
								<th>ID</th>
								<th>Tên tour</th>
								<th>Tên loại tour</th>
								<th>Tên nơi đến</th>
								<th>Tên dòng tour</th>
								{{-- <th>Nội dung</th> --}}
								<th>Ngày bắt đầu</th>
								<th>Ngày kết thúc</th>
								{{-- <th>Thời gian</th> --}}
								<th>Phương tiện</th>
								<th>Giá</th>
								<th>Thời Gian</th>
								{{-- <th>Lịch trình</th> --}}
								<th>Hình</th>
								<th>Lượt xem</th>
								<th>Nổi bật</th>
								<th>Tác vụ</th>
							</tr>
						</thead>
						<tbody>
							@foreach ($tour as $t)
							<tr class="odd gradeX">
								<td>{{$t->id}}</td>
								<td>{{$t->tentour}}</td>
								<td>{{$t->noiden->loaitour->tenloaitour}}</td>
								<td>{{$t->noiden->tennoiden}}</td>
								<td>{{$t->dongtour->tendongtour}}</td>
								{{-- <td>{{$t->ndtomtat}}</td> --}}
								<td>{{$t->ngaybatdau}}</td>
								<td>{{$t->ngayketthuc}}</td>
								<td>{{$t->phuongtien}}</td>
								<td>{{$t->giatour}}</td>
								<td>{{$t->thoigian}}</td>
								<td><img width="100px" src="img/tour/{{$t->hinh}}" class="img-responsive" alt="Image"></td>
								<td>{{$t->luotxem}}</td>
								<td>@if($t->noibat == 0){{'không'}}@else {{'có'}} @endif</td>
								<td class="center">
									<a href="admin/tour/xoa/{{$t->id}}" style="list-style: none;"><button type="button" data-toggle="tooltip" title="" class="btn btn-danger" data-original-title="Xoá"><i class="fa fa-trash-o"></i>
									</button>
									<a href="admin/tour/sua/{{$t->id}}" data-toggle="tooltip" title="" class="btn btn-primary" data-original-title="Sửa" aria-describedby="tooltip478219"><i class="fa fa-pencil"></i></a>
								</td>
							</tr>
							@endforeach
						</tbody>
					</table>
					<!-- /.table-responsive -->

				</div>
				<!-- /.panel-body -->
			</div>
			<!-- /.panel -->
		</div>
		<!-- /.col-lg-12 -->
	</div>
	<!-- /.row -->

</div>
<!-- /#page-wrapper -->

@endsection
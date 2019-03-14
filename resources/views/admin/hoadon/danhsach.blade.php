@extends('admin.layouts.index')

@section('content')
<div id="page-wrapper">
	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header">Hóa đơn <small>List</small></h1>
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
								<th>Tên KH</th>
								<th>Email</th>
								<th>Số ĐT</th>
								<th>Địa chỉ</th>
								<th>ID tour</th>
								<th>Số lượng</th>
								<th>Tổng tiền</th>
								
								<th>Tình trạng</th>
								<th>Tác vụ</th>
							</tr>
						</thead>
						<tbody>
							@foreach ($hoadon as $hd)
							<tr class="odd gradeX">
								<td>{{$hd->id}}</td>
								<td>{{$hd->tenkh}}</td>
								<td>{{$hd->email}}</td>
								<td>{{$hd->sodt}}</td>
								<td>{{$hd->diachi}}</td>
								<td>{{$hd->idtour}}</td>
								<td>{{$hd->soluong}}</td>
								<td>{{$hd->tongtien}}</td>
								<td>
									@if ($hd->tinhtrang==0)
									{{'Chờ xác nhận'}}
									@else
									{{"Đã xác nhận"}}
									@endif
								</td>
								<td class="center">
									<a href="admin/hoadon/xoa/{{$hd->id}}" style="list-style: none;"><button type="button" data-toggle="tooltip" title="" class="btn btn-danger" data-original-title="Xoá"><i class="fa fa-trash-o"></i>
									</button></a>
									<a href="admin/hoadon/sua/{{$hd->id}}" data-toggle="tooltip" title="" class="btn btn-primary" data-original-title="Sửa" aria-describedby="tooltip478219"><i class="fa fa-check" style="font-size:18px"></i></a>
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
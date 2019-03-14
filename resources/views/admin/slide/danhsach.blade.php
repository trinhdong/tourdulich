@extends('admin.layouts.index')

@section('content')
<div id="page-wrapper">
	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header">Slide <small>List</small></h1>
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
								<th>Tên</th>
								<th>Hình</th>
								<th>Nội dung</th>
								<th>Link</th>
								<th>Tác Vụ</th>
							</tr>
						</thead>
						<tbody>
							@foreach ($slide as $sl)

							<tr class="odd gradeX">
								<td>{{$sl->id}}</td>
								<td>{{$sl->tenslide}}</td>
								<td><img width="450px"src="img/slide/{{$sl->hinh}}" class="img-responsive" alt="Image"></td>
								<td>{{$sl->noidung}}</td>		
								<td>{{$sl->link}}</td>
								<td class="center">
									<a href="admin/slide/xoa/{{$sl->id}}" style="list-style: none;"><button type="button" data-toggle="tooltip" title="" class="btn btn-danger" data-original-title="Xoá"><i class="fa fa-trash-o"></i>
									</button>
									<a href="admin/slide/sua/{{$sl->id}}" data-toggle="tooltip" title="" class="btn btn-primary" data-original-title="Sửa" aria-describedby="tooltip478219"><i class="fa fa-pencil"></i></a>
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
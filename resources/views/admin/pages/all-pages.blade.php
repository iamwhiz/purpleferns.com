@extends('admin.layouts.app')
@section('title', 'All Pages')
@section('content')

<div class="col-lg-12 grid-margin stretch-card">
	<div class="card">
		<div class="card-body">
			<h4 class="card-title">{{$title}}</h4>
			<div class="table-responsive">
				<table id="imm_allproducts" class="table table-striped table-hover table-bordered">
					<thead>
						<tr>
							<th>Title</th>
							<!--th>Seo Description</th>
							<th>Seo Keywords</th-->
							<th>Action</th>
						</tr>
					</thead>
					<tbody></tbody>
				</table>
			</div>
		</div>
	</div>
</div>
@endsection 

@section('custom-js')
<script>
$(document).ready(function() {
    $('#imm_allproducts').DataTable(   {
    	"order": [[ 1, "desc" ]],
			"processing": true,
			"serverSide": true,
			 "bPaginate": true,
			"ajax": {
				"url": "{{ route('admin.all-pages') }}",
				"type": "POST",
				"data": {"_token": "{{ csrf_token() }}"}
			} ,
			"columns": [
				{ "data": "page_name" },
				{ "data": "id" ,
					"searchable": false,
					"sortable": false,
					"render": function (id) {
								return '<a href="edit-page/'+id+'"><i class="fa fa-pencil"></i></a> &nbsp; <a href="delete-page/'+id+'"><i class="fa fa-close"></i></a>';
								
							} 
				}
			] 
	} );
} );
</script>
@endsection
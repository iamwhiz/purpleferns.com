@extends('admin.layouts.app')
@section('title', 'All Attribute')
@section('content')

<div class="col-lg-12 grid-margin stretch-card">
	<div class="card">
		<div class="card-body">
			<h4 class="card-title">{{$title}}</h4>
			<div class="table-responsive">
				<table id="imm_allproducts" class="table table-striped table-hover table-bordered">
					<thead>
						<tr>
							<th>Attribute Name</th>
							<th>Attribute Slug</th>
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

    	dom: 'lifrtp',
			// language: {
			// "infoFiltered": "",
			// processing: '<i class="fa fa-spinner fa-spin fa-3x fa-fw"></i><span class="sr-only">Loading...</span>'
			// },
    	   // "order": [[ 4, "desc" ]],
    	   
			"processing": true,
			"serverSide": true,
			
		
			"ajax": {
				"url": "{{ route('admin.list-attributes') }}",
				"type": "POST",
				"data": {"_token": "{{ csrf_token() }}"}
			} ,
			"columns": [
				{ "data": "attribute_name" },
				{ "data": "attribute_slug"},
				
				
			
				{ "data": "id" ,
					"searchable": false,
					"sortable": false,
					"render": function (id) {
								return '<a href="edit-attribute/'+id+'"><i class="fa fa-pencil"></i></a> &nbsp; <a href="delete-attribute/'+id+'"><i class="fa fa-close"></i></a>';
							} 
				}
			] 
	} );
} );
</script>
@endsection
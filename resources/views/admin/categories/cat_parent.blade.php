@extends('admin.layouts.app')
@section('title', 'All Products')
@section('content')
<?php 
$array = array("flowers"=>1, "plants"=>2, "cakes"=>3,  "gifts"=>5); 
 $types = array_search($type,$array);

?>
<div class="col-lg-12 grid-margin stretch-card">
	<div class="card">
		<div class="card-body">
			<h4 class="card-title">{{$title}}</h4>
			<div class="table-responsive">
				<table id="imm_allproducts" class="table table-striped table-hover table-bordered">
					<thead>
						<tr>
							<th>Name</th>
							<th>Banner Heading</th>
							
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
    	   "order": [[ 2, "desc" ]],
    	   
			"processing": true,
			"serverSide": true,
			
		
			"ajax": {
				"url": "{{ route('admin.category-parent') }}",
				"type": "POST",
				"data": {"_token": "{{ csrf_token() }}","types": "{{ $types }}"}
			} ,
			"columns": [
				{ "data": "name" },
				{ "data": "banner_heading"	},
					
			
			
				{ "data": "id" ,
					"searchable": false,
					"sortable": false,
					"render": function (id, types, full, meta) {
								return '<a href="edit-product/'+id+'"><i class="fa fa-pencil"></i></a> &nbsp; <a href="delete-product/'+id+'"><i class="fa fa-close"></i></a>';
							} 
				}
			] 
	} );
} );
</script>
@endsection
@extends('admin.layouts.app')
<title>{{$title}}</title>
@section('content')
<?php  
	$types = array("add-flower-category"=>1, "add-plant-category"=>2, "add-cake-category"=>3, "add-occasion-category"=>4, "add-gift-category"=>5);
	$edit_url = array("edit-flower-category"=>1, "edit-plant-category"=>2, "edit-cake-category"=>3, "edit-occasion-category"=>4, "edit-gift-category"=>5);

 ?>
<div class="col-lg-12 grid-margin stretch-card">
	<div class="card">
		<div class="card-body">
			<h4 class="card-title">{{$title}}</h4>
			 <div class="add-btn">
	   			<button title="Add New Category"><a href="{{url('/')}}/admin/{{array_search($type,$types)}}"><i class="fa fa-plus"></i></a></button>
	   		</div>
			<div class="table-responsive">
				<table id="imm_allproducts" class="table table-striped table-hover table-bordered">
					<thead>
						<tr>
							<th>Name</th>
							<th>Status</th>
							<th>Type</th>
							
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
			
    	// "order": [[ 2, "desc" ]],
    	        
			"processing": true,
			"serverSide": true,
			 "bPaginate": true,
	 "conditionalPaging": true,
			"ajax": {
				"url": "{{ route('admin.filter-categories') }}",
				"type": "POST",
				"data": {"_token": "{{ csrf_token() }}","type": "{{ $type }}"}
			} ,
			"columns": [
				{ "data": "cat_name" },
				{ "data": "show_in_menu" ,
                   
                   "searchable": false,
					"sortable": false,
					"render": function (show_in_menu) {
						if(show_in_menu != '1'){
							return '<label class="badge badge-warning">Draft</label>';	
						}else{
							return '<label class="badge badge-success">Publish</label>';	
						}
					} 

				 },
				{ "data": "cat_type" ,
					"searchable": false,
					"sortable": false,
					"render": function (cat_type, type, full, meta) {
						return cat_type.replace('-',' ').toUpperCase();
					}  
				},
				{ "data": "id" ,
					"searchable": false,
					"sortable": false,
					"render": function (id, type, full, meta) {
								return '<a href="{{array_search($type,$edit_url)}}/'+id+'"><i class="fa fa-pencil"></i></a> &nbsp; <a href="delete-category/'+id+'"><i class="fa fa-close"></i></a>';
								
							} 
				}
			] 
	} );
} );
</script>
@endsection
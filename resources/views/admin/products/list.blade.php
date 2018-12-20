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
							<th>Amount</th>
							<th>Qty</th>
							<th>Status</th>
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
    	   "order": [[ 4, "desc" ]],
    	   
			"processing": true,
			"serverSide": true,
			
		
			"ajax": {
				"url": "{{ route('admin.filter-products') }}",
				"type": "POST",
				"data": {"_token": "{{ csrf_token() }}","types": "{{ $types }}"}
			} ,
			"columns": [
				{ "data": "name" },
				{ "data": "price",
					"render": function (price, types, full, meta) {
						return "Rs "+price;
					} 
				},
				{ "data": "stock_qty" },
				{ "data": "product_status",
					"searchable": false,
					"sortable": false,
					"render": function (status, types, full, meta) {
						if(status != '1'){
							return '<label class="badge badge-warning">Draft</label>';	
						}else{
							return '<label class="badge badge-success">Publish</label>';	
						}
					}  
				},
				{ "data": "id" ,
					"searchable": false,
					"sortable": false,
					"render": function (id, types, full, meta) {
								return '<a href="edit-{{ preg_replace("%s(?!.*s.*)%", "", $types ) }}/'+id+'"><i class="fa fa-pencil"></i></a> &nbsp; <a href="delete-product/'+id+'"><i class="fa fa-close"></i></a>';
							} 
				}
			] 
	} );
} );
</script>
@endsection
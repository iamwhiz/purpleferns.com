@extends('admin.layouts.app')
@section('title', 'All Order')
@section('content')
<?php
use Carbon\Carbon;
?>
<div class="col-lg-12 grid-margin stretch-card">
	<div class="card">
		<div class="card-body">
			<h4 class="card-title">{{$title}}</h4>
			<div class="table-responsive">
				<table id="imm_allproducts" class="table table-striped table-hover table-bordered">
					<thead>
						<tr>
						
							<th>Order ID</th>
						
							<th>Order Status</th>
							<th>Total</th>
							<th>Order Date</th>
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
				"url": "{{ route('admin.all-orders') }}",
				"type": "POST",
				"data": {"_token": "{{ csrf_token() }}"}
			} ,
			"columns": [
				
				{ "data": "order_id" },
				
				{ "data": "order_status",
                        "render": function (order_status) {
								if(order_status == '0'){
							return '<label class="badge badge-warning">Pending</label>';	
						}else if(order_status == '1'){
							return '<label class="badge badge-success">Approved</label>';	
						}else{
					 		return '<label class="badge badge-danger">Dis-Approved</label>';
					 		} 
					 	}
                     
				 },
				{ "data": "total_cost" },
				{ "data": "created_at",
					"searchable": false,
					"sortable": false,
					"render": function (created_at) {
                       
				
                            

                       var first_date = moment(created_at).format('MMM D, YYYY');
					
                            
							return first_date;	
						
					} 
				 },
				
				
			
				{ "data": "id" ,
					 "searchable": false,
					 "sortable": false,
					 "render": function (id) {
								return '<a href="/admin/view-order/'+id+'"><i class="fa fa-eye"></i></a> ';
								
					 		} 
				}
			] 
	} );
} );
</script>
@endsection
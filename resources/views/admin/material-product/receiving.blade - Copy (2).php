@extends('layouts.app') @section('content')




<div class="breadcumbs-area">
    <ul>
        <li class="title-main">
            <h4>Receiving</h4>
        </li>
        <li class="link-home"><a href="#."><i class="fa fa-home"></i></a></li>
        <li class="link-home"><a href="#.">Home</a></li>
        <li class="link-page"><a href="#.">Receiving</a></li>
    </ul>
   
</div>
<div class="content-main-here">


 

    <div class="table-main-div">
        <div class="table-header">
            <h2><strong>Receiving</strong></h2>
			 
        </div>
        <div class="tableBody">
            <div class="table-responsive">
      

         @include('toast')

				<div class="form-group row">

                           
						 <form class="row" action="{{route('admin.material.receiving')}}" method="post" enctype="multipart/form-data">
                               @csrf
                   
                            <div class="form-group col-sm-3">


                                <label for="order" class="order">Order Recieving Date
                                        <span style="color: red">*</span>
                                    </label>
                                 <input type="text" name="recieve_order_date"  class="form-control date-picker" required>
                                
                            </div>
							<div class="form-group col-sm-3">

                                @if(Session::has('ProductcreateErrors')) @foreach(Session::get('ProductcreateErrors')->get('Name') as $errorMessage)
                                <span class="label label-danger">{{$errorMessage}}</span> @endforeach @endif

                                <label for="supplier_name" class="supplier_name">Supplier Name
                                        <span style="color: red">*</span>
                                    </label>
                                <!-- Product Name -->
                                 <select class="form-control  for-multiple select-form" id="supplier" name="supplier" onchange="fill_order(this.value)" required>
                                        
										 <option value="">Select Supplier</option>
										
										@foreach($suppliers as $supplier)
                                    <option value="{{$supplier->id}}">{{$supplier->supplier_name}}</option>
                                    @endforeach
                                    </select>
                            </div>
							
							
							<div class="form-group col-sm-3">


                                <label for="order" class="order">Order
                                        <span style="color: red">*</span>
                                    </label>
                                <!-- Product Name -->
                                 <select class="form-control  for-multiple select-form" id="order" name="order"  required>
                                        
										 
                                    </select>
                            </div>
							
							
							<div class="form-group col-sm-2">
                                           
											<label for="order" class="order"></label>
											<button type="submit" class="btn blue">
<i class="fa fa-plus-circle"></i> Get Details</button>
											
                                        </div>
                                    </form>
							
							
							
				
				</div>
				 <p id="notice"></p>

               
           <table class="table" id="myTable">
        <thead>
            <tr>
			   <th>Id</th>
			   <th>Name</th>
               <th>Qty</th>
            </tr>
        </thead>
		 <tbody>
		 @if($products)
		@foreach($products as $product) 
		<tr>
		 <td>{{$product->id}}</td>
		 <td>{{App\MaterialProduct::getName($product->id)}}</td>
		 <td>{{$product->qty}}</td>
		 </tr>
		 @endforeach
		 @endif
		 </tbody>
		
		
       
    </table>
               
            </div>
        </div>
		  <div class="form-field-here text-center" style="margin-top: 20px">
                   
                    <button id="save_purchase" type="submit" class="btn blue">
<i class="fa fa-plus-circle"></i> Save Order Recieving</button>
                </div>
    </div>
	
	</div>
	
	
<script type="text/javascript">
function fill_order(param)
{
	
	var supplier_id=param;
	//alert('sdsd');
	//alert(supplier_id);
	if(supplier_id){	
								
					$.ajax({
					url: "{{route('admin.get.supplier.order')}}",
					data: {
					supplier_id: supplier_id
					},
					dataType: "json",
					success: function(data) {
						
						console.log(data);
						
						$('#order').empty();					
						$.each(data, function(key, value) {
						$('#order').append('<option value="'+value.id+'">'+value.name+'</option>');
						});
							
					}
							});
								
		}else{
			$('#order').empty();
											   
		}   	
	
	

	
}



</script>
<!--
<script type="text/javascript">
function fill_table(param)
{
	
	var order_id=param;
	//alert('sdsd');
	alert(order_id);
	if(order_id){	
								
					
					
					
					$.ajax({
					url: "{{route('admin.get.supplier.order.product')}}",
					data: {
					order_id: order_id
					},
					dataType: "json",
									success: function(data) {
									
									console.log(data);	
									var result=JSON.stringify(data); 
									console.log(result);	
									$('#myTableJson').DataTable( {
										"ajax": result,
										
									} );

										
										
											
									}
							});
								
		}else{
			$('#myTableJson').empty();
											   
		}   	
	
	

	
}



</script>
-->
<script type="text/javascript">
   $(document).ready(function() {
$("#save_purchase").click(function(event){
                
          
           event.preventDefault();
           var supplier=plant_value=$( "#supplier option:selected" ).val();
            var data = [];
           $.each($("input[name='single']:checked"), function(){            
               data.push($(this).val());
           });
           
data=data.join(",");
//ajax
 
if(data && supplier){
$.ajax({
  type: "GET",
  url:"{{route('admin.material.purchase.save')}}?data="+data+"&supplier_id="+supplier,
  success:function(data){ 
console.log(data);  
$("#notice").empty();
$('#notice').text('Purchase Completed!');
}
                 });
}else
	
	{
		$('#notice').text('Please Select Supplier / Material !');
	}
       });
   });
</script>
    @endsection
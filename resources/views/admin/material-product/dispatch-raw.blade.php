@extends('layouts.app') @section('content')




<div class="breadcumbs-area">
    <ul>
        <li class="title-main">
            <h4>Raw Material Recieving</h4>
        </li>
        <li class="link-home"><a href="#."><i class="fa fa-home"></i></a></li>
        <li class="link-home"><a href="#.">Home</a></li>
        <li class="link-page"><a href="#.">Raw Material Recieving</a></li>
    </ul>
   
</div>
<div class="content-main-here">


 <form class="add-patient-form" method="post" action="{{route('admin.material.dispatch')}}" enctype="multipart/form-data">
                @csrf
		

    <div class="table-main-div">
        <div class="table-header">
            <h2><strong>Raw Material Recieving</strong></h2>
			 
        </div>
        <div class="tableBody">
            <div class="table-responsive">
      

         @include('toast')

				<div class="form-group row back-grey">

                           <!--
							<div class="form-group col-sm-4">

                                @if(Session::has('ProductcreateErrors')) @foreach(Session::get('ProductcreateErrors')->get('Name') as $errorMessage)
                                <span class="label label-danger">{{$errorMessage}}</span> @endforeach @endif

                                <label for="supplier_name" class="supplier_name">Supplier Name
                                        
                                    </label>
                              
                                 <select class="form-control  for-multiple select-form" id="supplier" name="supplier">
                                        
										 <option value="0">Select Supplier</option>
										
										@foreach($suppliers as $supplier)
                                    <option value="{{$supplier->id}}">{{$supplier->supplier_name}}</option>
                                    @endforeach
                                    </select>
                            </div>
							-->
							<div class="form-group col-sm-4">


                                <label for="order" class="order">Orders
                                        
                                    </label>
                                <!-- Product Name -->
                                 <input type="text" name="order"  class="form-control">
                            </div>
							
							
							<div class="form-group col-sm-4">


                                <label for="order" class="order">Purchase Order Date
                                        <span style="color: red">*</span>
                                    </label>
                                 <input type="text" name="order_date"  class="form-control date-picker" required>
                                
                            </div>
							
							
							
				
				</div>
				
					<div id="table_block">
					 
					</div>
               
            </div>
        </div>
		  <div class="form-field-here text-center" style="margin-top: 20px">
                   
                    <button id="save_purchase" type="submit" class="btn blue">
<i class="fa fa-plus-circle"></i> Recieve Raw Material</button>
                </div>
    </div>
	
	
	
	</form>
	</div>
	
<style>
#save_purchase{
	display:none;
}
</style>	
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
<script type="text/javascript">
function fill_table(param)
{
	
	var order_id=param;
	//alert('sdsd');
	//alert(order_id);
	if(order_id){	
								
					
					
					
					$.ajax({
					url: "{{route('admin.get.supplier.order.product')}}",
					data: {
					order_id: order_id
					},
					dataType: "json",
									success: function(data) {
									
									if(data.success==1){
						 
						 $('#table_block').html(data.msg);
						 document.getElementById("save_purchase").style.display = "block";
						 
						 
					 }
									}
							});
								
		}else{
			$('#table_block').empty();
											   
		}   	
	
	

	
}



</script>
<!--
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
-->
    @endsection
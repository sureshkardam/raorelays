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

                           

                   
                            <div class="form-group col-sm-4">

                                @if(Session::has('ProductcreateErrors')) @foreach(Session::get('ProductcreateErrors')->get('Name') as $errorMessage)
                                <span class="label label-danger">{{$errorMessage}}</span> @endforeach @endif

                                <label for="supplier_name" class="supplier_name">Supplier Name
                                        <span style="color: red">*</span>
                                    </label>
                                <!-- Product Name -->
                                 <select class="form-control  for-multiple select-form" id="supplier" name="supplier" required>
                                        
										 <option value="">Select Supplier</option>
										
										@foreach($suppliers as $supplier)
                                    <option value="{{$supplier->id}}">{{$supplier->supplier_name}}</option>
                                    @endforeach
                                    </select>
                            </div>
							
							
							<div class="form-group col-sm-4">


                                <label for="order" class="order">Order
                                        <span style="color: red">*</span>
                                    </label>
                                <!-- Product Name -->
                                 <select class="form-control  for-multiple select-form" id="order" name="order" required>
                                        
										 <option value="">Select Order</option>
										
										@foreach($orders as $order)
                                    <option value="{{$order->id}}">{{$order->display_order_id}}</option>
                                    @endforeach
                                    </select>
                            </div>
							
							
							
				
				</div>
				 <p id="notice"></p>

                <table class="table display" id="myTable">
                    <thead>
                        <tr>

                             <th><input type="checkbox" id='selectall' name="selectall"></th>
                            <th>Product Name</th>
							<th>Category</th>
                           
                            
                            <th>Stock</th>
                            <th>Status</th>
                             <th>Created</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($products as $product)
                        <tr>


                          <td><input type="checkbox" class="single" name="single" value="{{$product->id}}"></td>
                           
                            <td>{{$product->name}}</td>
							 <td>{{App\ProductToCategory::getProductCategoryByID($product->id)}}</td>
                           
                            
                            <td><input type="number" name="quantity" class="form-control"  id="name" placeholder="Quantity" required></td>
                            <td>{{$product->status ? 'Enabled' : 'Disabled' }}</td>
                             <td>{{date('M\. d\, Y', strtotime($product->created_at))}}</td>

                            
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
		  <div class="form-field-here text-center" style="margin-top: 20px">
                   
                    <button id="save_purchase" type="submit" class="btn blue">
<i class="fa fa-plus-circle"></i> Save Purchase</button>
                </div>
    </div>
	
	</div>
	
	

<script>
$("input[name='selectall']").change(function(){
  
//$("#sales-agent").toggle();
var checkBoxes = $('.display').find(':checkbox');
checkBoxes.prop('checked', $(this).is(':checked') ? true : false);

});
</script>
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
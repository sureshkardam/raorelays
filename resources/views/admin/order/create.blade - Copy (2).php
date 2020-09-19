@extends('layouts.front.app') 
@section('content')


                <div class="breadcumbs-area main-heading">
                   <h1>Create Order</h1>
                    <!-- <div class="create-button">
                        <a title="Add New" href="#."><i class="fa fa-plus"></i></a>
                    </div> -->
                </div>
                
                <div class="content-main-here">
                   



					<form enctype="multipart/form-data" method="post" action="{{route('admin.order.create')}}">
					 @csrf
				   <div class="table-main-div" style="margin-top: 20px;margin-bottom: 20px;">
                        
						
						@include('toast')
             @if ($errors->any())
    <div class="alert alert-danger">
     
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
       
    </div>
@endif 

						
						
						
						
						<div class="form-area-first main-form-seperate">
                            <h2><strong>Company Information</strong> </h2>
							
							<div class="row">
               
						<div class="col-sm-6">
						<label>Address </label>
		<textarea class="form-control" style="height:110px;" readonly>
		{{$company->company_name}}
		{{$company->registered_address}}
		{{$company->city}}
		{{\App\State::getName($company->state)}}
		{{$company->zip_code}}
												
												</textarea>
						</div>
				<div class="col-sm-6">
											<label>Mobile </label>
                                            <input type="text" name="mobile" class="form-control" value="{{$company->mobile}}" readonly>
											
                                        </div>
										<div class="col-sm-6">
											<label>Contact Number </label>
                                            <input type="text" name="telephone1" class="form-control" value="{{$company->telephone}}" readonly>
											
                                        </div>
					
				<div class="col-sm-6">
											<label>Select Plant</label>
                                            <select class="form-control" name="plant">
												<option value="">Please Select Plant</option>
												@foreach($plants as $plant)
												
												<option value="{{$plant->id}}">{{$plant->plant_id}}</option>
												
												@endforeach
											</select>
											
                                        </div>
										
										<div class="col-sm-6">
											<label>Order Date</label>
                                            <?php $dateTime = \Carbon\Carbon::now();?>
											<input type="text" name="order_date" class="order_date form-control" value="{{$dateTime->format('d/m/y')}}" readonly>
											
                                        </div>
					
	    </div>
							
							
							
							
                        </div>
						


                                     
									 
									 
									 
									 
									 
									 
									 <div class="form-area-second main-form-seperate">
      <h2><strong>Customer Information</strong> </h2>
                               
                                    <div class="row">
									<div class="form-group col-sm-12">
						<label >Search Customer</label>
						<input type="text" class="customer form-control" value="" placeholder="Enter Customer Name" name="customer" />
						
						
						
						</div>
                                         <div class="form-group col-sm-6">
                                               <label for="customer name" class="hello">Customer Name
                                       
                                        </label>

<!-- Name -->
                                            <input type="text" name="contact_name" class="contact_name form-control"  placeholder="" value=""  >
                                            
                                        </div>
                                        
                          
						  
										<div class="form-group col-sm-6">
											<label>Customer Code </label>
                                            <input type="text" name="customer_code" class="customer_code form-control" id="customer_code" placeholder="" value=""   >
											
                                        </div>
										
										<div class="form-group col-sm-6">
											<label>Email </label>
                                            <input type="text" name="email" class="email form-control" id="email" placeholder="" value="{{old('email')}}"  >
											
                                        </div>
										<div class="form-group col-sm-6">
											<label>Contact Number </label>
                                            <input type="text" name="mobile" class="mobile form-control" id="mobile" placeholder="" value="{{old('mobile')}}"  >
											
                                        </div>
										<div class="form-group col-sm-6">
											<label>Additional Contact Number</label>
                                            <input type="text" name="telephone" class="telephone form-control" id="telephone" placeholder="" value="{{old('telephone')}}" >
											
                                        </div>
										<div class="form-group col-sm-6">
											<label>Registered Address </label>
                                            <input type="text" name="registered_address" class="form-control registered_address" id="registered_address" placeholder="" value="{{old('registered_address')}}"  >
											
                                        </div>
										<div class="form-group col-sm-6">
											<label>City </label>
                                            <input type="text" name="city" class="city form-control" id="city" placeholder="" value="{{old('city')}}"  >
											
                                        </div>
										
									
										<div class="form-group col-sm-6">
											<label>Zip Code </label>
                                            <input type="text" name="zip_code" class="zip_code form-control" id="zip_code" placeholder="" value="{{old('zip_code')}}"  >
											
                                        </div>
										
										
										
										<div class="form-group col-sm-6">
											<label>GST </label>
                                            <input type="text" name="gst" class="gst form-control" id="gst" placeholder="" value="{{old('gst')}}"  >
											
                                        </div>
										
										<div class="form-group col-sm-6">
											<label>Tin </label>
                                            <input type="text" name="tin" class="tin form-control" id="tin" placeholder="" value="{{old('tin')}}"  >
											
                                        </div>	
										
										
										
										
										
										<div class="form-group col-sm-12">
											<label>Payment Terms </label>
                                            
											<textarea rows="4" id="payment_terms" cols="50" class="form-control payment_terms" name="payment_terms"  >{{old('payment_terms')}}</textarea>
											
											
                                        </div>	
										
										<div class="form-group col-sm-12">
											<label>Preferred Mode of Transport </label>
                                            
											<textarea rows="4" id="mode_of_transport" cols="50" class="form-control mode_of_transport" name="mode_of_transport"  >{{old('mode_of_transport')}}</textarea>
											
											
											
                                        </div>	

													
										
										
								
										
										
											
                                       
                                    </div>
									
									</div>
									  
									<div class="form-area-third main-form-seperate">
									    <h2><strong>Product Information</strong> </h2>
                                   
                            
							   <div class="option-section">
                            <div class="row">
                                <div class="col-sm-12">
								
                                    <div class="table option product-add">
                                       <input type="hidden"  name="customer_id" class="customer_id"/>
									  
									   <div id="inputtext">
									   
									   </div>
									 
										<button class="addBtn" type="button"><i class="fa fa-plus"></i>Add Products</button>
										
										


                                    </div>
                                </div>
                            </div>
                        </div>
                           
                           </div>
							<input type="submit" class="btn blue green" value="Create Order">
							<input type="submit" class="btn blue margin-both" value="Save & Exit" >
							<a class="btn blue gray" href="{{route('admin.order.list')}}" >Cancel</a>
							
                           
                            
                                     
                                
                                    
                   
                  
                </div>
				</form>


<link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css" rel="stylesheet" type="text/css"/>
  
  <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js"></script>



	<script type="text/javascript">
        
		$(document).ready(function(){
			addDisable();
    
	   $(".customer").autocomplete({
                source: function(request, response) {
                $.ajax({
                url: "{{route('admin.get.customer')}}",
                data: {
						q: request.term
					},
                dataType: "json",
               success: function(data){
                console.log(data);
                response(data);
                }    
            });
			
			},
      minLength: 3,
      select: function( event, ui ) {
       
		$(this).closest('.order-customer-area').find('input[name="customer"]').val(ui.item.label);
		$(this).closest('.order-customer-area').find('input[name="customer_id"]').val(ui.item.value);
		
		removeDisable();
		$(".contact_name").val(ui.item.label);
		$(".customer_id").val(ui.item.value);
		
		$(".email").val(ui.item.email);
		$(".customer_code").val(ui.item.customer_code);
		$(".telephone").val(ui.item.telephone);
		$(".mobile").val(ui.item.mobile);
		$(".registered_address").val(ui.item.registered_address);
		$(".tin").val(ui.item.tin);
		$(".payment_terms").val(ui.item.payment_terms);
		$(".mode_of_transport").val(ui.item.mode_of_transport);
		$(".gst").val(ui.item.gst);
		$(".city").val(ui.item.city);
		$(".zip_code").val(ui.item.zip_code);
		
		addDisable();
		return false;
      },
			
			
        
    });
	   
	   
	   

	
})


function removeDisable()

{
		$(".contact_name").attr("readonly", false);
		$(".email").attr("readonly", false);
		$(".customer_code").attr("readonly", false);
		$(".telephone").attr("readonly", false);
		$(".mobile").attr("readonly", false);
		$(".registered_address").attr("readonly", false);
		$(".tin").attr("readonly", false);
		$(".payment_terms").attr("readonly", false);
		$(".mode_of_transport").attr("readonly", false);
		$(".gst").attr("readonly", false);
		$(".city").attr("readonly", false);
		$(".zip_code").attr("readonly", false);
	
}

function addDisable()

{
	
	
		$(".contact_name").attr("readonly", true);
		$(".email").attr("readonly", true);
		$(".customer_code").attr("readonly", true);
		$(".telephone").attr("readonly", true);
		$(".mobile").attr("readonly", true);
		$(".registered_address").attr("readonly", true);
		$(".tin").attr("readonly", true);
		$(".payment_terms").attr("readonly", true);
		$(".mode_of_transport").attr("readonly", true);
		$(".gst").attr("readonly", true);
		$(".city").attr("readonly", true);
		$(".zip_code").attr("readonly", true);
		
		
}



    </script>




	<script type="text/javascript">
        
		$(document).ready(function(){
    var count = 1;
    $("button").click(function(){
       $("#inputtext").append("<div class='dynamic'><div class='row'><div class='col-sm-3 first'><input type='text' class='suggestion' value='' placeholder='Enter Product' name='product_name' /><input type='hidden'  name='product_ids[]'   /></div><div class='col-sm-2'><input type='text' placeholder='Qty' name='qty[]'   /></div><div class='col-sm-3'><input type='text' name='specification[]' placeholder='Specification' /></div><div class='col-sm-3'><input placeholder='Comment' type='text' name='comment[]' /></div><div class='col-sm-1 last'><button class='removeArea' type='button'>Remove</button></div></div></div><br />");
	   
	   count += 1;
	   
	   $(".suggestion").autocomplete({
                source: function(request, response) {
                $.ajax({
                url: "{{route('admin.get.product')}}",
                data: {
						q: request.term
					},
                dataType: "json",
               success: function(data){
                console.log(data);
                response(data);
                }    
            });
			
			},
      minLength: 3,
      select: function( event, ui ) {
       
		$(this).closest('.dynamic').find('input[name="product_name"]').val(ui.item.label);
		$(this).closest('.dynamic').find('input[name="product_ids[]"]').val(ui.item.value);
		return false;
      },
			
			
        
    });
	   
	   
	   
    });
	
	
	
	$("#inputtext").on("click", ".removeArea", function (event) {
        $(this).closest('.dynamic').remove();      
        count -= 1;
    });
	
	
	
	
})

    </script>
@endsection





@extends('layouts.front.app')
@section('content')

               
                <div class="content-main-here">
                    <div class="table-main-div" style="margin-top: 0px;">
                        <div class=" table-header ">
                            <!--<h2><strong>Create Order</strong> </h2>-->
                        </div>
						@include('toast')
             @if ($errors->any())
    <div class="alert alert-danger">
     
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
       
    </div>
@endif 
   <div class="order-customer-area">
                  
		<div class="row">
               
						<div class="col-sm-6">
						
						<input type="text" class="customer form-control" value="" placeholder="Enter Customer Name" name="customer" />
						
						
						
						</div>
					
					
				
	    </div>

                   <div class="row">
               
                    <div class="col-sm-12">
                        <div class="full-comment-section">
                        
                    <div class="details-block-support-edit">
                        <ol>
                            
                            
							<li><h3>Contact Name</h3><p class="contact_name"><b></b></p></li>
							
							<li><h3>Customer Code</h3><p class="customer_code"><b></b></p></li>
							
							<li><h3>Email</h3><p class="email"><b></b></p></li>
                            
							
							<li><h3>Mobile</h3><p class="mobile"><b></b></p></li>
							<li><h3>Telephone</h3><p class="telephone"><b></b></p></li>
							
							
							<li><h3>Registered Address</h3><p class="registered_address"><b></b></p></li>
							
							
							
							<li><h3>GST Number</h3><p class="gst"><b></b></p></li>
							
							<li><h3>TIN Number</h3><p class="tin"><b></b></p></li>
							
							<li><h3>Payment Terms</h3><p class="payment_terms"><b></b></p></li>
							
							<li><h3>Mode of Transport</h3><p class="mode_of_transport"><b></b></p></li>
							
                        </ol>
                    </div>
           
                    <div class="text-area">
                        
                        
                        
                        
                        <form enctype="multipart/form-data" method="post" action="">
                            
							   <div class="option-section">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="table option product-add">
                                       <input type="hidden"  name="customer_id" />
									  
									   <div id="inputtext">
									   
									   </div>
									 
										<button class="addBtn" type="button">Add Products</button>
										
										


                                    </div>
                                </div>
                            </div>
                        </div>
                           
                           
							<input type="submit" class="btn blue" value="Create Order">
							<a class="btn blue" href="{{route('admin.order.list')}}" >Back to Order List</a>
							
                            @csrf
                            </form>
                    </div>
                

                       
                       </div>   
                    </div>
        </div>
    </div>
	<!--
	<link href="https://code.jquery.com/ui/1.10.2/themes/smoothness/jquery-ui.min.css" rel="stylesheet"></link>
<script src="https://code.jquery.com/ui/1.10.2/jquery-ui.min.js"></script>-->

 <link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css" rel="stylesheet" type="text/css"/>
  
  <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js"></script>



	<script type="text/javascript">
        
		$(document).ready(function(){
    
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
		
		$(".contact_name").text(ui.item.label);
		$(".email").text(ui.item.email);
		$(".customer_code").text(ui.item.customer_code);
		$(".telephone").text(ui.item.telephone);
		$(".mobile").text(ui.item.mobile);
		$(".registered_address").text(ui.item.registered_address);
		$(".tin").text(ui.item.tin);
		$(".payment_terms").text(ui.item.payment_terms);
		$(".mode_of_transport").text(ui.item.mode_of_transport);
		$(".gst").text(ui.item.gst);
		return false;
      },
			
			
        
    });
	   
	   
	   

	
})

    </script>




	<script type="text/javascript">
        
		$(document).ready(function(){
    var count = 1;
    $("button").click(function(){
       $("#inputtext").append("<div class='dynamic'><div class='row'><div class='col-sm-3'><input type='text' class='suggestion' value='' placeholder='Enter Product' name='product_name' /><input type='hidden'  name='product_ids[]' required /></div><div class='col-sm-2'><input type='text' placeholder='Qty' name='qty[]' required /></div><div class='col-sm-3'><input type='text' name='specification[]' placeholder='Specification' /></div><div class='col-sm-3'><input placeholder='Comment' type='text' name='comment[]' /></div><div class='col-sm-1'><button class='removeArea' type='button'>Remove</button></div></div></div><br />");
	   
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

@extends('layouts.front.app')
@section('content')

	<div class="breadcumbs-area main-heading">
	    <h1>Order Creation</h1>
	</div>
	
	<section class="another-section main-form-seperate">
	
	    <div class="container">
		<div class="order-title-main"><h1 style="text-align:center;margin-top:5px;margin-bottom:5px;">Order Creation</h1><div class="arrow-down"></div></div>
	    	<!-- top step points -->
	        <div class="stepwizard">
	            <div class="stepwizard-row setup-panel">
	                <div class="stepwizard-step col-xs-4">
	                    <a href="#step-1" type="button" class="btn btn-success btn-circle">1</a>
	                    <p><i class="fa fa-building-o" aria-hidden="true"></i> <small>Company Information</small></p>
	                </div>
	                <div class="stepwizard-step col-xs-4">
	                    <a href="#step-2" type="button" class="btn btn-default btn-circle" disabled="disabled">2</a>
	                    <p><i class="fa fa-user" aria-hidden="true"></i> <small>Customer Information</small></p>
	                </div>
	                <div class="stepwizard-step col-xs-4">
	                    <a href="#step-3" type="button" class="btn btn-default btn-circle" disabled="disabled">3</a>
	                    <p><i class="fa fa-tag" aria-hidden="true"></i> <small>Product Information</small></p>
	                </div>
	            </div>
	        </div>
	        <form enctype="multipart/form-data" method="post" action="{{route('admin.order.create')}}">
				            @csrf
				            @include('toast')
				            @if ($errors->any())
				            <div class="alert alert-danger">
				                @foreach ($errors->all() as $error)
				                <li>{{ $error }}</li>
				                @endforeach
				            </div>
				            @endif


				            <!-- step 1 here -->
	            <div class="panel panel-primary setup-content" id="step-1">
	                <div class="panel-heading">
	                    <h3 class="panel-title"><i class="fa fa-building-o" aria-hidden="true"></i>
 Company Information</h3>
	                </div>
	                <div class="panel-body">
					
					
			<!-- company info -->
					<div class="row">
					<div class="col-12">
					<div class="company-info-main">
					
					<div class="c-logo">
					<img src="http://18.213.136.185/rao-relays/public/admin/images/rao-logo.jpg" alt="" style="max-width:100%;">
					</div>

					<div class="company-address">
					<p><Strong>{{$company->company_name}}</Strong></p>
					<p>{{$company->registered_address}}<br>{{$company->city}}-{{$company->zip_code}}</p>
					</div>

					<div class="contact-details">
					<p>Contacts : {{$company->telephone}},{{$company->mobile}}</p>
					<p>GST No : {{$company->gst}}</p>
					<p>Tin No : {{$company->tin}}</p>
					</div>

					</div>				
					</div>
					</div>
<!-- company info -->



	                    <div class="row">
	                       
	                        <div class="col-sm-6 plant_block">
	                            <label>Select Plant <span style="color: red">*</span></label>
								<span class="has-span" style="display: none;">Please Enter Field*</span>
	                            <select class="form-control plant" name="plant" class="plant" required>
	                                <option value="">Please Select Plant</option>
	                                @foreach($plants as $plant)
	                                <option value="{{$plant->id}}">{{$plant->plant_id}}</option>
	                                @endforeach
	                            </select>
	                        </div>
							
							
							
							
	                      
							<div class="col-sm-6 plant-add">
	                            <label>Plant Address</label>
								<p id="plant_name"></p>
								<p id="plant_address"><p>
								<p id="plant_contact"><p>
								<!--<p id="plant_city">New Delhi</p>
								<p id="plant_zip">110018</p>-->
	                        </div>
							
							</div>
							
							 <div class="row">
							
							<div class="col-sm-6">
	                            <label>Order Date</label>
	                            <?php $dateTime = \Carbon\Carbon::now();?>
	                            <input type="text" name="order_date" class="order_date form-control" value="{{$dateTime->format('d/m/y')}}" readonly>
	                        </div>
							
							</div>
							
	                   
	                    <div class="buttons-here">
	                    <div class="pull-right"><a class="btn blue gray" href="{{route('admin.order.list')}}">Back to Order List</a>    <button class="btn nextBtn pull-right blue green" type="button">Next</button></div>
	                    </div>
						
						 </div>
						
						
	                </div>
	            </div>

	            	<!-- step 2 Here -->
	            <div class="panel panel-primary setup-content" id="step-2">
	                <div class="panel-heading">
	                    <h3 class="panel-title"><i class="fa fa-user" aria-hidden="true"></i> Customer Information</h3>
	                </div>
	                <div class="panel-body">
	                    <div class="row">
	                        <div class="form-group col-sm-12 ">
	                        	<div class="search-cus-divider">
	                            <label>Search Customer <i class="fa fa-search"></i> <span style="color: red">*</span></label>

	                            <!-- enter required value in input and copy this span tag in where u want to required field -->
	                            <span class="has-span" style="display: none;">Please Enter Field*</span>
	                            <input type="text" class="customer form-control" value="" placeholder="Enter Customer Name" name="customer" required />
								
								<input type="hidden" name="customer_id" />
	                        </div>
	                        </div>
	                        <div class="form-group col-sm-4">
	                            <label for="customer name" class="hello">Customer Name
	                            </label>
	                            <input type="text" name="contact_name" class="contact_name form-control" placeholder="" value="">
	                        </div>
	                        <div class="form-group col-sm-4">
	                            <label>Customer Code </label>
	                            <input type="text" name="customer_code" class="customer_code form-control" id="customer_code" placeholder="" value="">
	                        </div>
	                        <div class="form-group col-sm-4">
	                            <label>Email </label>
	                            <input type="text" name="email" class="email form-control" id="email" placeholder="" value="{{old('email')}}">
	                        </div>
	                        <div class="form-group col-sm-4">
	                            <label>Contact Number </label>
	                            <input type="text" name="mobile" class="mobile form-control" id="mobile" placeholder="" value="{{old('mobile')}}">
	                        </div>
	                        <div class="form-group col-sm-4">
	                            <label>Additional Contact Number</label>
	                            <input type="text" name="telephone" class="telephone form-control" id="telephone" placeholder="" value="{{old('telephone')}}">
	                        </div>
	                        <div class="form-group col-sm-4">
	                            <label>Registered Address </label>
	                            <input type="text" name="registered_address" class="form-control registered_address" id="registered_address" placeholder="" value="{{old('registered_address')}}">
	                        </div>
	                        <div class="form-group col-sm-4">
	                            <label>City </label>
	                            <input type="text" name="city" class="city form-control" id="city" placeholder="" value="{{old('city')}}">
	                        </div>
	                        <div class="form-group col-sm-4">
	                            <label>Zip Code </label>
	                            <input type="text" name="zip_code" class="zip_code form-control" id="zip_code" placeholder="" value="{{old('zip_code')}}">
	                        </div>
	                        <div class="form-group col-sm-4">
	                            <label>GST </label>
	                            <input type="text" name="gst" class="gst form-control" id="gst" placeholder="" value="{{old('gst')}}">
	                        </div>
	                        <div class="form-group col-sm-4">
	                            <label>Tin </label>
	                            <input type="text" name="tin" class="tin form-control" id="tin" placeholder="" value="{{old('tin')}}">
	                        </div>
	                        <div class="form-group col-sm-4">
	                            <label>Payment Terms </label>
	                            <textarea rows="4" id="payment_terms" cols="50" class="form-control payment_terms" name="payment_terms" style="height: 40px;">{{old('payment_terms')}}</textarea>
	                        </div>
	                        <div class="form-group col-sm-4">
	                            <label>Preferred Mode of Transport </label>
	                            <textarea rows="4" id="mode_of_transport" cols="50" class="form-control mode_of_transport" name="mode_of_transport" style="height: 40px;">{{old('mode_of_transport')}}</textarea>
	                        </div>
	                    </div>
	                    <div class="buttons-here">
						<div class="pull-right"> <a class="btn blue gray" href="{{route('admin.order.list')}}">Back to Order List</a> 
						<!--<a class="btn blue" href="#step-1">Back</a> -->

						<button class="btn nextBtn pull-right blue green" type="button">Next</button></div>
	                  
	                    	<!--<button class="btn blue gray prevBtn pull-right" type="button">Previous</button>-->
	                    </div>
	                </div>
	            </div>

	            	<!-- Step 3 Here -->
	            <div class="panel panel-primary setup-content" id="step-3">
	                <div class="panel-heading">
	                    <h3 class="panel-title"><i class="fa fa-tag" aria-hidden="true"></i>

 Product Information</h3>
	                </div>
	                <div class="panel-body">
	                    <div class="option-section">
	                        <div class="row">
	                            <div class="col-sm-12">
	                                <div class="table option product-add">
	                                    <input type="hidden" name="customer_id" class="customer_id" />
	                                    <div id="inputtext">
	                                    </div>
	                                    <button class="addBtn" type="button"><i class="fa fa-plus"></i> Add Products</button>
	                                </div>
	                            </div>
	                        </div>
	                    </div>
	                    <div class="buttons-here">
	                    	<!--<button class="btn blue gray prevBtn" type="button">Previous</button>-->
	                        <input type="submit" class="btn blue green" name="create-order" value="Create Order">
							<!--<input type="submit" class="btn blue" value="Back">-->
	                        <input type="submit" class="btn blue orange" name="save-exit" value="Save for Later & Exit">
	                        <a class="btn blue gray" href="{{route('admin.order.list')}}">Back to Order List</a>
	                    </div>
	                </div>
	            </div>
	        </form>
	    </div>
	</section>


<link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css" rel="stylesheet" type="text/css" />
<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js"></script>

<script type="text/javascript">
	
    $('.plant_block').on('change', '.plant',function(){
    
	const next_button = document.querySelector('.nextBtn');
	var plantID = $(this).val();    
   // alert(plantID);
	if(plantID){
        
		
		next_button.disabled=false;
		$.ajax({
           type: "GET",
           url:"{{route('plant.detail')}}?plantID="+plantID,
           success:function(data){ 
				
				
				//console.log(data);
				
				
				$('#plant_name').text(data.plant_name);
				$('#plant_address').text(data.registered_address);
				$('#plant_contact').text(data.telephone);
			
				//
				
               
         }
        });
    }else{
         //
		 next_button.disabled=true;
       
    }      
   });
 
</script> 


<!-- Step FOrm JS this -->
<script type="text/javascript">
$(document).ready(function() {

    const next_button = document.querySelector('.nextBtn');
	
	
	plant_value=$( ".plant option:selected" ).val();
		if(plant_value !='')
		{
		
		next_button.disabled = false;
		
		}else
		{
			next_button.disabled = true;
			
		}
	
	
	
	
	var navListItems = $('div.setup-panel div a'),
        allWells = $('.setup-content'),
        allNextBtn = $('.nextBtn');

    allWells.hide();

    navListItems.click(function(e) {
        e.preventDefault();
        var $target = $($(this).attr('href')),
            $item = $(this);

        if (!$item.hasClass('disabled')) {
            navListItems.removeClass('btn-success').addClass('btn-default');
            $item.addClass('btn-success');
            allWells.hide();
            $target.show();
            $target.find('input:eq(0)').focus();
        }
    });

    allNextBtn.click(function() {
        
		
		
		
		var curStep = $(this).closest(".setup-content"),
            curStepBtn = curStep.attr("id"),
            nextStepWizard = $('div.setup-panel div a[href="#' + curStepBtn + '"]').parent().next().children("a"),
            curInputs = curStep.find("input[type='text'],input[type='url']"),
            isValid = true;

        $(".form-group").removeClass("has-error");
        for (var i = 0; i < curInputs.length; i++) {
            if (!curInputs[i].validity.valid) {
                isValid = false;
                $(curInputs[i]).closest(".form-group").addClass("has-error");
            }
        }

        if (isValid) nextStepWizard.removeAttr('disabled').trigger('click');
    });

    $('div.setup-panel div a.btn-success').trigger('click');
});
</script>
<!-- end step js -->

<script type="text/javascript">
$(document).ready(function() {
    
			$(".contact_name").val('');
            $(".customer_id").val('');

            $(".email").val('');
            $(".customer_code").val('');
            $(".telephone").val('');
            $(".mobile").val('');
            $(".registered_address").val('');
            $(".tin").val('');
            $(".payment_terms").val('');
            $(".mode_of_transport").val('');
            $(".gst").val('');
            $(".city").val('');
            $(".zip_code").val('');
	
	
	
	
	
	
	
	addDisable();

    $(".customer").autocomplete({
        source: function(request, response) {
            $.ajax({
                url: "{{route('admin.get.customer')}}",
                data: {
                    q: request.term
                },
                dataType: "json",
                success: function(data) {
                    console.log(data);
                    response(data);
                }
            });

        },
        minLength: 3,
        select: function(event, ui) {

            $(this).closest('.search-cus-divider').find('input[name="customer"]').val(ui.item.label);
            $(this).closest('.search-cus-divider').find('input[name="customer_id"]').val(ui.item.value);

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
$(document).ready(function() {
    var count = 1;
    $("button.addBtn").click(function() {
		//$(document).on('click', 'button.addBtn', function() {  
		
        $("#inputtext").append("<div class='dynamic'><div class='row'><div class='col-sm-2 first'><select class='sub form-control' id='"+count+"' onchange='fill_sub(this)' name='category[]' ></select></div><div class='col-sm-3'><select class='sub form-control' id='parent-"+count+"' name='parent_id[]' required></select></div><div class='col-sm-2'><input type='text' placeholder='Qty' name='qty[]' required  /></div><div class='col-sm-2'><input type='text' name='specification[]' placeholder='Specification' /></div><div class='col-sm-2'><input placeholder='Comment' type='text' name='comment[]' /></div><div class='col-sm-1 last'><button class='removeArea' type='button'>Remove</button></div></div></div>");

        
		var data=<?php print_r($main_category);?>
		
		$.each(data, function(key, value) {
						
	   //main.append('<option value="'+value.id+'">'+value.name+'</option>');
	   
	   $('#' + count).append('<option value="'+value.id+'">'+value.name+'</option>');
							
												});
   
   
   count += 1;
   
   });

	
	
	

    $("#inputtext").on("click", ".removeArea", function(event) {
        $(this).closest('.dynamic').remove();
        count -= 1;
    });




})
</script>
<script type="text/javascript">
function fill_sub(param)
{
	
	
	var count = $(param).attr('id');
	
	var cat_id=param.value;
	
	if(cat_id){	
								
					$.ajax({
					url: "{{route('admin.get.subcategory')}}",
					data: {
					cat_id: cat_id
					},
					dataType: "json",
					success: function(data) {
						$('#parent-' + count).empty();					
						$.each(data, function(key, value) {
						$('#parent-' + count).append('<option value="'+value.id+'">'+value.name+'</option>');
						});
							
					}
							});
								
		}else{
			$('#parent-' + count).empty();
											   
		}   	
	
	

	
}



</script>

<style>
.header{
	display:none;
}
</style>

@endsection
@extends('layouts.app') 
@section('content')

                <div class="breadcumbs-area">
                    <ul>
                        <li class="title-main">
                            <h4>Customer Order</h4>
                        </li>
                        <li class="link-home"><a href="#."><i class="fa fa-home"></i></a></li>
                        <li class="link-home"><a href="#.">Home</a></li>
                        <li class="link-page"><a href="#.">Customer Order</a></li>
                    </ul>
                    <!-- <div class="create-button">
                        <a title="Add New" href="#."><i class="fa fa-plus"></i></a>
                    </div> -->
                </div>
                <div class="content-main-here">
                    <div class="table-main-div" style="margin-top: 0px;">
                        <div class=" table-header ">
                            <h2><strong>Customer Order</strong> </h2>
                        </div>
						@include('toast')
             @if ($errors->any())
    <div class="alert alert-danger">
     
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
       
    </div>
@endif 


                   <div class="row">
                <div class="order-container">
                    
                    <div class="col-sm-12">
                        <div class="full-comment-section">
                        
                    <div class="details-block-support-edit">
                        <ol>
                            
                            <li>
                                    <h3>Customer Name</h3>
                                    
                                        <p>{{$customer->contact_name}}</p>
                
                                    
                            </li>
                            <li>
                                    <h3>Telephone</h3>
                        
                                        <p>{{$customer->telephone}}</p>
            
                                    
                            </li>
                        </ol>
                    </div>
           
                    <div class="text-area">
                        
                        
                        
                        
                        <form enctype="multipart/form-data" method="post" action="{{ route('admin.customer.view',$customer->id) }}">
                            
							   <div class="option-section">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="table option">
                                       
									  
									   <div id="inputtext">
									   
									   </div>
									 
										<button type="button">Add Products</button>


                                    </div>
                                </div>
                            </div>
                        </div>
                           
                           
							<input type="submit" class="btn blue" value="Create Order">
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
    var count = 1;
    $("button").click(function(){
       $("#inputtext").append("<div class='dynamic'><input type='text' class='suggestion' value='' name='product_name' /><input type='hidden' name='product_ids[]' /><input type='text' name='qty[]' /><button class='removeArea' type='button'>remove</button></div><br />");
	   
	   
	   
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

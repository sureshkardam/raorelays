@extends('layouts.app') @section('content')




<div class="breadcumbs-area">
    <ul>
        <li class="title-main">
            <h4>Required Product List</h4>
        </li>
        <li class="link-home"><a href="#."><i class="fa fa-home"></i></a></li>
        <li class="link-home"><a href="#.">Home</a></li>
        <li class="link-page"><a href="#.">Required Product List</a></li>
    </ul>
   
</div>
<div class="content-main-here">


  
    <div class="table-main-div">
        <div class="table-header">
            <h2><strong>Raw Material Requisite for "{{$category->name}}"</strong></h2>
			 
        </div>
        <div class="tableBody">
            <div class="table-responsive">
      

         @include('toast')

				<div class="form-group row">

							
							
							
				
				</div>
				 <p id="notice"></p>
				
                <table class="table display" id="myTable">
                    <thead>
                        <tr>

                             
                            <th>Product Name</th>
							
                           
                            
                            <th>Quantity</th>
                            
                            
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($products as $product)
                        <tr>


                         
                           
                            <td>{{App\MaterialProduct::getName($product->product_id)}}</td>
							 
                           
                            
                            <td>{{$product->qty}}</td>
                           
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
		 
    </div>
	
	
	
	
	</div>
	
	



    @endsection
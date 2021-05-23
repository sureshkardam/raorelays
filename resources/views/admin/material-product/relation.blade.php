@extends('layouts.app') @section('content')




<div class="breadcumbs-area">
    <ul>
        <li class="title-main">
            <h4>Relation</h4>
        </li>
        <li class="link-home"><a href="#."><i class="fa fa-home"></i></a></li>
        <li class="link-home"><a href="#.">Home</a></li>
        <li class="link-page"><a href="#.">Relation</a></li>
    </ul>
   
</div>
<div class="content-main-here">


  <form action="{{route('admin.material-relation',['id'=>$category->id])}}" id="popForm" enctype="multipart/form-data" method="post">
	@csrf
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
				<input type="hidden" name="category_id" value="{{$category->id}}" required>
                <table class="table display" id="myTable">
                    <thead>
                        <tr>

                             
                            <th>Product Name</th>
							<th>Category</th>
                           
                            
                            <th>Quantity</th>
                            
                            
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($products as $product)
                        <tr>


                         
                           
                            <td>{{$product->name}}</td>
							 <td>{{App\ProductToCategory::getProductCategoryByID($product->id)}}</td>
                           
                            
                            <td>
							
							
							<input type="hidden" name="product_id[]" value="{{$product->id}}" required>
							<input type="number" name="qty[]" class="form-control"  id="name" placeholder="Quantity" required>
							
							
							</td>
                           
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
	
	
	</form>
	
	</div>
	
	



    @endsection
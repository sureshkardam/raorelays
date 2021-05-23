@extends('layouts.app') @section('content')

<?php
if($order->type=='PR')
{

$title='Raw Material Request (Raw Material Department)';	
$button_text='Raw Material';
}else if($order->type=='RS')
	
	{
		$title='Purchase Request (Supplier)';	
		$button_text='Purchase';
		
	}else if($order->type=='JOB')
		
		{
		$title='Job Work Request';	
		$button_text='Job Work';
		}


?>

<div class="breadcumbs-area">
    <ul>
        <li class="title-main">
            <h4>{{$title}} Detail</h4>
        </li>
        <li class="link-home"><a href="#."><i class="fa fa-home"></i></a></li>
        <li class="link-home"><a href="#.">Home</a></li>
        <li class="link-page"><a href="#.">{{$title}} Detail</a></li>
    </ul>
   
</div>
<div class="content-main-here">


 <form class="add-patient-form" method="post" action="{{route('admin.material.purchase.save')}}" enctype="multipart/form-data">
                @csrf
		

    <div class="table-main-div">
        <div class="table-header">
            <h2><strong>{{$title}} Detail</strong></h2>
			 
        </div>
        <div class="tableBody">
            <div class="table-responsive">
      

         @include('toast')

				<div class="form-group row back-grey">

                           
						   @if($order->supplier_id)
						   
							 <div class="form-group col-sm-4">

             <label for="supplier_name" class="supplier_name">Supplier Name </label>
                                
                                 <select class="form-control  for-multiple select-form" id="supplier" name="supplier" disabled>
                                        
										 <option value="">Select Supplier</option>
										
										@foreach($suppliers as $supplier)
                                    <option value="{{$supplier->id}}" @if($supplier->id==$order->supplier_id)  selected @endif>{{$supplier->supplier_name}}</option>
                                    @endforeach
                                    </select>
                            </div>
                   @endif
                           
						   
						   @if($order->order_id)
						   
							<div class="form-group col-sm-4 order-inline">


                                <label for="order" class="order">Orders</label>
                                    <!-- Product Name -->
									
									
                                  @if($order->order_id)
									  <p>
								   <?php $order_display=json_decode($order->order_id); ?>
										
										{{$order_display}}
										</p>
								@endif
                            </div>
							@endif
							
							
							<div class="form-group col-sm-4">


                                <label for="order" class="order">Purchase Order Date
                                        <span style="color: red">*</span>
                                    </label>
                                 <input type="text" name="order_date"  class="form-control" value="{{$order->purchase_order_date}}" disabled >
                                
                            </div>
							
							 
							
							
					 <!--<input type="hidden" name="type" value="PR">-->
					 <input type="hidden" name="order" value="{{$order->id}}">		
				
				</div>
				
					<table class="table" id="myTable" style="margin-top:10px;">
        <thead>
            <tr>
			  
			   <th>S.No</th>
			   <th>Parent Name</th>
			   <th>Name</th>
               <th>Quantity(*)</th>
			   @if(App\PurchaseOrderProductRecieve::exists($order->id))
			<th>Recieved</th>	
			@endif	   
			   <th>Remarks</th>
            </tr>
        </thead>
		 <tbody>
		
		@foreach($products as $product) 
		<tr>
		 
		 <td>{{$loop->iteration }}</td>
		<td>{{App\Category::getName($product->parent_id)}}</td>
		<td>{{App\MaterialProduct::getName($product->product_id)}}
		 <input type="hidden" name="parent_id[]" value="{{$product->parent_id}}">
		 <input type="hidden" name="product_id[]" value="{{$product->product_id}}">
		
		</td>
		
		@if(App\PurchaseOrderProductRecieve::exists($order->id))
			
		 <td>
		
		 <input name="qty[]" value=" {{($product->qty)-(App\PurchaseOrderProductRecieve::getQty($order->id,$product->product_id))}}" class="form-control">
		 
		</td>
		
		<td>{{App\PurchaseOrderProductRecieve::getQty($order->id,$product->product_id)}}
		
		
		
		</td>
		@else
			
		 <td>
		
		 <input name="qty[]" value=" {{$product->qty}}" class="form-control">
		 
		</td>
		
		
		@endif
		 <td>
		 <input name="remarks[]" class="form-control" value="">
		 
		</td>
		  
		 </tr>
		
		 @endforeach
		
		 </tbody>
          </table>     
            </div>
        </div>
		  <div class="form-field-here text-center" style="margin-top: 20px">
                   
                    @if($order->status <> 0)
					
					<button id="save_purchase" type="submit" class="btn blue">
<i class="fa fa-plus-circle"></i> Recieve {{$button_text}} Request</button>
@endif
                </div>
    </div>
	
	
	
	</form>
	</div>
	

    @endsection
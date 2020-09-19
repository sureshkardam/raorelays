@extends('layouts.app') @section('content')




<div class="breadcumbs-area">
    <ul>
        <li class="title-main">
            <h4>Catalog</h4>
        </li>
        <li class="link-home"><a href="#."><i class="fa fa-home"></i></a></li>
        <li class="link-home"><a href="#.">Home</a></li>
        <li class="link-page"><a href="#.">Product Inventory Serial Wise</a></li>
    </ul>
   
</div>
<div class="content-main-here">




    <div class="table-main-div">
        <div class="table-header">
            <h2><strong>Product Inventory Serial Wise</strong></h2>
        </div>
        <div class="tableBody">
            <div class="table-responsive">
      

         @include('toast')

              
             

@if ($errors->any())
    <div class="alert alert-danger">
     
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
       
    </div>
@endif



                 <table class="table " id="myTable">
                            <thead>
                                <tr>
                                    <th>Order ID </th>
									<th>Order Type </th>
                                    <th>Product Name </th>
                                   
                                    <th>Price</th>
                                    
                                    <th>Status</th>
                                    <th>Dated</th>
                                </tr>
                            </thead>
                            <tbody>

                 @foreach($products as $product)
                        <tr>
                              
<td><a href="{{route('order.detail',$product->order_id)}}">{{$product->order_id}}</a></td>
					   
						   <td>{{$product->order_type ? 'Sale' : 'Rental' }}</td>	
                            <td>{{$product->name}}</td>
                            <td>{{$product->price}}</td>
                           
                            <td>
							
							@if($product->type==1)
								
							
									Rental Recieved
							
							@else
									@if($product->order_type==0)
									Rent Out
									@else
									Sold Out
									@endif
									
							
							@endif
								
							
							
							</td>
                             <td>{{date('M\. d\, Y', strtotime($product->created_at))}}</td>

                         </tr>
                         @endforeach
                            </tbody>
                        </table>
            </div>
        </div>
    </div>

    @endsection
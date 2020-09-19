@extends('layouts.app') @section('content')




<div class="breadcumbs-area">
    <ul>
        <li class="title-main">
            <h4>Catalog</h4>
        </li>
        <li class="link-home"><a href="#."><i class="fa fa-home"></i></a></li>
        <li class="link-home"><a href="#.">Home</a></li>
        <li class="link-page"><a href="#.">Product Inventory</a></li>
    </ul>
   
</div>
<div class="content-main-here">




    <div class="table-main-div">
        <div class="table-header">
            <h2><strong>Product Inventory</strong></h2>
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



                <table class="table" id="myTable">
                    <thead>
                        <tr>

                           
                            <th>Product Name</th>
                            <th>Serial</th>
							<th>Type</th>
							<th>Status</th>
							<th>Created</th>
                           
                            
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($products as $product)
                        <tr>
						
						 
						
						
                         <td>{{App\Product::getName($product->product_id)}}</td>
                         <td><a href="{{route('admin.track.serial',$product->serial_number)}}">{{$product->serial_number}}</a></td>
						 <td>{{$product->product_type ? 'Sale' : 'Rental' }}</td>
						 <td>
						 @foreach(config('app.product_inventory_status') as $key=>$value)
						 @if($key==$product->status)
						 {{$value}} 
						 @endif
						 @endforeach
						 
						 
						 
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
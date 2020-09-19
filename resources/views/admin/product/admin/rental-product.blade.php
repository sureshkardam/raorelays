@extends('layouts.app') 
@section('content')




<div class="breadcumbs-area">
    <ul>
        <li class="title-main">
            <h4>Catalog</h4>
        </li>
        <li class="link-home"><a href="#."><i class="fa fa-home"></i></a></li>
        <li class="link-home"><a href="#.">Home</a></li>
        <li class="link-page"><a href="#.">Rental Product List</a></li>
    </ul>
   
</div>
<div class="content-main-here">




    <div class="table-main-div mt-0">
        <div class="table-header">
            <h2><strong>Rental Product List</strong></h2>
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
                            <th>Total</th>
							<th>Used</th>
							<th>Available</th>
                            <th>Status</th>
                             <th>Created</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($products as $product)
                        <tr>

                          
                             <td><a href="{{route('admin.product.inventory',$product->id)}}">{{$product->name}}</a></td>
                            <td>{{App\ProductSerialType::getTotalRentalQty($product->id)}}</td>
							<td>{{App\ProductSerialType::getTotalRentalQtyUsed($product->id)}}</td>
							<td>{{App\ProductSerialType::getTotalRentalQtyAvailable($product->id)}}</td>
                            <td>{{$product->status ? 'Enabled' : 'Disabled' }}</td>
                             <td>{{date('M\. d\, Y', strtotime($product->created_at))}}</td>

                              <td>
                               
                                <a class="action-dash" href="{{route('admin.serial.create',$product->id)}}"><i class="fa fa-list-ol" aria-hidden="true" title="Manage Serial"></i>
                                                    Manage Serial</a>
                                </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    @endsection
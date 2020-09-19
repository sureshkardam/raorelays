@extends('layouts.app') @section('content')

<div class="breadcumbs-area">
    <ul>
        <li class="title-main">
            <h4>Received Rental Product</h4>
        </li>
        <li class="link-home"><a href="#."><i class="fa fa-home"></i></a></li>
        <li class="link-home"><a href="#.">Home</a></li>
        <li class="link-page"><a href="#.">Received Rental Product</a></li>
    </ul>
</div>
<div class="content-main-here received-rental-product">



  <div class="filter-blocks multi-fields-set">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card-here">


                                    

                        <form class="row" action="{{route('rental.received.form')}}" method="post">
                               @csrf
                                    

                                      
                                              <div class="input-filter col-sm-3">
                                          
                                            <input type="text" name="serial" placeholder="Serial Number">
                                         
                                        </div>
                              
                                        <div class="input-filter submit col-sm-2">
                                            <button title="Click To Filter">
                                                <i class="fa fa-filter"></i>
                                                <input type="submit" value="Get Details">
                                            </button>
                                        </div>
                                    </form>
                                
                                    
                                    
                                    
                                    
                                </div>
                            </div>
                        </div>
                    </div>



    <div class="table-main-div" style="margin-top: 30px;">        
       
        <div class=" table-header ">
            <h2><strong>Received Rental Product</strong></h2>
        </div>
        @include('toast')
        <form class="row" method="post" action="{{route('rental.received.product')}}" enctype="multipart/form-data">
             @csrf
            <div class="table-cart-here-rental col-sm-12">
               <div class="rental-main-div">                      
                    <div class="heading-rental">
                        <div class="heading-item-rental">Order ID </div>
                        <div class="heading-item-rental">Product Name </div>
                        <div class="heading-item-rental">Sku</div>
                        <div class="heading-item-rental">Price</div>
                        <div class="heading-item-rental">Quantity</div>
                        <div class="heading-item-rental">Created at</div>
                    </div>                        
                    <div class="content-rental">
                            @if($order_product)               
                            <div class="content-item-rental">{{$order_product->order_id}}</div>
                            <div class="content-item-rental">{{$order_product->name}}</div>
                            <div class="content-item-rental">{{$order_product->sku}}</div>
                            <div class="content-item-rental">{{$order_product->price}}</div>
                            <div class="content-item-rental">{{$order_product->serial}}</div>
                            <div class="content-item-rental">{{date('M\. d\, Y', strtotime($order_product->created_at))}}</div>
                            @else
                            <p>No Record Found</p>
                            @endif
                        
                    </div>
                </div>         
               
                    @if($order_product)                                      
                       <!--<div class="input-filter col-sm-4">
                    <select class="form-control" name="order_status">
                        <option value="">Select Status</option>
                        @foreach(config('app.product_inventory_status') as $key=>$value)
                        <option value="{{$key}}">{{$value}}</option>
                        @endforeach
                    </select>
                </div>-->
                    <input type="hidden" name="id" value="{{$order_product->id}}">
                <div class="input-filter submit col-sm-2">
                    <button type="submit" title="Click To Filter" class="btn blue">
                       
                        Receive Product
                    </button>
                </div>
                 @endif              
            </div>
        </form>
    </div>


    @endsection
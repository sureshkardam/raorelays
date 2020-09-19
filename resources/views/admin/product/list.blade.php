@extends('layouts.app') @section('content')




<div class="breadcumbs-area">
    <ul>
        <li class="title-main">
            <h4>Catalog</h4>
        </li>
        <li class="link-home"><a href="#."><i class="fa fa-home"></i></a></li>
        <li class="link-home"><a href="#.">Home</a></li>
        <li class="link-page"><a href="#.">Product List</a></li>
    </ul>
    <div class="create-button">
        <a href="{{route('admin.product.create')}}"><i class="fa fa-plus"></i></a>
        <a href="#." class="filter-button"><i class="fa fa-filter"></i> Filter</a>
    </div>
</div>
<div class="content-main-here">
    <div class="filter-blocks">
        <div class="row">
            <div class="col-sm-12">
                <div class="card-here">
                    <h3>Filter</h3>



                    <form class="row" action="{{route('admin.product.list')}}" method="post">
                        <div class="input-filter col-sm-4">
                            <input type="text" name="from" class="date-picker" placeholder="From Date">
                        </div>
                        <div class="input-filter col-sm-4">
                            <input type="text" name="to" class="date-picker" placeholder="To Date">
                        </div>
                        @csrf
                        <div class="input-filter submit col-sm-2">
                            <button title="Click To Filter">
                                                <i class="fa fa-filter"></i>
                                                <input type="submit" value="Filter">
                                            </button>
                        </div>
                    </form>





                </div>
            </div>
        </div>
    </div>



    <div class="table-main-div">
        <div class="table-header">
            <h2><strong>All Product</strong></h2>
			<div class="create-button">
        <a href="{{route('admin.product.create')}}"><i class="fa fa-plus"></i></a>
       
    </div>
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
                            <th>Product Code</th>
                            <th>Status</th>
                            <th>Created</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($products as $product)
                        <tr>


                         
                           
                            <td>{{$product->name}}</td>
                            <td width="100">{{$product->sku}}</td>
                            
                          
                            <td>
							@if($product->status==0) Disabled   @endif
							@if($product->status==1) Enabled   @endif
							@if($product->status==2) Archived   @endif
							
							
							</td>
                             <td>{{date('M\. d\, Y', strtotime($product->created_at))}}</td>

                              <td>
                                  
                                   <div class="action-dropdown-icons">
                                    <div class="action-btns">

                           
                                <a class="action-dash" href="{{route('admin.product.edit',$product->id)}}"><i class="fa fa-pencil" aria-hidden="true" title="Edit"></i></a>

                      
                               

                                 <a onclick="deleteConfirm('product',{{$product->id}},'{{$product->name}}')"><i class="fa fa-trash" aria-hidden="true" title="Delete"></i></a> 
                        
                                       </div>


                            
                                </div>
                                </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
	
	
	</div>
    </div>

    @endsection
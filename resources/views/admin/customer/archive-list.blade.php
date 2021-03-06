@extends('layouts.app')
@section('content')
<div class="breadcumbs-area with-label">
                    <ul>
                        <li class="title-main">
                            <h4>Archived Customers</h4>
                        </li>
                        <li class="link-home"><a href="#."><i class="fa fa-home"></i></a></li>
                        <li class="link-home"><a href="#.">Home</a></li>
                        <li class="link-page"><a href="#.">Customer List</a></li>
                    </ul>
                    <div class="create-button">
                        <a title="Add New" href="{{route('admin.customer.create')}}"><i class="fa fa-plus"></i> Create Customer</a>
                        <a href="#." class="filter-button"><i class="fa fa-filter"></i> Filter</a>
                    </div>
                </div>
                <div class="content-main-here">
                   <!--<div class="filter-blocks">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card-here">
                                    <h3>Filter</h3>

                                   <form class="row" action="{{route('admin.customer.list')}}" method="post">
                                    <div class="input-filter col-sm-4">
                                            <input type="date" name="from" placeholder="From Date">
                                        </div>
                                        <div class="input-filter col-sm-4">
                                            <input type="date" name="to" placeholder="To Date">
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
                    </div>-->


                    <div class="table-main-div">
                        <div class="table-header">
                            <h2><strong>Archived Customers</strong></h2>
							<div class="create-button">
                        <a title="Add New" href="{{route('admin.customer.create')}}"><i class="fa fa-plus"></i> Create Customer</a>
                       
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
                                    
 

                        
                    <table class="table customer-list" id="myTable">
                                <thead>
                                    <tr>
                                        <th>Customer Name</th>
                                        <th>Code</th>
										<th>Email</th>
                                        <th>Contact Number</th>
										 <th>Status</th>
                                        
                                        <th>Action</th>
                                       
                                    </tr>
                                </thead>
                                <tbody>
                @foreach ($customers as $customer)
                                    <tr>
                                        <td>{{$customer->contact_name}}</td>
                                        <td>{{$customer->customer_code}}</td>
                                        <td>{{$customer->email}}</td>
										<td>{{$customer->mobile}}</td>
							<td>
							
							@if($customer->status==0)
								Disabled
							@endif
							@if($customer->status==1)
								Enabled
							@endif
							@if($customer->status==2)
								Archived
							@endif
							
							</td>
										
                                        <td>

<!-- Edit -->
<a href="{{route('admin.order.create',$customer->id)}}"><i class="fa fa-plus" aria-hidden="true" title="Create Order"></i></a>


                   <a href="{{route('admin.customer.edit',$customer->id)}}"><i class="fa fa-pencil" aria-hidden="true" title="Edit"></i></a>
  
    <a onclick="deleteConfirm('customer',{{$customer->id}},'{{$customer->contact_name}}')"><i class="fa fa-trash" aria-hidden="true" title="Delete"></i></a> 

</td>
                                        
                                          
                                    </tr>
                                 @endforeach  
                                </tbody>
                            </table>
                        </div>
                        </div>
                    </div>
         
<script>
$(document).ready(function() {
    $('#customer-list').click(function() {
        //$('.navbar-nav li').removeClass('check');
        $(this).addClass('check');
    })
});
</script>
@endsection


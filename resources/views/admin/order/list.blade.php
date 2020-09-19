@extends('layouts.app') 
@section('content')




<div class="breadcumbs-area with-label">
                    <ul>
                        <li class="title-main">
                            <h4>Sales</h4>
                        </li>
                        <li class="link-home"><a href="#."><i class="fa fa-home"></i></a></li>
                        <li class="link-home"><a href="#.">Home</a></li>
                        <li class="link-page"><a href="#.">Orders</a></li>
                    </ul>
                    <div class="create-button">
					  
                       
						<a title="Create Order" href="{{route('admin.order.create')}}"><i class="fa fa-plus"></i> Create Order</a>
						
						
                      
						</div>
						
				</div>
                <div class="content-main-here">
                    <div class="filter-blocks multi-fields-set">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card-here">

<h3>Filter</h3>
                                    

                                   <form class="row" action="{{route('admin.order.list')}}" method="post">

                                     

                                        <div class="input-filter col-sm-2">
                                          
                                            <input type="text" name="order_id" placeholder="Order ID">
                                         
                                        </div>

                                       

                                         <div class="input-filter col-sm-2">
                                            <input type="text" name="from" placeholder="From Date" class="date-picker">
                                        </div>
                                        <div class="input-filter col-sm-2">
                                            <input type="text" name="to" placeholder="To Date" class="date-picker">
                                        </div>
                                         
                                           
                                                 <div class="input-filter col-sm-4">


                                     <select class="form-control" name="order_status">
                                            <option value="">Select Order Status</option>
                                            @foreach($order_status as $order_status)
                                            <option value="{{$order_status->id}}">{{$order_status->name}}</option>
                                            @endforeach
                                          </select>
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
                            <h2><strong>Order</strong></h2>
							 <div class="create-button">
					  
						<a title="Create Order" href="{{route('admin.order.create')}}"><i class="fa fa-plus"></i></a>
						
						
                      
						</div>
                        </div>
                        <div class="tableBody">
                            <div class="table-responsive">
                              @include('toast')
                         <table class="table" id="myTable">
                            <thead>
                                <tr>
                                    
                                    <th>Order Id</th>
									 <th>Plant ID</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                   
                                    
                                     <th>Status</th>
									 	<th>Order Date</th>
                                    
									<th>Action</th>
									
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($orders as $order)
                                <tr>
                                  
                                    <td>{{$order->display_order_id}}</td>
									<td>{{App\Plant::getPlantId($order->plant)}}</td>
									
									<td>{{App\Customer::getName($order->user_id)}}</td>
                                    
                                    <td>{{App\Customer::getEmail($order->user_id)}}</td>
                                  
									 <td>{{App\OrderStatus::getName($order->order_status_id)}}</td>
									
									 <td>{{date('M\. d\, Y', strtotime($order->created_at))}}</td>
                                     
                               

                                   
                                    <td>
                                      
										<a class="action-dash prl-5" href="{{route('admin.order.detail',$order->id)}}"><i class="fa fa-eye" aria-hidden="true"></i></a>
										
									@if($order->order_status_id=='8')	
										<a class="action-dash prl-5" href="{{route('admin.order.edit',$order->id)}}"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                                    @endif        
                                
								 
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
</div>




@endsection

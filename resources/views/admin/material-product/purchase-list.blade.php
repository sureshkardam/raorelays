@extends('layouts.app') 
@section('content')




<div class="breadcumbs-area with-label">
                    <ul>
                        <li class="title-main">
                            <h4>Purchase Request List</h4>
                        </li>
                        <li class="link-home"><a href="#."><i class="fa fa-home"></i></a></li>
                        <li class="link-home"><a href="#.">Home</a></li>
                        <li class="link-page"><a href="#.">Purchase Request List</a></li>
                    </ul>
                    <div class="create-button">
					  
                       
						<a title="Create Order" href="{{route('admin.order.create')}}"><i class="fa fa-plus"></i> Create Purchase Request</a>
						
						
                      
						</div>
						
				</div>
                <div class="content-main-here">
                    <div class="filter-blocks multi-fields-set">
              
                    </div>



                    <div class="table-main-div">
                        <div class="table-header">
                            <h2><strong>Purchase Request List</strong></h2>
							 <div class="create-button">
						
						
							<a title="Create Purchase Request" href="{{route('admin.material.purchase')}}"><i class="fa fa-plus"></i> Create Purchase Request</a>
					  
					  
                      
						</div>
                        </div>
                        <div class="tableBody">
                            <div class="table-responsive">
                              @include('toast')
                         <table class="table" id="myTable">
                            <thead>
                                <tr>
                                    
                                   <th>Order#</th>
								   <th>Reference order #</th>
                                   <th>Supplier</th>
								   <th>Order Date</th>
                                   
								   <th>Created by</th>
								   <th>Created At</th>
								   <th>Action</th>
									
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($orders as $order)
                                <tr 
								@if($order->status==0)
									style="color:green";
								@endif
								@if($order->status==1 && App\PurchaseOrderProductRecieve::exists($order->id))
									style="color:orange";
								@endif
								@if($order->status==1)
									style="color:red";
								@endif
								
								>
                                  
                                    <td>{{$order->id}}</td>
									 <td>{{json_decode($order->order_id)}}</td>
									<td>@if($order->supplier_id) 
									{{App\Supplier::getName($order->supplier_id)}}
										@endif
									
									</td>
									<td>{{date('M\. d\, Y', strtotime($order->purchase_order_date))}}</td>
									
									<td>{{App\User::getName($order->created_by)}}</td>
									<td>{{date('M\. d\, Y', strtotime($order->created_at))}}</td>
									

                                   
                                    <td>
                                       
                                      <div class="action-dropdown-icons">
                                    <div class="action-btns">
                                        <a href="{{route('admin.get.purchase.order.product',['id'=>$order->id])}}"><i class="fa fa-eye" aria-hidden="true" title="Edit"></i></a>
                                       
                                           
                                        
                                    </div>
                                    <div class="dropdown icon-action-dropdown">
                                        <a class="dropdown-toggle btnMore" data-toggle="dropdown" href="#" aria-expanded="true">More <i class="fa fa-caret-down" title="Click to More"></i></a>

                                        <ul class="dropdown-menu">
                                           

												<li> <a href="{{route('print.pdf',['id'=>$order->id,'type'=>'1'])}}"><i class="fa fa-file-pdf-o" aria-hidden="true"></i> Download Request</a></li>
												  

											   <li>
										<a href="{{route('print.pdf',['id'=>$order->id,'type'=>'0'])}}"><i class="fa fa-file-pdf-o" aria-hidden="true"></i> Download Reciept</a>
									</li>
                                                    
                                                           

                                                    


                                          

                                           
                                        </ul>
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
</div>




@endsection

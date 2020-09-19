@extends('layouts.app')
@section('content')
<div class="breadcumbs-area with-label">
    <ul>
        <li class="title-main">
            <h4>Order Status</h4>
        </li>
        <li class="link-home"><a href="#."><i class="fa fa-home"></i></a></li>
        <li class="link-home"><a href="#.">Home</a></li>
        <li class="link-page"><a href="#.">Order Status</a></li>
    </ul>
    <div class="create-button">
        <a href="" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-plus"></i> Create Status</a>
    </div>
</div>
<div class="table-main-div" style="margin-top: 0;">
    <div class="table-header">
        <h2><strong>Order Status</strong></h2>
		 <div class="create-button">
        <a href="" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-plus"></i> Create Status</a>
    </div>
    </div>
    <div class="tableBody">
        <div class="table-responsive">

            @include('toast')
            <div class="edit-account">
                <table class="table" id="myTable">
                    <thead>
                        <tr>
                                        <th>Name</th>
                                         <th>Status</th>
                                        <th>Created</th>  
                                        <th>Action</th>
                                       
                                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($order_status as $order_status)

                                    <tr>
                                        <td>{{$order_status->name}}</td>
                                        
                                         <td>{{$order_status->status ? 'Enabled' : 'Disabled'}}</td>
                                       
                                      <td>{{date('M\. d\, Y', strtotime($order_status->created_at))}}</td>
                           
                            <td width="60px">
          <!-- Edit -->     <a data-toggle="modal" data-target="#exampleModal_{{$order_status->id}}">
                            <i class="fa fa-pencil" aria-hidden="true" title="Edit"></i></a>
                                


            <!-- delete   -->  

                         <a onclick="deleteConfirm('order-status',{{$order_status->id}},'{{$order_status->name}}')"><i class="fa fa-trash" aria-hidden="true" title="Delete"></i></a> 


                        <div class="modal fade" id="exampleModal_{{$order_status->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Edit Order Status </h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                </button>
                                            </div>
                                            <div class="modal-body manu-add">
                                                <form action="{{route('order.status.edit',$order_status->id)}}" id="popForm" method="post" enctype="multipart/form-data">
                                               
                                                         <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />

                                                        
                                                       <div class="form-field-here">
                                                            
                                                            <label for="name">Name
                                                                <span style="color: red">*</span>
                                                            </label>

                                                             @if(Session::has('EditOrderStatusErrors'))
                                    @foreach(Session::get('EditOrderStatusErrors')->get('Name') as $errorMessage)
                                  <span class="label label-danger">{{$errorMessage}}</span>
                                  @endforeach
                                    @endif
                                                            <input type="text" name="name" id="title" value="{{$order_status->name}}" class="form-control input-md" required>
                                                        </div>
                                                        
                                                        
                                                        <div class="form-field-here">
                                                            <label for="status">Status :</label>
                                                            <select class="custom-select form-control" name="status" id="edit_status">
                                                                <option value="1" @if($order_status->status==1)selected @endif>Enabled</option>
                                                                <option value="0" @if($order_status->status==0)selected @endif>Disabled</option>
																<option value="2" @if($order_status->status==2)selected @endif>Archived</option>
                                                            </select>
                                                        </div>
                       
                                                    </div>

                                                    <div class="modal-footer">
                                                <button type="button" class="btn blue" data-dismiss="modal">Close</button>
                                                     
                                                        <button type="submit" class="btn blue">Update</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
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


<!-- Create -->

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Order Status</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <div class="modal-body manu-add">
                <form action="{{ route('order.status.create') }}" id="popForm" method="post" >
                    @csrf
                    <div class="popper-box">
                        
                        
                        <div class="form-field-here">
                           
                            <label for="name">Name
                                <span style="color: red">*</span>
                            </label>
                             @if(Session::has('CreateOrderStatusErrors'))
                                    @foreach(Session::get('CreateOrderStatusErrors')->get('Name') as $errorMessage)
                                  <span class="label label-danger">{{$errorMessage}}</span>
                                  @endforeach
                                    @endif
                            <input type="text" name="name" id="name" value="{{old('name')}}" placeholder="Enter Your Name" class="form-control input-md">
                        </div>
                       
                        <div class="form-field-here">
                            <label for="attribute">Status :</label>
                            <select class="custom-select form-control" name="status" id="status">
                                <option value="1" selected>Enabled</option>
                                <option value="0">Disabled</option>
								<option value="2">Archived</option>
                            </select>
                        </div>



                     


                      
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn blue" data-dismiss="modal">Close</button>
                 
                        <button type="submit" class="btn blue">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>



                                                      

                   
@endsection

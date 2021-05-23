@extends('layouts.app')
@section('content')
<div class="breadcumbs-area with-label">
    <ul>
        <li class="title-main">
            <h4>Supplier</h4>
        </li>
        <li class="link-home"><a href="#."><i class="fa fa-home"></i></a></li>
        <li class="link-home"><a href="#.">Home</a></li>
        <li class="link-page"><a href="#.">Supplier</a></li>
    </ul>
    <div class="create-button">
        <a href="" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-plus"></i> Create Supplier</a>
    </div>
</div>
<div class="table-main-div" style="margin-top: 0;">
    <div class="table-header">
        <h2><strong>Supplier List</strong></h2>
		<div class="create-button">
        <a href="" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-plus"></i> Create Supplier</a>
    </div>
    </div>
    <div class="tableBody">
        <div class="table-responsive">

            @include('toast')
            <div class="edit-account">
                <table class="table" id="myTable">
                    <thead>
                        <tr>
                                        
										<th>Supplier Name</th>
										<th>Address</th>
										
										<th>Mobile</th>
										<th>Description</th>
                                         <th>Status</th>
                                        <th>Created</th>  
                                        <th>Action</th>
                                       
                                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($suppliers as $supplier)

                                    <tr>
                                       
										<td>{{$supplier->supplier_name}}</td>
										<td>{{$supplier->registered_address}}</td>
										<td>{{$supplier->mobile}}</td>
										<td>{{$supplier->description}}</td>
										
                                        
                                         <td>{{$supplier->status ? 'Enabled' : 'Disabled'}}</td>
                                       
                                      <td>{{date('M\. d\, Y', strtotime($supplier->created_at))}}</td>
                           
                            <td width="60px">
          <!-- Edit -->     <a data-toggle="modal" data-target="#exampleModal_{{$supplier->id}}">
                            <i class="fa fa-pencil" aria-hidden="true" title="Edit"></i></a>
                                


            <!-- delete   -->  

                         <a onclick="deleteConfirm('supplier',{{$supplier->id}},'{{$supplier->name}}')"><i class="fa fa-trash" aria-hidden="true" title="Delete"></i></a> 


                        <div class="modal fade" id="exampleModal_{{$supplier->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Edit Supplier </h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                </button>
                                            </div>
                                            <div class="modal-body manu-add">
                                                <form action="{{route('admin.supplier.edit',$supplier->id)}}" id="popForm" method="post" enctype="multipart/form-data">
                                               
                                                         <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />

                                                        
                                                       
													   
													   
													   <div class="form-field-here">
                                                            
                                                            <label for="name">Name
                                                                <span style="color: red">*</span>
                                                            </label>

                                                             @if(Session::has('EditPlantErrors'))
                                    @foreach(Session::get('EditPlantErrors')->get('Name') as $errorMessage)
                                  <span class="label label-danger">{{$errorMessage}}</span>
                                  @endforeach
                                    @endif
                                                            <input type="text" name="name" id="title" value="{{$supplier->supplier_name}}" class="form-control input-md" required>
                                                        </div>
                                                       






<div class="form-field-here">
                           
                            <label for="name">Address
                                <span style="color: red">*</span>
                            </label>
                             @if(Session::has('EditPlantErrors'))
                                    @foreach(Session::get('EditPlantErrors')->get('Address') as $errorMessage)
                                  <span class="label label-danger">{{$errorMessage}}</span>
                                  @endforeach
                                    @endif
                            <input type="text" name="registered_address" id="registered_address" value="{{$supplier->registered_address}}" class="form-control input-md" required>
                        </div>
						
						
					
						
						
						<div class="form-field-here">
                           
                            <label for="name">Mobile
                                <span style="color: red">*</span>
                            </label>
                             @if(Session::has('EditPlantErrors'))
                                    @foreach(Session::get('EditPlantErrors')->get('Mobile') as $errorMessage)
                                  <span class="label label-danger">{{$errorMessage}}</span>
                                  @endforeach
                                    @endif
                            <input type="text" name="mobile" id="edit-mobile" value="{{$supplier->mobile}}" class="form-control input-md" required>
                        </div>
							<div class="form-field-here">
                           
                            <label for="name">Description
                                
                            </label>
                            
                            <input type="text" name="description" value="{{$supplier->description}}" class="form-control input-md">
                        </div>
	   
                                                        
                                                        <div class="form-field-here">
                                                            <label for="status">Status :</label>
                                                            <select class="custom-select form-control" name="status" id="edit_status">
                                                                <option value="1" @if($supplier->status==1)selected @endif>Enabled</option>
                                                                <option value="0" @if($supplier->status==0)selected @endif>Disabled</option>
																
																 <option value="2" @if($supplier->status==2)selected @endif>Archived</option>
																
																
                                                            </select>
                                                        </div>
                       
                                                    </div>

                                                    <div class="modal-footer">
                                                
                                                     
                                                        <button type="submit" class="btn blue">Update</button>
														
														<button type="button" class="btn blue" data-dismiss="modal">Close</button>
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
                <h5 class="modal-title" id="exampleModalLabel">Create Supplier</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <div class="modal-body manu-add">
                <form action="{{ route('admin.supplier.create') }}" id="popForm" class="plant-form" method="post" >
                    @csrf
                    <div class="popper-box">
                        
                        
                        
						
						
						<div class="form-field-here">
                           
                            <label for="name">Name
                                <span style="color: red">*</span>
                            </label>
                             @if(Session::has('CreatePlantErrors'))
                                    @foreach(Session::get('CreatePlantErrors')->get('Name') as $errorMessage)
                                  <span class="label label-danger">{{$errorMessage}}</span>
                                  @endforeach
                                    @endif
                            <input type="text" name="name" id="name" value="{{old('name')}}" placeholder="Enter Your Name" class="form-control input-md" required>
                        </div>
						
						
						<div class="form-field-here">
                           
                            <label for="name">Address
                                <span style="color: red">*</span>
                            </label>
                             @if(Session::has('CreatePlantErrors'))
                                    @foreach(Session::get('CreatePlantErrors')->get('RegisteredAddress') as $errorMessage)
                                  <span class="label label-danger">{{$errorMessage}}</span>
                                  @endforeach
                                    @endif
                            <input type="text" name="registered_address" id="registered_address" value="{{old('registered_address')}}" placeholder="address" class="form-control input-md" required>
                        </div>
						
						
						
						
						
						<div class="form-field-here">
                           
                            <label for="name">Mobile
                                <span style="color: red">*</span>
                            </label>
                             @if(Session::has('CreatePlantErrors'))
                                    @foreach(Session::get('CreatePlantErrors')->get('Mobile') as $errorMessage)
                                  <span class="label label-danger">{{$errorMessage}}</span>
                                  @endforeach
                                    @endif
                            <input type="text" name="mobile" id="mobile" value="{{old('mobile')}}" placeholder="Mobile" class="form-control input-md" required>
                        </div>
						
                       <div class="form-field-here">
                           
                            <label for="name">Description
                              
                            </label>
                            
                            <input type="text" name="description" id="telephone" value="{{old('description')}}" placeholder="Description" class="form-control input-md">
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
                        
						<button type="submit" class="btn blue">Save</button>
						
						<button type="button" class="btn blue" data-dismiss="modal">Close</button>
                 
                        
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@if(Session::has('CreatePlantErrors'))
   <script>
   $("#exampleModal").modal('show');
   $("#exampleModal").addClass('in').css('display','block');
   
	</script>
@endif


                                                   

                   
@endsection

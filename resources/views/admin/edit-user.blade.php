	@extends('layouts.app')
@section('content')
  


                <div class="breadcumbs-area">
                    <ul>
                        <li class="title-main">
                            <h4>User</h4>
                        </li>
                        <li class="link-home"><a href="#."><i class="fa fa-home"></i></a></li>
                        <li class="link-home"><a href="#.">Home</a></li>
                        <li class="link-page"><a href="#.">Edit User</a></li>
                    </ul>
                    <!-- <div class="create-button">
                        <a title="Add New" href="#."><i class="fa fa-plus"></i></a>
                    </div> -->
                </div>
                <div class="content-main-here">
                    <div class="table-main-div" style="margin-top: 0px;">
                        <div class=" table-header ">
                            <h2><strong>Edit User</strong> </h2>
                        </div>
          
       @include('toast')


             <div class="form-default">
 
         
    
      
            <form action=""  method="post" class="user_form">
                                   
                                @csrf    
                                
								<div class="form-group row">
								 <div class="form-group col-sm-6">
								  <label for="full name" class="hello">Employee Name
                           <span style="color: red">*</span>
                            </label>
								  
								  @if(Session::has('userErrorMessage'))
                                    @foreach(Session::get('userErrorMessage')->get('Name') as $errorMessage)
                                     <span class="label label-danger">{{$errorMessage}}</span>
                                      @endforeach
                                       @endif
								 
								 <input type="text"  id="name" name="name" class="form-control" value="{{$user->name}}" required>

								 </div>
								 
								 
								 <div class="form-group col-sm-6">
								  <label for="full name" class="hello">Email
                           <span style="color: red">*</span>
                            </label>
								  
								  @if(Session::has('userErrorMessage'))
                                    @foreach(Session::get('userErrorMessage')->get('Email') as $errorMessage)
                                     <span class="label label-danger">{{$errorMessage}}</span>
                                      @endforeach
                                       @endif
								 
								 <input type="text"   id="email" name="email" class="form-control" value="{{$user->email}}" required>

								 </div>
								 
								 
              
                                       <div class="form-group col-sm-6">
                                    <label for="employee_id" class="hello">Employee ID
                           <span style="color: red">*</span>
                            </label>
                                         
										 
										  @if(Session::has('userErrorMessage'))
                                    @foreach(Session::get('userErrorMessage')->get('EmployeeId') as $errorMessage)
                                     <span class="label label-danger">{{$errorMessage}}</span>
                                      @endforeach
                                       @endif
										 <input type="text" @if($user->apPersonal)  value="{{$user->apPersonal->employee_id}}" @endif name="employee_id" class="form-control" required>
                                        </div>
										
                                        <div class="form-group col-sm-6">
                                        <label for="" class="hello">Contact Number
                           <span style="color: red">*</span>
                            </label>
                                             @if(Session::has('userErrorMessage'))
                                    @foreach(Session::get('userErrorMessage')->get('ContactNumber') as $errorMessage)
                                     <span class="label label-danger">{{$errorMessage}}</span>
                                      @endforeach
                                       @endif
											
		<input id="contact_number" type="number"  @if($user->apPersonal) value="{{$user->apPersonal->telephone}}" @endif name="contact_number" class="form-control" placeholder="" required> 
                                        </div>
										
										
											<div class="form-group col-sm-6">
                                            <label for="status" class="hello">Status
												<span style="color: red">*</span>
											</label>                                    
                                            <select class="form-control" name="status" required>
                                              <option @if($user->status == 1) selected @endif value="1" selected>Enabled</option>
                                              <option @if($user->status == 0) selected @endif value="0">Disabled</option>
											  <option @if($user->status == 2) selected @endif value="2">Archived</option>
											  
                                            </select>
                                        </div>

                                    </div>
                                   
                           
                                    <div class="form-group row">
                        <div class="form-group form-check col-sm-12 text-center">
                   
                           <button type="submit" class="btn blue">Update User</button>
                        </div>
                   
 </div>
                                </form>
                
            </div>
        </div>




             
                
<script>
$(document).ready(function() {
    $('.user_form').bootstrapValidator({
        message: 'This value is not valid',
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            email: {
                validators: {
                    notEmpty: {
                        message: 'The email address is required and cannot be empty'
                    },
                    regexp: {
                        regexp: /^\w+@[a-zA-Z_]+?\.[a-zA-Z]{2,3}$/,
                        message: 'The Email format is not valid'
                    }
                }
            },
			contact_number: {
                validators: {
                    notEmpty: {
                        message: 'Contact Number is required and cannot be empty'
                    },
                   
					stringLength: {
                        min: 10,
                        max: 10,
                        message: 'Contact Number is not valid'
                    },
                }
            },
			
			
        }
    });
});
</script> 
    

@endsection
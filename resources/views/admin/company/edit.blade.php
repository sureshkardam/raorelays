@extends('layouts.app') 
@section('content')

                <div class="breadcumbs-area">
                    <ul>
                        <li class="title-main">
                            <h4>Customer</h4>
                        </li>
                        <li class="link-home"><a href="#."><i class="fa fa-home"></i></a></li>
                        <li class="link-home"><a href="#.">Home</a></li>
                        <li class="link-page"><a href="#.">Edit Company</a></li>
                    </ul>
                    <!-- <div class="create-button">
                        <a title="Add New" href="#."><i class="fa fa-plus"></i></a>
                    </div> -->
                </div>
                <div class="content-main-here">
                    <div class="table-main-div" style="margin-top: 0px;">
                        <div class=" table-header ">
                            <h2><strong>Edit Company</strong> </h2>
                        </div>
						@include('toast')
             @if ($errors->any())
    <div class="alert alert-danger">
     
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
       
    </div>
@endif 


             <div class="form-default ">
      
                               <form class="customer_form" method="post" action="{{route('admin.company.edit',$company->id)}}">
                                    <div class="form-group row">
                                         <div class="form-group col-sm-6">
                                               <label for="Company name" class="hello">Company Name
                                      <span style="color: red">*</span>
                                        </label>

<!-- Name -->
                                            <input type="text" name="company_name" class="form-control"  value="{{$company->company_name}}" required>
                                            @if(Session::has('CompanyErrorMessage'))
                         @foreach(Session::get('CompanyErrorMessage')->get('CompanyName') as $errorMessage)
                        <span class="label label-danger">{{$errorMessage}}</span>
                         @endforeach
                            @endif
                                        </div>
                                        @csrf
                          
						  
										<div class="form-group col-sm-6">
											<label>Company Code<span style="color: red">*</span></label>
                                            <input type="text" name="company_code" class="form-control" id="company_code" value="{{$company->company_id}}" required>
											@if(Session::has('CompanyErrorMessage'))
                         @foreach(Session::get('CompanyErrorMessage')->get('CompanyCode') as $errorMessage)
                        <span class="label label-danger">{{$errorMessage}}</span>
                         @endforeach
                            @endif
                                        </div>
										
										
										<div class="form-group col-sm-6">
											<label>Contact Number<span style="color: red">*</span></label>
                                            <input type="text" name="mobile" class="form-control" id="mobile" value="{{$company->mobile}}" required>
											@if(Session::has('CompanyErrorMessage'))
                         @foreach(Session::get('CompanyErrorMessage')->get('ContactNumber') as $errorMessage)
                        <span class="label label-danger">{{$errorMessage}}</span>
                         @endforeach
                            @endif
                                        </div>
										<div class="form-group col-sm-6">
											<label>Additional Contact Number</label>
                                            <input type="text" name="telephone" class="form-control" id="telephone" value="{{$company->telephone}}" >
											@if(Session::has('CompanyErrorMessage'))
                         @foreach(Session::get('CompanyErrorMessage')->get('AdditionalContactNumber') as $errorMessage)
                        <span class="label label-danger">{{$errorMessage}}</span>
                         @endforeach
                            @endif
                                        </div>
										<div class="form-group col-sm-6">
											<label>Registered Address<span style="color: red">*</span></label>
                                            <input type="text" name="registered_address" class="form-control" id="registered_address" value="{{$company->registered_address}}" required>
											@if(Session::has('CompanyErrorMessage'))
                         @foreach(Session::get('CompanyErrorMessage')->get('RegisteredAddress') as $errorMessage)
                        <span class="label label-danger">{{$errorMessage}}</span>
                         @endforeach
                            @endif
                                        </div>
										<div class="form-group col-sm-6">
											<label>City<span style="color: red">*</span></label>
                                            <input type="text" name="city" class="form-control" id="city" value="{{$company->city}}" required>
											@if(Session::has('CompanyErrorMessage'))
                         @foreach(Session::get('CompanyErrorMessage')->get('City') as $errorMessage)
                        <span class="label label-danger">{{$errorMessage}}</span>
                         @endforeach
                            @endif
                                        </div>
											<div class="form-group col-sm-6">
											<label>State<span style="color: red">*</span></label>
                                            <select class="form-control"  name="state" id="state">
												@foreach($states as $state)
			<option value="{{$state->id}}" @if($company->state==$state->id) selected @endif >{{$state->name}}</option>
												@endforeach
											</select>
                                        </div>
										<div class="form-group col-sm-6">
											<label>Country<span style="color: red">*</span></label>
                                          
    
         
								<select class="form-control"  name="country" id="country">
												
												<option value="101" selected>India</option>
												
											</select>
        
                         
                     
											
                                        </div>
										<div class="form-group col-sm-6">
											<label>Zip Code<span style="color: red">*</span></label>
                                            <input type="text" name="zip_code" class="form-control" id="zip_code" value="{{$company->zip_code}}" required>
											@if(Session::has('CompanyErrorMessage'))
                         @foreach(Session::get('CompanyErrorMessage')->get('ZipCode') as $errorMessage)
                        <span class="label label-danger">{{$errorMessage}}</span>
                         @endforeach
                            @endif
                                        </div>
										
										
										
											<div class="form-group col-sm-6">
											<label>Excise Registration<span style="color: red">*</span></label>
                                            <input type="text" name="excise_registration" class="form-control" id="excise_registration" value="{{$company->excise_registration}}" required>
											@if(Session::has('CompanyErrorMessage'))
                         @foreach(Session::get('CompanyErrorMessage')->get('ExciseRegistration') as $errorMessage)
                        <span class="label label-danger">{{$errorMessage}}</span>
                         @endforeach
                            @endif
                                        </div>
										
										
										<div class="form-group col-sm-6">
											<label>GST<span style="color: red">*</span></label>
                                            <input type="text" name="gst" class="form-control" id="gst" value="{{$company->gst}}" required>
											@if(Session::has('CompanyErrorMessage'))
                         @foreach(Session::get('CompanyErrorMessage')->get('GST') as $errorMessage)
                        <span class="label label-danger">{{$errorMessage}}</span>
                         @endforeach
                            @endif
                                        </div>
										
										<div class="form-group col-sm-6">
											<label>Tin<span style="color: red">*</span></label>
                                            <input type="text" name="tin" class="form-control" id="tin" value="{{$company->tin}}" required>
											@if(Session::has('CompanyErrorMessage'))
                         @foreach(Session::get('CompanyErrorMessage')->get('TIN') as $errorMessage)
                        <span class="label label-danger">{{$errorMessage}}</span>
                         @endforeach
                            @endif
                                        </div>	
										
										
										
										
									<div class="form-group col-sm-6">
											<label>Range<span style="color: red">*</span></label>
                                            <input type="text" name="company_range" class="form-control" id="company_range"  value="{{$company->company_range}}" required>
											@if(Session::has('CompanyErrorMessage'))
                         @foreach(Session::get('CompanyErrorMessage')->get('CompanyRange') as $errorMessage)
                        <span class="label label-danger">{{$errorMessage}}</span>
                         @endforeach
                            @endif
                                        </div>	


									<div class="form-group col-sm-6">
											<label>Division<span style="color: red">*</span></label>
                                            <input type="text" name="company_division" class="form-control" id="company_division" value="{{$company->company_division}}" required>
											@if(Session::has('CompanyErrorMessage'))
                         @foreach(Session::get('CompanyErrorMessage')->get('CompanyDivision') as $errorMessage)
                        <span class="label label-danger">{{$errorMessage}}</span>
                         @endforeach
                            @endif
                                        </div>	
										
										
										

													
										<div class="form-group col-sm-6">
											<label>Website</label>
                                            <input type="text" name="website" class="form-control" id="website" value="{{$company->website}}" >
											@if(Session::has('CompanyErrorMessage'))
                         @foreach(Session::get('CompanyErrorMessage')->get('Website') as $errorMessage)
                        <span class="label label-danger">{{$errorMessage}}</span>
                         @endforeach
                            @endif
                                        </div>										
									            
										
										
										
                                       
                                    </div>
                                 
                                     
                                
                                     <div class="form-group row">
                        <div class="form-group form-check col-sm-12 text-center">
                   
                           <button type="submit" class="btn blue">
<i class="fa fa-plus-circle"></i> Update Company</button>
                        </div>
                      </div>
                    </form>
                </div>
                    </div>
                </div>
            </div>
        </div>
		
		
		  </div>
                </div>
 <!--<script src="https://cdn.ckeditor.com/4.12.1/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('mode_of_transport');
		
    </script>
	<script>
        CKEDITOR.replace('payment_terms');
		
    </script>-->
<script>
$(document).ready(function() {
    $('.customer_form').bootstrapValidator({
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
			mobile: {
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
			
            
			gst: {
                message: 'The GST is not valid',
                validators: {
                    notEmpty: {
                        message: 'The GST is required and cannot be empty'
                    },
                    stringLength: {
                        min: 15,
                        max: 15,
                        message: 'The GST format should be 15 character long'
                    },
                    regexp: {
                        regexp: /^([0]{1}[1-9]{1}|[1-2]{1}[0-9]{1}|[3]{1}[0-7]{1})([a-zA-Z]{5}[0-9]{4}[a-zA-Z]{1}[1-9a-zA-Z]{1}[zZ]{1}[0-9a-zA-Z]{1})+$/,
                        message: 'The GST format is not valid'
                    }
                }
            },
			
			tin: {
                message: 'The Tin is not valid',
                validators: {
                    notEmpty: {
                        message: 'The Tin is required and cannot be empty'
                    },
                    stringLength: {
                        min: 11,
                        max: 11,
                        message: 'The Tin must be 11 Digit long'
                    }
                }
            },
			
			
        }
    });
});
</script> 
@endsection

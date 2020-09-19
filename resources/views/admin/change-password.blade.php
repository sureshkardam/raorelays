	@extends('layouts.app')
    @section('content')
  

                <div class="breadcumbs-area">
                    <ul>
                        <li class="title-main">
                            <h4>Security</h4>
                        </li>
                        <li class="link-home"><a href="#."><i class="fa fa-home"></i></a></li>
                        <li class="link-home"><a href="#.">Home</a></li>
                        <li class="link-page"><a href="#.">Change Password</a></li>
                    </ul>
                    <!-- <div class="create-button">
                        <a title="Add New" href="#."><i class="fa fa-plus"></i></a>
                    </div> -->
                </div>
                <div class="content-main-here">
                    <div class="table-main-div" style="margin-top: 0px;">
                        <div class=" table-header ">
                            <h2><strong>Change Password</strong> </h2>
							 @include('toast')
                        </div>
           
             <div class="form-default ">
 
         
    
      
           <form method="POST" action="{{route('change.password')}}">
                                   
                                    
                                
                                    <div class="form-group row">
                                       <div class="form-group col-sm-6">
                                    <label for="password" class="hello">Password
                           <span style="color: red">*</span>
                            </label>
                                         @if(Session::has('ResetPassErrors'))
						@foreach(Session::get('ResetPassErrors')->get('Password') as $errorMessage)
								<span class="label label-danger">{{$errorMessage}}</span>
						@endforeach
						@endif
										 <input type="password"   name="password" class="form-control"  >
                                        </div>
										@csrf
                                        <div class="form-group col-sm-6">
                                        <label for="confirm_password" class="hello">Confirm Password
                           <span style="color: red">*</span>
                            </label>
							
							 @if(Session::has('ResetPassErrors'))
						@foreach(Session::get('ResetPassErrors')->get('ConfirmPassword') as $errorMessage)
								<span class="label label-danger">{{$errorMessage}}</span>
						@endforeach
						@endif
                                            <input type="password"   name="confirm_password" class="form-control"  placeholder="Confirm Password">
                                        </div>

                                    </div>
                                   
                           
                                    <div class="form-group row">
                        <div class="form-group form-check col-sm-12 text-center">
                          
                           <button type="submit" class="btn blue">
<i class="fa fa-plus-circle"></i> Update Password</button>
                        </div>
                   
 </div>
                                </form>
                </div>
                    </div>

                </div>
            </div>
        </div>

   
@endsection
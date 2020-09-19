@extends('layouts.app') 
@section('content')



                <div class="breadcumbs-area">
                    <ul>
                        <li class="title-main">
                            <h4>Create Attribute</h4>
                        </li>
                        <li class="link-home"><a href="#."><i class="fa fa-home"></i></a></li>
                        <li class="link-home"><a href="#.">Home</a></li>
                        <li class="link-page"><a href="#.">Create Attribute</a></li>
                    </ul>
                    <!-- <div class="create-button">
                        <a title="Add New" href="#."><i class="fa fa-plus"></i></a>
                    </div> -->
                </div>
                
                <div class="content-main-here">
                    <div class="table-main-div" style="margin-top: 0px;">
                        <div class=" table-header ">
                            <h2><strong>Create Attribute</strong> </h2>
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
      
                               <form class="add-patient-form" method="post" action="{{route('admin.attribute.create')}}">
                                    <div class="form-group row">
                                         <div class="form-group col-sm-6">
                                               <label for="clinic name" class="hello">Name
                                      <span style="color: red">*</span>
                                        </label>

<!-- Name -->
                                            <input type="text" name="name" class="form-control" id="name" placeholder="Attribute Name">
                                            @if(Session::has('attributeErrorMessage'))
                         @foreach(Session::get('attributeErrorMessage')->get('Name') as $errorMessage)
                        <span class="label label-danger">{{$errorMessage}}</span>
                         @endforeach
                            @endif
                                        </div>
                                        @csrf
                                      <div class="form-group col-sm-6">
                                        <label for="clinic name" class="hello">Sort Order
                                      <span style="color: red">*</span>
                                        </label>
<!-- Sort Order -->
                                            <input type="text" name="sort_order" class="form-control" id="sort_order" placeholder="Sort Order">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="form-group col-sm-6">
                                            <label for="clinic name" class="hello">Status
                                      <span style="color: red">*</span>
                                        </label>
 <!-- Status -->                                          
                                            <select class="form-control" name="status">
                                              <option value="1" selected>Enabled</option>
                                              <option value="0">Disabled</option>
											  <option value="2">Archived</option>
                                            </select>
                                        </div>
                                       
                                    </div>
                                 
                                     
                                
                                     <div class="form-group row">
                        <div class="form-group form-check col-sm-12 text-center">
                   
                           <button type="submit" class="btn blue">
<i class="fa fa-plus-circle"></i> Create Attribute</button>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
             
                            

 
@endsection


@section('script')

bootstrapValidate('#name','required:Name Field Is Required!');

@endsection
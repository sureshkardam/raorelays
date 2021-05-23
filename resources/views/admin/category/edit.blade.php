@extends('layouts.app') 
@section('content')
 

                <div class="breadcumbs-area">
                    <ul>
                        <li class="title-main">
                            <h4>Edit Product</h4>
                        </li>
                        <li class="link-home"><a href="#."><i class="fa fa-home"></i></a></li>
                        <li class="link-home"><a href="#.">Home</a></li>
                        <li class="link-page"><a href="#.">Edit Products</a></li>
                    </ul>
                    <!-- <div class="create-button">
                        <a title="Add New" href="#."><i class="fa fa-plus"></i></a>
                    </div> -->
                </div>
                <div class="content-main-here">
                    <div class="table-main-div" style="margin-top: 0px;">
                        <div class=" table-header ">
                            <h2><strong>Edit Products</strong> </h2>
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
                      <form action="{{route('admin.category.edit',['id'=>$category_data->id])}}" id="popForm" method="post" enctype="multipart/form-data">
                        @csrf
                   
                        <div class="form-group row">

                        <div class="form-group col-sm-6">
						                  @if(Session::has('CategoryeditErrors'))
                                    @foreach(Session::get('CategoryeditErrors')->get('Name') as $errorMessage)
                                  <span class="label label-danger">{{$errorMessage}}</span>
                                  @endforeach
                                    @endif
                                <label class="input-label">Name<span style="color: red">*</span></label>
                                <input type="text" class="form-control" name="name" value="{{$category_data->name}}" required>
                            </div>
							
							
							 <div class="form-group col-sm-6">
						                  @if(Session::has('CategoryeditErrors'))
                                    @foreach(Session::get('CategoryeditErrors')->get('Code') as $errorMessage)
                                  <span class="label label-danger">{{$errorMessage}}</span>
                                  @endforeach
                                    @endif
                                <label class="input-label">Code<span style="color: red">*</span></label>
                                <input type="text" class="form-control" name="code" value="{{$category_data->code}}" required>
                            </div>

							
							<div class="form-group col-sm-12">
                                 @if(Session::has('CategoryCreateErrors'))
                                    @foreach(Session::get('CategoryCreateErrors')->get('Description') as $errorMessage)
                                    <span class="label label-danger">{{$errorMessage}}</span>
                                  @endforeach
                                    @endif
                                <label class="input-label">Description<span style="color: red">*</span></label>
                              
							   
							    <input type="text" class="form-control" name="description" value="{{$category_data->description}}" required>
                            </div>
                               
                        </div>

                       
						 <div class="form-group row">

                         
						 
						  <div class="form-group col-sm-12">
                            
                                <label class="input-label">Select Parent Category or leave blank for Root Category</label>
                               <select size="100" class="form-control  for-multiple select-form" name="parent_id" >
                                    
                                    @foreach($categories as $category)
                                    
                                    @if($category_data->id <> $category->category_id)
									<option value="{{$category->category_id}}" @if($category_data->parent_id==$category->category_id) selected @endif>{{$category->name}}</option>
								    @endif
                                    @endforeach
                                    
                                </select>
                                
                            </div>
							
						 <div class="form-group col-sm-6">
                     
                                <label class="input-label">Status</label>
                                <select name="status" class="form-control">
                                    @if($category_data->status==1)
                                    <option @if($category_data->status == 1) selected @endif value="1" >Enabled</option>
                                    <option @if($category_data->status == 0) selected @endif value="0">Disabled</option>
									 <option @if($category_data->status == 2) selected @endif value="2">Archived</option>
									
                                    @else
                                        
                                    @endif
                                </select>
                                
                            </div>
						
						</div>
						
						
						
                      <div class="form-group row">

                        <div class="col-sm-12">
                            <div class="form-group form-check col-sm-12 text-center">
                         
                           <button type="submit" class="btn blue">Save Product</button>
                        </div>
                        </div>
						</div>


                            

                    
                     </form>
                </div>
            </div>
     


@endsection
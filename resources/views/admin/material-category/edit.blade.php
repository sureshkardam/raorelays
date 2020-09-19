@extends('layouts.app') 
@section('content')
 

                <div class="breadcumbs-area">
                    <ul>
                        <li class="title-main">
                            <h4>Edit Material Category</h4>
                        </li>
                        <li class="link-home"><a href="#."><i class="fa fa-home"></i></a></li>
                        <li class="link-home"><a href="#.">Home</a></li>
                        <li class="link-page"><a href="#.">Edit Material Category</a></li>
                    </ul>
                    <!-- <div class="create-button">
                        <a title="Add New" href="#."><i class="fa fa-plus"></i></a>
                    </div> -->
                </div>
                <div class="content-main-here">
                    <div class="table-main-div" style="margin-top: 0px;">
                        <div class=" table-header ">
                            <h2><strong>Edit Material Category</strong> </h2>
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
                      <form action="{{route('admin.material.category.edit',['id'=>$category_data->id])}}" id="popForm" method="post" enctype="multipart/form-data">
                        @csrf
                   

                        
						
						
						
						
                       
                        <div class="form-group row">

                        <div class="form-group col-sm-6">
						                  @if(Session::has('CategoryeditErrors'))
                                    @foreach(Session::get('CategoryeditErrors')->get('Name') as $errorMessage)
                                  <span class="label label-danger">{{$errorMessage}}</span>
                                  @endforeach
                                    @endif
                                <label class="input-label">Name</label>
                                <input type="text" class="form-control" name="name" value="{{$category_data->name}}" required>
                            </div>

                     
                               
                        </div>

                           


                            <div class="form-group row">
                         
                            
                               


                      
                 
                        </div>
                 

                      
                 
                         <div class="form-group row">
                         <div class="form-group col-sm-12">
                            
                                <label class="input-label">Parent Category</label>
                                <select name="parent_id" class="form-control" required>
                                    <option value="0">Select Parent Category</option>
                                    @foreach($categories as $category)
                                    
                                    <option value="{{$category->category_id}}" @if($category_data->parent_id==$category->category_id) selected @endif>{{$category->name}}</option>
                                    @endforeach
                                    
                                </select>
                                
                            </div>
                        </div>
                     
                 
                           <div class="form-group row">
                        <div class="form-group col-sm-12">
                             @if(Session::has('CategoryeditErrors'))
                                    @foreach(Session::get('CategoryeditErrors')->get('Description') as $errorMessage)
                                  <span class="label label-danger">{{$errorMessage}}</span>
                                  @endforeach
                                    @endif
                            <label for="first name" style="top:-20px" class="hello">Description
                           <span style="color: red">*</span>
                            </label>
                           <!--  <input type="text" class="form-control" id="description" value="{{$category_data->description}}" 
                                name="description" placeholder=""> -->
                                <textarea rows="4" cols="50" class="form-control" name="description">{{$category_data->description}}</textarea required>
                               

                        </div>
                        </div>

						
						
						
						 <div class="form-group row">

                         <div class="form-group col-sm-6">
                                        
                                <label class="input-label">Sort Order<span style="color: red">*</span></label>
                                <input type="text" class="form-control" value="{{$category_data->sort_order}}" name="sort_order">
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
                         
                           <button type="submit" class="btn blue">Update Material Category</button>
                        </div>
                        </div>
						</div>


                            

                    
                     </form>
                </div>
            </div>
     

<script type="text/javascript"></script>
 <script src="https://cdn.ckeditor.com/4.12.1/standard/ckeditor.js"></script>
                            <script>
                        CKEDITOR.replace( 'description' );
                </script>    


@endsection
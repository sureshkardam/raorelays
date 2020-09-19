@extends('layouts.app')
@section('content')



    <div class="breadcumbs-area">
        <ul>
            <li class="title-main">
                <h4>Create Category</h4>
            </li>
            <li class="link-home"><a href="#."><i class="fa fa-home"></i></a></li>
            <li class="link-home"><a href="#.">Home</a></li>
            <li class="link-page"><a href="#.">Create Category</a></li>
        </ul>
        <!-- <div class="create-button">
                        <a title="Add New" href="#."><i class="fa fa-plus"></i></a>
                    </div> -->
    </div>
    <div class="content-main-here">
        <div class="table-main-div" style="margin-top: 0px;">
            <div class=" table-header ">
                <h2><strong>Create Category</strong> </h2>
            </div>
           @include('toast')
            <div class="form-default create-category-page">
                <form action="{{ route('admin.category.create') }}" id="popForm" enctype="multipart/form-data" method="post">
                    @csrf
                    <div>
                        
                        <div class="form-group row">
                            <div class="form-group col-sm-6">

                                @if(Session::has('CategoryCreateErrors'))
                                    @foreach(Session::get('CategoryCreateErrors')->get('Name') as $errorMessage)
                                    <span class="label label-danger">{{$errorMessage}}</span>
                                  @endforeach
                                    @endif
                                <label class="input-label">Name<span style="color: red">*</span></label>
                                <input type="text" class="form-control" value="{{old('name')}}" name="name" required>
                            </div>
                            
                       

                           
                       
                           
                            
                       
                            <div class="form-group col-sm-12">
                                <label class="input-label">Parent Category</label>
                                <select name="parent_id" class="form-control">
                                    <option value="0">Select Parent Category</option>
                                    @foreach($categories as $category)
                                    <option value="{{$category->category_id}}">{{$category->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        
                            <div class="form-group col-sm-12">
                                 @if(Session::has('CategoryCreateErrors'))
                                    @foreach(Session::get('CategoryCreateErrors')->get('Description') as $errorMessage)
                                    <span class="label label-danger">{{$errorMessage}}</span>
                                  @endforeach
                                    @endif
                                <label class="input-label">Description<span style="color: red">*</span></label>
                                <textarea rows="4" cols="50" class="form-control" name="description">{{old('description')}}</textarea required>
                            </div>
                        </div>
                     
							
							 <div class="form-group row">
							  <div class="form-group col-sm-6">

                                <label class="input-label">Sort Order</label>
                                <input type="text" class="form-control" value="{{old('sort_order')}}" name="sort_order">
                            </div>
							<div class="form-group col-sm-6">
                                <label class="input-label">Status</label>
                                <select name="status" class="form-control">
                                    <option value="1">Enabled</option>
                                    <option value="0">Disabled</option>
									<option value="2">Archived</option>
                                </select>
                            </div>
							 
							 </div>
                                              
                                            

                        <div class="form-group row">
                            <div class="form-group form-check col-sm-12 text-center">
                               
                                <button type="submit" class="btn blue">
<i class="fa fa-plus-circle"></i> Create Category</button>
                            </div>
                        </div>
                </form>
            </div>
        </div>
    </div>



<script type="text/javascript"></script>
<script src="https://cdn.ckeditor.com/4.12.1/standard/ckeditor.js"></script>
<script>
CKEDITOR.replace('description');

</script>


@endsection
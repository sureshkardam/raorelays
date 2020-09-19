@extends('layouts.app') 
@section('content')


  <div class="breadcumbs-area">
                    <ul>
                        <li class="title-main">
                            <h4>Material Categories</h4>
                        </li>
                        <li class="link-home"><a href="#."><i class="fa fa-home"></i></a></li>
                        <li class="link-home"><a href="#.">Home</a></li>
                        <li class="link-page"><a href="#.">Material Categories List</a></li>
                    </ul>
                    <div class="create-button">
                        <a title="Add New" href="{{route('admin.material.category.create')}}"><i class="fa fa-plus"></i></a>
                        <a href="#." class="filter-button"><i class="fa fa-filter"></i> Filter</a>
                    </div>
                </div>
                <div class="content-main-here">
                   


                    <div class="table-main-div mt-0">
                        <div class="table-header">
                            <h2><strong>All Material Categories</strong></h2>
							 <div class="create-button">
                        <a title="Add New" href="{{route('admin.material.category.create')}}"><i class="fa fa-plus"></i></a>
                       
                    </div>
                        </div>
                        <div class="tableBody">
                            <div class="table-responsive">
                          
          


  @include('toast')
                                    
 

                        
                                          <table class="table" id="myTable">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Status</th>
                                        <th>Created</th>
                                         <th>Sort Order</th>
                                        <th>Action</th>
                                       
                                    </tr>
                                </thead>
                                <tbody>
                                  @foreach($categories as $category)
                                  <tr>
                                    <td>{{$category->name}}</td> 
                                    <td>{{\App\MaterialCategory::getCategoryStatus($category->category_id)  ? 'Enabled' : 'Disabled'}}</td>
                                    <td>{{\App\MaterialCategory::getCreated($category->category_id)}}</td>
                                    <td>{{App\MaterialCategory::getSortOrder($category->category_id)}}</td>
                                           
                                    <td><a href="{{route('admin.material.category.edit',['id'=>$category->category_id])}}" ><i class="fa fa-pencil" aria-hidden="true" title="Edit"></i></a>
                                      
                               


                                 <a onclick="deleteConfirm('material-category',{{$category->category_id}},'{{$category->name}}')"><i class="fa fa-trash" aria-hidden="true" title="Delete"></i></a> </td> 
                                    
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

@section('script')

bootstrapValidate('#addName','alpha:Enter Valid attribute Name!');
bootstrapValidate('#addattribute','alpha:Enter Valid attribute Code!');
bootstrapValidate('#addPhonecode','numeric:Enter Valid Phone Code!');
bootstrapValidate('#editattributename','alpha:Please Check Your attribute Name!');
bootstrapValidate('#editattributecode','alpha:Please Check Your attribute Code!');
bootstrapValidate('#editPhonecode','numeric:Please Check Your Phone Code!');


@endsection
@extends('layouts.app') 
@section('content')


  <div class="breadcumbs-area">
                    <ul>
                        <li class="title-main">
                            <h4>Product Sub Category List</h4>
                        </li>
                        <li class="link-home"><a href="#."><i class="fa fa-home"></i></a></li>
                        <li class="link-home"><a href="#.">Home</a></li>
                        <li class="link-page"><a href="#.">Product Sub Category List</a></li>
                    </ul>
                    
                </div>
                <div class="content-main-here">
                   


                    <div class="table-main-div mt-0">
                        <div class="table-header">
                            <h2><strong>Product Sub Category List</strong></h2>
							 <div class="create-button">
                        <a title="Add New" href="{{route('admin.sub.category.create')}}"><i class="fa fa-plus"></i></a>
                        
                    </div>
                        </div>
                        <div class="tableBody">
                            <div class="table-responsive">
                          
          


  @include('toast')
                                    
 

                        
                                          <table class="table" id="myTable">
                                <thead>
                                    <tr>
                                        <th>Name</th>
										 <th>Main Category</th>
                                        <th>Status</th>
                                       
                                        
                                        <th>Action</th>
                                       
                                    </tr>
                                </thead>
                                <tbody>
                                  @foreach($categories as $category)
                                  
								 
								  <tr>
                                    <td><a href="{{route('admin.subcategory.product.list',['id'=>$category->id])}}">{{$category->name}}</a></td> 
									<td>{{App\Category::getName($category->parent_id)}}</td>									
                                    <td>{{\App\Category::getCategoryStatus($category->id)  ? 'Enabled' : 'Disabled'}}</td>
                                   
                                   
                                    <td>
									
									<a href="{{route('admin.category.edit',['id'=>$category->category_id])}}" ><i class="fa fa-pencil" aria-hidden="true" title="Edit"></i></a>
                                      
                               


                                 <a class="gap" onclick="deleteConfirm('category',{{$category->id}},'{{$category->name}}')"><i class="fa fa-trash" aria-hidden="true" title="Delete"></i></a>
								 
								 
								<a href="{{route('admin.material-relation',['id'=>$category->id])}}" ><i class="fa fa-list" aria-hidden="true" title="Raw Material"></i>Requisite Raw Material</a>
                                      
                               
									
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
  
  

@endsection
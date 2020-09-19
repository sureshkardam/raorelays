@extends('layouts.app')
@section('content')

<div class="breadcumbs-area">
                    <ul>
                        <li class="title-main">
                            <h4>Option</h4>
                        </li>
                        <li class="link-home"><a href="#."><i class="fa fa-home"></i></a></li>
                        <li class="link-home"><a href="#.">Home</a></li>
                        <li class="link-page"><a href="#.">Option</a></li>
                    </ul>
                    <div class="create-button">
                        <a title="Add New" href="{{route('admin.option.create')}}"><i class="fa fa-plus"></i></a>
                        <a href="#." class="filter-button"><i class="fa fa-filter"></i> Filter</a>
                    </div>
                </div>
                <div class="content-main-here ">
                   


                    <div class="table-main-div mt-0">
                        <div class="table-header">
                            <h2><strong>All Option</strong> </h2>
							<div class="create-button">
                        <a title="Add New" href="{{route('admin.option.create')}}"><i class="fa fa-plus"></i></a>
                       
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
                @foreach ($options as $option)
                                    <tr>
                                        
                                        <td>{{$option->name}}</td>
                                        <td>{{$option->status ? 'Enabled' : 'Disabled' }}</td>
                                         <td>{{date('M\. d\, Y', strtotime($option->created_at))}}</td>
                                         <td>{{$option->sort_order}}</td>
                                        
                                      
                                       
                                        <td>

<!-- Edit -->
                   <a href="{{route('admin.option.edit',$option->id)}}"><i class="fa fa-pencil" aria-hidden="true" title="Edit"></i></a>

             <a onclick="deleteConfirm('option-main',{{$option->id}},'{{$option->name}}')"><i class="fa fa-trash" aria-hidden="true" title="Delete"></i></a>            

   

</td>
                                        
                                         
                                    </tr>
                                 @endforeach  
                                </tbody>
                            </table>
                        </div>
                        </div>
                    </div>
                </div>


@endsection


@extends('layouts.app')
@section('content')
<div class="breadcumbs-area">
                    <ul>
                        <li class="title-main">
                            <h4>Catalog</h4>
                        </li>
                        <li class="link-home"><a href="#."><i class="fa fa-home"></i></a></li>
                        <li class="link-home"><a href="#.">Home</a></li>
                        <li class="link-page"><a href="#.">Attribute List</a></li>
                    </ul>
                    <div class="create-button">
                        <a title="Add New" href="{{route('admin.attribute.create')}}"><i class="fa fa-plus"></i></a>
                        <a href="#." class="filter-button"><i class="fa fa-filter"></i> Filter</a>
                    </div>
                </div>
                <div class="content-main-here">
                    <div class="filter-blocks">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card-here">
                                    <h3>Filter</h3>

                                   <form class="row" action="{{route('admin.attribute.list')}}" method="post">
                                    <div class="input-filter col-sm-4">
                                            <input type="date" name="from" placeholder="From Date">
                                        </div>
                                        <div class="input-filter col-sm-4">
                                            <input type="date" name="to" placeholder="To Date">
                                        </div>
                                        @csrf
                                        <div class="input-filter submit col-sm-2">
                                            <button title="Click To Filter">
                                                <i class="fa fa-filter"></i>
                                                <input type="submit" value="Filter">
                                            </button>
                                        </div>

                                    </form>


                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="table-main-div">
                        <div class="table-header">
                            <h2><strong>All Attribute</strong></h2>
                        </div>
                        <div class="tableBody">
                            <div class="table-responsive">
                          @include('toast')
                         @if ($errors->any())
    <div class="alert alert-danger">
     
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
       
    </div>
@endif
                                    
 

                        
                    <table class="table" id="myTable">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Attribute Name</th>
                                        <th>Sort Order</th>
                                        
                                        <th>Action</th>
                                       
                                    </tr>
                                </thead>
                                <tbody>
                @foreach ($attribute as $attribute)
                                    <tr>
                                        <td>{{$attribute->id}}</td>
                                        <td>{{$attribute->name}}</td>
                                        <td>{{$attribute->sort_order}}</td>
                                        
                                      
                                       
                                        <td>

<!-- Edit -->
                   <a href="{{route('admin.attribute.edit',$attribute->id)}}"><i class="fa fa-pencil" aria-hidden="true" title="Edit"></i></a>
  
   <a href="{{route('admin.attribute.delete',$attribute->id)}}"  onclick="return confirm('Are you sure you want to delete this item?');"><i class="fa fa-trash" aria-hidden="true" title="Delete"></i></a>

</td>
                                        
                                          
                                    </tr>
                                 @endforeach  
                                </tbody>
                            </table>
                        </div>
                        </div>
                    </div>
         
<script>
$(document).ready(function() {
    $('#attribute-list').click(function() {
        //$('.navbar-nav li').removeClass('check');
        $(this).addClass('check');
    })
});
</script>
@endsection


@extends('layouts.app')
@section('content')
<div class="breadcumbs-area with-label">
                    <ul>
                        <li class="title-main">
                            <h4>All Users</h4>
                        </li>
                        <li class="link-home"><a href="#."><i class="fa fa-home"></i></a></li>
                        <li class="link-home"><a href="#.">Home</a></li>
                        <li class="link-page"><a href="#.">All Users</a></li>
                    </ul>
                    <div class="create-button">
                        <a title="Add New" href="{{route('create.user')}}"><i class="fa fa-plus"></i> Create User</a>
                        <a href="#." class="filter-button"><i class="fa fa-filter"></i> Filter</a>
                    </div>
                </div>
                <div class="content-main-here">
                    <!--<div class="filter-blocks">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card-here">
                                    <h3>Filter</h3>

                                   <form class="row" action="{{route('admin.customer.list')}}" method="post">
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
                    </div>-->


                    <div class="table-main-div">
                        <div class="table-header">
                            <h2><strong>All Users</strong></h2>
							<div class="create-button">
                        <a title="Add New" href="{{route('create.user')}}"><i class="fa fa-plus"></i> Create User</a>
                       
                    </div>
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
                                        <th>Employee ID</th>
										<th>Name</th>
                                       	<th>Email</th>
										<th>Contact Number</th>
										<th>User Type</th>
                                       
										 <th>Status</th>
										 <th>Created</th>
                                        
                                        <th>Action</th>
                                       
                                       
                                    </tr>
                                </thead>
                                <tbody>
                @foreach ($users as $user)
                                    <tr>
                                        <td>
										@if($user->apPersonal)
										{{$user->apPersonal->employee_id}}
										@endif
										</td>
										<td>{{$user->name}}</td>
                                        <td>{{$user->email}}</td>
										<td>
										@if($user->apPersonal)
										{{$user->apPersonal->telephone}}
										@endif
										</td>
										<td>
										
										@if($user->user_type == 2) Sub Admin @endif
										@if($user->user_type == 0) Sales Module @endif
										@if($user->user_type == 3) Raw Material Module @endif
										@if($user->user_type == 4) Production Module @endif
										
										</td>
										
										<td>
										
										@if($user->status == 0) Disabled @endif
										@if($user->status == 1) Enabled @endif
										@if($user->status == 2) Archived @endif
										
										</td>
										
										
										<td>{{date('M\. d\, Y', strtotime($user->created_at))}}</td>
										
                                        <td>

<!-- Edit -->
                   <a href="{{route('user.edit',$user->id)}}"><i class="fa fa-pencil" aria-hidden="true" title="Edit"></i></a>
  
    <a onclick="deleteConfirm('user',{{$user->id}},'{{$user->name}}')"><i class="fa fa-trash" aria-hidden="true" title="Delete"></i></a> 

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
         
<script>
$(document).ready(function() {
    $('#customer-list').click(function() {
        //$('.navbar-nav li').removeClass('check');
        $(this).addClass('check');
    })
});
</script>
@endsection


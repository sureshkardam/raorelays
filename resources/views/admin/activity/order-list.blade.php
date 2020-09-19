@extends('layouts.app')
@section('content')
<div class="breadcumbs-area">
                    <ul>
                        <li class="title-main">
                            <h4>Activity</h4>
                        </li>
                        <li class="link-home"><a href="#."><i class="fa fa-home"></i></a></li>
                        <li class="link-home"><a href="#.">Home</a></li>
                        <li class="link-page"><a href="#.">Activity List</a></li>
                    </ul>
                    <div class="create-button">
                        <a title="Add New" href="{{route('create.user')}}"><i class="fa fa-plus"></i></a>
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
                            <h2><strong>Order Activity List</strong></h2>
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
                                        <th>Module</th>
										<th>Event</th>
                                       	<th>Key</th>
										<th>Value</th>
										<th>Created By</th>
										 <th>Created Date</th>
                                        
                                       
                                       
                                    </tr>
                                </thead>
                                <tbody>
                @foreach ($activities as $activity)
                                    <tr>
                                        
										<td>{{$activity->module}}</td>
                                        <td>{{$activity->event}}</td>
										<td>{{$activity->field_key}}</td>
										<td>{{$activity->field_value}}</td>
										
										<td>{{App\User::getName($activity->user_id)}}</td>
																		
										<td>{{date('M\. d\, Y', strtotime($activity->created_at))}}</td>
										  
                                    </tr>
                                 @endforeach  
                                </tbody>
                            </table>
                        </div>
                        </div>
                    </div>
					
					  </div>
                </div>
         
@endsection


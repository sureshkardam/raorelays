               
               @extends('layouts.app') 
             @section('content')

<div class="breadcumbs-area">
                    <ul>
                        <li class="title-main">
                            <h4>All Support</h4>
                        </li>
                        <li class="link-home"><a href="#."><i class="fa fa-home"></i></a></li>
                        <li class="link-home"><a href="#.">Home</a></li>
                        <li class="link-page"><a href="#.">Support List</a></li>
                    </ul>
                    <div class="create-button">
                        
                        <a href="#." class="filter-button"><i class="fa fa-filter"></i> Filter</a>
                    </div>
                </div>
                
                <div class="content-main-here">
                    <div class="filter-blocks">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card-here">
                                    <h3>Filter</h3>
                                   
									

								   <form class="row" action="{{route('sales.manager.list')}}" method="post">
                                        <div class="input-filter col-sm-4">
                                            <input type="text" name="from" placeholder="From Date" class="date-picker">
                                        </div>
                                        <div class="input-filter col-sm-4">
                                            <input type="text" name="to" placeholder="To Date" class="date-picker">
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
                            <h2><strong>All Support</strong> </h2>
                        </div>
                        <div class="tableBody">
                            <div class="table-responsive">
                                
								@include('toast')
								
								
								<table class="table" id="myTable">
        <thead>
          <tr>
            
            
             <th>Request By</th>
             <th>Subject</th>
             <th>Description</th>
             <th>Created</th>
              <th>Action</th>
             
             
          </tr>
          </thead>
          <tbody>
           @foreach($support_data as $support)
           <tr>
           
             
             <td ><a href="{{route('patient.all.detail',$support->user_id)}}">{{App\User::getName($support->user_id)}}</a></td>    
             <td >{{$support->subject}}</td>
             <td >{{$support->description}}</td>
             
    
             <td>{{date('M\. d\, Y', strtotime($support->created_at))}}</td>
                
              <td>

			  <div class="action-btns">
               
                <a class="prl-5" href="{{ route('admin.edit.support',$support->id) }}">
  
			
                  <i class="fa fa-eye" aria-hidden="true"></i>
                </a>
        

           <a onclick="deleteConfirm('support',{{$support->id}},'{{$support->subject}}')"><i class="fa fa-trash" aria-hidden="true" title="Delete"></i></a>
 
        </div>

              </td>
             
            </tr>
          
          
          @endforeach
        </tbody>
        
      </table>  
                            </div>
                        </div>
                    </div>
            


@endsection
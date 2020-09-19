@extends('layouts.app') 
@section('content')
    
               
                   <div class="breadcumbs-area">
                    <ul>
                        <li class="title-main">
                            <h4>Product Transfer</h4>
                        </li>
                        <li class="link-home"><a href="#."><i class="fa fa-home"></i></a></li>
                        <li class="link-home"><a href="#.">Home</a></li>
                        <li class="link-page"><a href="#.">Product Transfer List</a></li>
                    </ul>
                    <div class="create-button">
                        <!--<a href=""><i class="fa fa-plus"></i></a>-->
                       
                    </div>
                </div>

          <div class="content-main-here">
                   
             <div class="table-main-div mt-0">
                        <div class="table-header">
                            <h2><strong>Product Transfer List</strong></h2>
                        </div>
                        <div class="tableBody">
                            <div class="table-responsive">
                          
          @include('toast')
                    <table class="table" id="myTable">
                                <thead>
                                    <tr>
                                

                                        <th>User Name</th>
                                         <th>Product Name</th>
                                        <th>Serial Number</th>                                       
                                        <th>from</th>
                                        <th>to</th>
                                        <th>Transfer at</th>
                                       
                                        
                                       
                                    </tr>
                                </thead>
                                <tbody>
                @foreach ($product_transfer as $product_transfers)
                                    
                                    <tr>
                                      
                                       <td>{{\App\User::getName($product_transfers->user_id)}}</td>
                                       <td>{{\App\Product::getName($product_transfers->product_id)}}</td>
                                       <td>{{$product_transfers->serial_number}}</td>
                                       <td>{{$product_transfers->from ? 'Sale' : 'Rental' }}</td>
                                       <td>{{$product_transfers->to ? 'Sale' : 'Rental' }}</td>
                                       <td>{{date('M\. d\, Y', strtotime($product_transfers->created_at))}}</td>
                                       
                                    </tr>
                                   
                                 @endforeach  
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                
    
  
  
  <!-- Add new Modal -->

  
 
@endsection


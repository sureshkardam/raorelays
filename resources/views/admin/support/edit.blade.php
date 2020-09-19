@extends('layouts.app') 
@section('content')




<div class="breadcumbs-area">
    <ul>
        <li class="title-main">
            <h4>Edit Support</h4>
        </li>
        <li class="link-home"><a href="#."><i class="fa fa-home"></i></a></li>
        <li class="link-home"><a href="#.">Home</a></li>
        <li class="link-page"><a href="#.">Edit Support</a></li>
    </ul>
    <!-- <div class="create-button">
                        <a title="Add New" href="#."><i class="fa fa-plus"></i></a>
                    </div> -->
</div>
<div class="content-main-here">
    <div class="table-main-div" style="margin-top: 0px;">
        <div class=" table-header ">
            <h2><strong>Edit Support</strong> </h2>
        </div>
        @include('toast')

      <div class="row">
                <div class="order-container">
                    <div class="order-main-heading">
                        <h4 class="main-heading">Edit Support</h4>
                    </div>
                    <div class="col-sm-12">
                        <div class="full-comment-section">
                        
                    <div class="details-block-support-edit">
                        <ol>
                            
                            <li>
                                    <h3>Subject</h3>
                                    
                                        <p>{{$support->subject}}</p>
                
                                    
                            </li>
                            <li>
                                    <h3>Description</h3>
                        
                                        <p>{{$support->description}}</p>
            
                                    
                            </li>
                        </ol>
                    </div>
           
                    <div class="reply-comments">
                            <ul>
                                
                            @foreach($support->apComments as $comment)  
                                
                                <li>
                                    
                                    @if($comment->user_id == 1)
                                    <div class="comment-reply">
                                        <div class="comment-content">
                                            <h2>Admin</h2>
                                            <span>{{date('M\. d\, Y', strtotime($comment->created_at))}}</span>
                                            <p>{{$comment->description}}</p>
                                        </div>
                                    </div>
                                    @else
                                    <div class="reply-reply">
                                        <div class="reply-content">
                                            <h2>Me</h2>
                                            <span>{{date('M\. d\, Y', strtotime($comment->created_at))}}</span>
                                            <p>{{$comment->description}}</p>
                                        </div>
                                    </div>
                                    @endif
                                </li>
                                
                            @endforeach 
                                
                            </ul>
                    </div>
                    <div class="text-area">
                        
                        
                        
                        
                        <form enctype="multipart/form-data" method="post" action="{{ route('admin.add.comment') }}">
                            <textarea class="hs-input" name="description" required></textarea>
                            <input type="hidden" value="{{$support->id}}" name="support_id">
                            
                           
                            <button type="submit" class="btn blue">Add Comments</button>
                            @csrf
                            </form>
                    </div>
                

                       
                       </div>   
                    </div>
        </div>
    </div>

    @endsection
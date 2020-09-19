@extends('layouts.app')

@section('content')

<style type="text/css">
    .card-here .card-left-icon svg {
    margin-top: 10px;
}
</style>

 <div class="breadcumbs-area">
                    <ul>
                        <li class="title-main">
                            <h4>Sub Admin Dashboard</h4>
                        </li>
                        <li class="link-home"><a href="#."><i class="fa fa-home"></i></a></li>
                        <li class="link-home"><a href="#.">Home</a></li>
                        <li class="link-page"><a href="#.">Dashboard</a></li>
                    </ul>
                   
                </div>
                <div class="content-main-here">




                    <div class="table-main-div">
                        <div class="table-header">
                            <h2><strong>Dashboard</strong></h2>
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
                                    
 
		<p>Coming Soon</p>
                        
                    
                    </div>
                </div>
            </div>
        </div>
       
<style>
.four-blocks + .four-blocks {
    margin-top: 30px;
}
</style>          
@endsection

 <div class="left-sidebar-logo">
            <div class="menu-logo-area">
                <div class="logo-here">
                    <a class="navbar-brand-logo" href="#">
                        <img alt="" src="{{ asset('admin/images/logo-big.png') }}" class="img-responsive big-img" width="100%">
                        <img alt="" src="{{ asset('admin/images/logo-small.png') }}" class="img-responsive small-img" width="100%" style="display: none;">
                    </a>
                </div>



<div class="menu-here">
                    <ul class="nav navbar-nav">
                    
					<?php
					if(Auth::user()->user_type =='1')
						{
							$link=route('admin.home');
						}else
						if(Auth::user()->user_type =='2')
						{
						$link=route('sub-admin.home');
						
						}
						else
						if(Auth::user()->user_type =='0')
						{
						$link=route('sales.home');
						
						}
						else
						if(Auth::user()->user_type =='3')
						{
						$link=route('raw.home');
						
						}
						else
						if(Auth::user()->user_type =='4')
						{
						$link=route('production.home');
						
						}
					
					?>
					
					<li><a href="<?php  echo $link; ?>" title="Dashboard">

                    <i class="fa fa-home" aria-hidden="true"></i>

					<label>Dashboard</label></a> </li>
					        
							@if(Auth::user()->user_type==1)
								@include('layouts.sidebar.admin')
							@endif
							
							@if(Auth::user()->user_type==2)
								@include('layouts.sidebar.subadmin')
							@endif
							
							@if(Auth::user()->user_type==0)
								@include('layouts.sidebar.sales')
							@endif
							
							@if(Auth::user()->user_type==3)
								@include('layouts.sidebar.raw')
							@endif
							
							@if(Auth::user()->user_type==4)
								@include('layouts.sidebar.production')
							@endif

							


                        </ul>
                      </div>
                    </div>
                  </div>
                  
                
                     






        
        <!--End Left Area LOGO and Menus Here -->
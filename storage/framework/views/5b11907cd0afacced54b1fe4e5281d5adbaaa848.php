 <div class="left-sidebar-logo">
            <div class="menu-logo-area">
                <div class="logo-here">
                    <a class="navbar-brand-logo" href="#">
                        <img alt="" src="<?php echo e(asset('admin/images/logo-big.png')); ?>" class="img-responsive big-img" width="100%">
                        <img alt="" src="<?php echo e(asset('admin/images/logo-small.png')); ?>" class="img-responsive small-img" width="100%" style="display: none;">
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
					        
							<?php if(Auth::user()->user_type==1): ?>
								<?php echo $__env->make('layouts.sidebar.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
							<?php endif; ?>
							
							<?php if(Auth::user()->user_type==2): ?>
								<?php echo $__env->make('layouts.sidebar.subadmin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
							<?php endif; ?>
							
							<?php if(Auth::user()->user_type==0): ?>
								<?php echo $__env->make('layouts.sidebar.sales', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
							<?php endif; ?>
							
							<?php if(Auth::user()->user_type==3): ?>
								<?php echo $__env->make('layouts.sidebar.raw', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
							<?php endif; ?>
							
							<?php if(Auth::user()->user_type==4): ?>
								<?php echo $__env->make('layouts.sidebar.production', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
							<?php endif; ?>

							


                        </ul>
                      </div>
                    </div>
                  </div>
                  
                
                     






        
        <!--End Left Area LOGO and Menus Here --><?php /**PATH D:\xampp\htdocs\raorelays\resources\views/layouts/sidebar.blade.php ENDPATH**/ ?>
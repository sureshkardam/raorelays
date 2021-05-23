<li class="dropdown">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown" title="Orders">
        <i class="fa fa-first-order" aria-hidden="true"></i>
        <label>Order</label>
        <span class="fa fa-plus"></span>
    </a>
    <ul class="dropdown-menu">
       
        
		<li class="<?php echo e(Request::is('order/create') ? 'active' : ''); ?>">
            <a href="<?php echo e(route('admin.order.create')); ?>">Create Order</a>
        </li>
		
		<li class="<?php echo e(Request::is('order/list') ? 'active' : ''); ?>">
            <a href="<?php echo e(route('admin.order.list')); ?>">Order List</a>
        </li>
		 
		
    </ul>
</li>
<li class="dropdown">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown" title="Customer">
        <i class="fa fa-users" aria-hidden="true"></i>
        <label>Customer</label>
        <span class="fa fa-plus"></span>
    </a>
    <ul class="dropdown-menu">
       
         <li class="<?php echo e(Request::is('create/customer') ? 'active' : ''); ?>">
            <a href="<?php echo e(route('admin.customer.create')); ?>">Create Customer</a>
        </li>
		<li class="<?php echo e(Request::is('customer') ? 'active' : ''); ?>">
            <a href="<?php echo e(route('admin.customer.list')); ?>">All Customers</a>
        </li>
		<li class="<?php echo e(Request::is('customer/active') ? 'active' : ''); ?>">
            <a href="<?php echo e(route('admin.active.customer.list')); ?>">Active Customers</a>
        </li>
		<li class="<?php echo e(Request::is('customer/archive') ? 'active' : ''); ?>">
            <a href="<?php echo e(route('admin.archive.customer.list')); ?>">Archived Customers</a>
        </li>
		 
		
    </ul>
</li>




<li class="dropdown">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown" title="Catalog"><i class="fa fa-folder" aria-hidden="true"></i>
      
        <label>Product Catalog</label> <span class="fa fa-plus"></span> </a>
    <ul class="dropdown-menu">
       
	 <li class="<?php echo e(Request::is('create/category') ? 'active' : ''); ?>"><a href="<?php echo e(route('admin.category.create')); ?>">Create Product Main Category</a></li>
	 
	 
	 <li class="<?php echo e(Request::is('create/sub/category') ? 'active' : ''); ?>"><a href="<?php echo e(route('admin.sub.category.create')); ?>">Create Product Sub Category</a></li>

	   <li class="<?php echo e(Request::is('category') ? 'active' : ''); ?>"><a href="<?php echo e(route('admin.category.list')); ?>">Product Main Category List</a></li>
	   
	   <li class="<?php echo e(Request::is('sub/category') ? 'active' : ''); ?>"><a href="<?php echo e(route('admin.sub.category.list')); ?>">Product Sub Category List</a></li>
       <!--<li class="<?php echo e(Request::is('attribute') ? 'active' : ''); ?>"><a id="attribute-list" href="<?php echo e(route('admin.attribute.list')); ?>">Attributes</a></li>-->
      <!--<li class="<?php echo e(Request::is('category') ? 'active' : ''); ?>"><a href="<?php echo e(route('admin.category.list')); ?>">Categories</a></li>-->
       
	  <!-- <li class="<?php echo e(Request::is('option') ? 'active' : ''); ?>"><a href="<?php echo e(route('admin.option.list')); ?>">Options</a></li>-->
        
    </ul>
</li>



<li class="dropdown">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown" title="Material Catalog"><i class="fa fa-archive" aria-hidden="true"></i>
      
        <label>Raw Material Catalog</label> <span class="fa fa-plus"></span> </a>
    <ul class="dropdown-menu">
        
		 <li class="<?php echo e(Request::is('create/material/product') ? 'active' : ''); ?>"><a href="<?php echo e(route('admin.material.product.create')); ?>">Create Raw Material</a></li>
		
		<li class="<?php echo e(Request::is('material/product') ? 'active' : ''); ?>"><a href="<?php echo e(route('admin.material.product.list')); ?>">Raw Material List</a></li>
		
		
		<!--<li class="<?php echo e(Request::is('material/product/request') ? 'active' : ''); ?>"><a href="<?php echo e(route('admin.material.request')); ?>">Raw Material Request</a></li>-->
		
		<li class="<?php echo e(Request::is('material/product/request/list') ? 'active' : ''); ?>"><a href="<?php echo e(route('admin.material.request.list')); ?>">Raw Material Request List</a></li>
		
		<!--<li class="<?php echo e(Request::is('material/product/dispatch') ? 'active' : ''); ?>"><a href="<?php echo e(route('admin.material.dispatch')); ?>">Raw Material Receiving Against Request</a></li>-->
		
		<!--<li class="<?php echo e(Request::is('material/product/purchase') ? 'active' : ''); ?>"><a href="<?php echo e(route('admin.material.purchase')); ?>">Create Purchase Order</a></li>-->
		
		
		<li class="<?php echo e(Request::is('material/product/purchase/list') ? 'active' : ''); ?>"><a href="<?php echo e(route('admin.material.purchase.list')); ?>">Purchase Order Request List</a></li>
		
		
		<!--<li class="<?php echo e(Request::is('material/product/receiving') ? 'active' : ''); ?>"><a href="<?php echo e(route('admin.material.receiving')); ?>">Receiving Againt Purchase Order</a></li>-->
		
		
		
		<!--<li class="<?php echo e(Request::is('material/request/job/work') ? 'active' : ''); ?>"><a href="<?php echo e(route('admin.material.request.jobwork')); ?>">Request for Job Work</a></li>-->
		
		
		<li class="<?php echo e(Request::is('material/request/job/work/list') ? 'active' : ''); ?>"><a href="<?php echo e(route('admin.material.request.jobwork.list')); ?>">Job Work Request List</a></li>
		
		
		
		<!--<li class="<?php echo e(Request::is('material/product/receiving/job/work') ? 'active' : ''); ?>"><a href="<?php echo e(route('admin.material.receiving.jobwork')); ?>">Receiving Againt Job Work</a></li>-->
		
		
		
        
    </ul>
</li>

	<li class="dropdown has-multi-menu">
		<a href="#" class="dropdown-toggle" data-toggle="dropdown">
			<i class="fa fa-male" aria-hidden="true"></i>
			<label>Admin</label> <span class="fa fa-plus"></span>
		</a>
		<ul class="dropdown-menu hass">
			
		  <li class="dropdown dropdown-submenu">
			<a href="#" class="dropdown-toggle" data-toggle="dropdown">
				<i class="fa fa-user-circle-o" aria-hidden="true"></i>
				<label>Application Users</label>
				<span class="fa fa-plus"></span>
			</a>
			<ul class="dropdown-menu hass">
			    <li class="<?php echo e(Request::is('all/user/list') ? 'active' : ''); ?>">
				<a href="<?php echo e(route('all.user.list')); ?>">All Users</a>
				</li>
				<li class="<?php echo e(Request::is('subadmin/list') ? 'active' : ''); ?>">
					<a href="<?php echo e(route('subadmin.user.list')); ?>">Admin Users</a>
				</li>
				 <li class="<?php echo e(Request::is('sales/user/list') ? 'active' : ''); ?>">
					<a href="<?php echo e(route('sales.user.list')); ?>">Sales Module Users</a>
				</li>
				
				
				 <li class="<?php echo e(Request::is('raw/material/user/list') ? 'active' : ''); ?>">
					<a href="<?php echo e(route('raw.user.list')); ?>">Raw Material Module Users</a>
				</li>
				
				
				 <li class="<?php echo e(Request::is('production/user/list') ? 'active' : ''); ?>">
					<a href="<?php echo e(route('production.user.list')); ?>">Production Module Users</a>
				</li>
			</ul>
		  </li>
		  
		  <!-- Company Menu-->
	  
		  <li class="dropdown dropdown-submenu">
			<a class="dropdown-toggle" data-toggle="dropdown" href="#">
				  <i class="fa fa-building" aria-hidden="true"></i>
				<label>Company</label>
				<span class="fa fa-plus"></span>
			</a>
			<ul class="dropdown-menu hass">
			   <li class="<?php echo e(Request::is('company') ? 'active' : ''); ?>">
					<a href="<?php echo e(route('admin.company.list')); ?>">Company List</a>
				</li>
				<li class="<?php echo e(Request::is('plant') ? 'active' : ''); ?>">
					<a href="<?php echo e(route('admin.plant.list')); ?>">Plant List</a>
				</li>
				
				<li class="<?php echo e(Request::is('supplier') ? 'active' : ''); ?>"><a href="<?php echo e(route('admin.supplier.list')); ?>">Supplier List</a></li>
				
			</ul>
		  </li>
		  
		   <!--Activity Log-->
	  
		   <li class="dropdown dropdown-submenu">
			<a class="dropdown-toggle" data-toggle="dropdown" href="#">
				 <i class="fa fa-list" aria-hidden="true"></i>
				<label>Activity Log</label> <span class="fa fa-plus"></span>
			</a>
			<ul class="dropdown-menu hass">          
				<li class="<?php echo e(Request::is('user/activity/list') ? 'active' : ''); ?>"><a href="<?php echo e(route('user.activity.list')); ?>">User Log</a></li>
				
				<li class="<?php echo e(Request::is('product/activity/list') ? 'active' : ''); ?>"><a href="<?php echo e(route('product.activity.list')); ?>">Product Log</a></li>
				
				
				<li class="<?php echo e(Request::is('order/activity/list') ? 'active' : ''); ?>"><a href="<?php echo e(route('order.activity.list')); ?>">Order Log</a></li>
			</ul>
		  </li>
		  
		   <!--Settings-->
		  
		   <li class="dropdown dropdown-submenu">
			<a class="dropdown-toggle" data-toggle="dropdown" href="#">
				<i class="fa fa-cog" aria-hidden="true"></i>
				<label>Settings</label> <span class="fa fa-plus"></span>
			</a>
			<ul class="dropdown-menu hass">          
				 <li class="<?php echo e(Request::is('order/status/list') ? 'active' : ''); ?>"><a href="<?php echo e(route('order.status.list')); ?>">Order Status</a></li>
			</ul>
		  </li>

		</ul>
	  </li>

	<script type="text/javascript">
		(function($){
		$(document).ready(function(){
			$('ul.dropdown-menu.hass [data-toggle=dropdown]').on('click', function(event) {
				event.preventDefault(); 
				event.stopPropagation(); 
				$(this).parent().siblings().removeClass('open');
				$(this).parent().toggleClass('open');
			});
		});
	})(jQuery);
	</script>


<?php /**PATH D:\xampp\htdocs\raorelays\resources\views/layouts/sidebar/admin.blade.php ENDPATH**/ ?>
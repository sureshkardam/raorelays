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
       
	 <li class="<?php echo e(Request::is('create/product') ? 'active' : ''); ?>"><a href="<?php echo e(route('admin.product.create')); ?>">Create Product</a></li>

	   <li class="<?php echo e(Request::is('product') ? 'active' : ''); ?>"><a href="<?php echo e(route('admin.product.list')); ?>">Product List</a></li>
       <!--<li class="<?php echo e(Request::is('attribute') ? 'active' : ''); ?>"><a id="attribute-list" href="<?php echo e(route('admin.attribute.list')); ?>">Attributes</a></li>-->
        <!--<li class="<?php echo e(Request::is('category') ? 'active' : ''); ?>"><a href="<?php echo e(route('admin.category.list')); ?>">Categories</a></li>
        <li class="<?php echo e(Request::is('option') ? 'active' : ''); ?>"><a href="<?php echo e(route('admin.option.list')); ?>">Options</a></li>-->
        
    </ul>
</li>



<li class="dropdown">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown" title="Material Catalog"><i class="fa fa-archive" aria-hidden="true"></i>
      
        <label>Raw Material Catalog</label> <span class="fa fa-plus"></span> </a>
    <ul class="dropdown-menu">
        <li class="<?php echo e(Request::is('material/product') ? 'active' : ''); ?>"><a href="<?php echo e(route('admin.material.product.list')); ?>">Material Products</a></li>
       <!--<li class="<?php echo e(Request::is('attribute') ? 'active' : ''); ?>"><a id="attribute-list" href="<?php echo e(route('admin.attribute.list')); ?>">Attributes</a></li>-->
        <li class="<?php echo e(Request::is('material/category') ? 'active' : ''); ?>"><a href="<?php echo e(route('admin.material.category.list')); ?>">Material Categories</a></li>
        <li class="<?php echo e(Request::is('material/option') ? 'active' : ''); ?>"><a href="<?php echo e(route('admin.material.option.list')); ?>">Material Options</a></li>
        
    </ul>
</li>








<li class="dropdown">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown" title="Application Users">
        <i class="fa fa-user-circle-o" aria-hidden="true"></i>
        <label>Application Users</label>
        <span class="fa fa-plus"></span>
    </a>
    <ul class="dropdown-menu">
       
        <li class="<?php echo e(Request::is('all/user/list') ? 'active' : ''); ?>">
            <a href="<?php echo e(route('all.user.list')); ?>">Users List</a>
        </li>
		<li class="<?php echo e(Request::is('subadmin/list') ? 'active' : ''); ?>">
            <a href="<?php echo e(route('subadmin.user.list')); ?>">Admin List</a>
        </li>
		 <li class="<?php echo e(Request::is('sales/user/list') ? 'active' : ''); ?>">
            <a href="<?php echo e(route('sales.user.list')); ?>">Sales User List</a>
        </li>
		
		
		 <li class="<?php echo e(Request::is('raw/material/user/list') ? 'active' : ''); ?>">
            <a href="<?php echo e(route('raw.user.list')); ?>">Raw Material User List</a>
        </li>
		
		
		 <li class="<?php echo e(Request::is('production/user/list') ? 'active' : ''); ?>">
            <a href="<?php echo e(route('production.user.list')); ?>">Production User List</a>
        </li>
		
    </ul>
</li>


<li class="dropdown">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown" title="Manage Company">
        <i class="fa fa-building" aria-hidden="true"></i>
        <label>Company</label>
        <span class="fa fa-plus"></span>
    </a>
    <ul class="dropdown-menu">
       
        <li class="<?php echo e(Request::is('company') ? 'active' : ''); ?>">
            <a href="<?php echo e(route('admin.company.list')); ?>">Company List</a>
        </li>
		<li class="<?php echo e(Request::is('plant') ? 'active' : ''); ?>">
            <a href="<?php echo e(route('admin.plant.list')); ?>">Plant List</a>
        </li>
		 
		
    </ul>
</li>









<li class="dropdown">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown" title="Activity Log"><i class="fa fa-list" aria-hidden="true"></i>
        <label>Activity Log</label> <span class="fa fa-plus"></span> </a>
    <ul class="dropdown-menu">
        
       
        <li class="<?php echo e(Request::is('user/activity/list') ? 'active' : ''); ?>"><a href="<?php echo e(route('user.activity.list')); ?>">User Log</a></li>
		
		<li class="<?php echo e(Request::is('product/activity/list') ? 'active' : ''); ?>"><a href="<?php echo e(route('product.activity.list')); ?>">Product Log</a></li>
		
		
		<li class="<?php echo e(Request::is('order/activity/list') ? 'active' : ''); ?>"><a href="<?php echo e(route('order.activity.list')); ?>">Order Log</a></li>
        
    </ul>
</li>

<li class="dropdown">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown" title="Setting"><i class="fa fa-cog" aria-hidden="true"></i>
        <label>Settings</label> <span class="fa fa-plus"></span> </a>
    <ul class="dropdown-menu">
        
       
        <li class="<?php echo e(Request::is('order/status/list') ? 'active' : ''); ?>"><a href="<?php echo e(route('order.status.list')); ?>">Order Status</a></li>
        
    </ul>
</li>



<?php /**PATH D:\xampp\htdocs\rao-relays\resources\views/layouts/sidebar/admin.blade.php ENDPATH**/ ?>
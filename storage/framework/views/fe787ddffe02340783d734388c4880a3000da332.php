<li class="dropdown">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown" title="Admin User">
        <i class="fa fa-users" aria-hidden="true"></i>
        <label>Customer</label>
        <span class="fa fa-plus"></span>
    </a>
    <ul class="dropdown-menu">
       
        <li class="<?php echo e(Request::is('customer') ? 'active' : ''); ?>">
            <a href="<?php echo e(route('admin.customer.list')); ?>">Customer List</a>
        </li>
		 
		
    </ul>
</li>

<li class="dropdown">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown" title="Admin User">
        <i class="fa fa-first-order" aria-hidden="true"></i>
        <label>Order</label>
        <span class="fa fa-plus"></span>
    </a>
    <ul class="dropdown-menu">
       
        <li class="<?php echo e(Request::is('customer') ? 'active' : ''); ?>">
            <a href="<?php echo e(route('admin.order.list')); ?>">Order List</a>
        </li>
		 
		
    </ul>
</li>

<?php /**PATH D:\xampp\htdocs\rao-relays\resources\views/layouts/sidebar/sales.blade.php ENDPATH**/ ?>
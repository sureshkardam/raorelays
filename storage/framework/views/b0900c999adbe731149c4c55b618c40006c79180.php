

<li class="dropdown">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown" title="Admin User">
        <i class="fa-first-order" aria-hidden="true"></i>
        <label>Orders</label>
        <span class="fa fa-plus"></span>
    </a>
    <ul class="dropdown-menu">
       
        <li class="<?php echo e(Request::is('customer') ? 'active' : ''); ?>">
            <a href="<?php echo e(route('admin.order.list')); ?>">Order List</a>
        </li>
		 
		
    </ul>
</li>



<?php /**PATH D:\xampp\htdocs\rao-relays\resources\views/layouts/sidebar/raw.blade.php ENDPATH**/ ?>
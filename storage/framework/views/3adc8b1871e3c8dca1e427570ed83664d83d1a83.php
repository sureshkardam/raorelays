<li class="dropdown">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown" title="Catalog"><i class="fa fa-folder" aria-hidden="true"></i>
      
        <label>Product Catalog</label> <span class="fa fa-plus"></span> </a>
    <ul class="dropdown-menu">
        <li class="<?php echo e(Request::is('product') ? 'active' : ''); ?>"><a href="<?php echo e(route('admin.product.list')); ?>">Products</a></li>
       <!--<li class="<?php echo e(Request::is('attribute') ? 'active' : ''); ?>"><a id="attribute-list" href="<?php echo e(route('admin.attribute.list')); ?>">Attributes</a></li>-->
        <li class="<?php echo e(Request::is('category') ? 'active' : ''); ?>"><a href="<?php echo e(route('admin.category.list')); ?>">Categories</a></li>
        <li class="<?php echo e(Request::is('option') ? 'active' : ''); ?>"><a href="<?php echo e(route('admin.option.list')); ?>">Options</a></li>
        
    </ul>
</li>



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



<?php /**PATH D:\xampp\htdocs\rao-relays\resources\views/layouts/sidebar/subadmin.blade.php ENDPATH**/ ?>
<table class="table" id="myTable">
        <thead>
            <tr>
			  
			   <th>Name</th>
               <th>Quantity</th>
            </tr>
        </thead>
		 <tbody>
		
		<?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
		<tr>
		 
		 <td><?php echo e(App\MaterialProduct::getName($product->id)); ?></td>
		 <td><?php echo e($product->qty); ?></td>
		  
		 </tr>
		
		 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		
		 </tbody><?php /**PATH D:\xampp\htdocs\raorelays\resources\views/admin/material-product/receiving-table.blade.php ENDPATH**/ ?>
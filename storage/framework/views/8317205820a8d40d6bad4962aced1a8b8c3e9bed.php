 <?php $__env->startSection('content'); ?>




<div class="breadcumbs-area">
    <ul>
        <li class="title-main">
            <h4>Required Product List</h4>
        </li>
        <li class="link-home"><a href="#."><i class="fa fa-home"></i></a></li>
        <li class="link-home"><a href="#.">Home</a></li>
        <li class="link-page"><a href="#.">Required Product List</a></li>
    </ul>
   
</div>
<div class="content-main-here">


  
    <div class="table-main-div">
        <div class="table-header">
            <h2><strong>Raw Material Requisite for "<?php echo e($category->name); ?>"</strong></h2>
			 
        </div>
        <div class="tableBody">
            <div class="table-responsive">
      

         <?php echo $__env->make('toast', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

				<div class="form-group row">

							
							
							
				
				</div>
				 <p id="notice"></p>
				
                <table class="table display" id="myTable">
                    <thead>
                        <tr>

                             
                            <th>Product Name</th>
							
                           
                            
                            <th>Quantity</th>
                            
                            
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>


                         
                           
                            <td><?php echo e(App\MaterialProduct::getName($product->product_id)); ?></td>
							 
                           
                            
                            <td><?php echo e($product->qty); ?></td>
                           
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>
        </div>
		 
    </div>
	
	
	
	
	</div>
	
	



    <?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\raorelays\resources\views/admin/material-product/category-wise-relation-list.blade.php ENDPATH**/ ?>
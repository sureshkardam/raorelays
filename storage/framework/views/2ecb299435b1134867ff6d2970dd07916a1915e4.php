 <?php $__env->startSection('content'); ?>




<div class="breadcumbs-area">
    <ul>
        <li class="title-main">
            <h4>Relation</h4>
        </li>
        <li class="link-home"><a href="#."><i class="fa fa-home"></i></a></li>
        <li class="link-home"><a href="#.">Home</a></li>
        <li class="link-page"><a href="#.">Relation</a></li>
    </ul>
   
</div>
<div class="content-main-here">


  <form action="<?php echo e(route('admin.material-relation',['id'=>$category->id])); ?>" id="popForm" enctype="multipart/form-data" method="post">
	<?php echo csrf_field(); ?>
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
				<input type="hidden" name="category_id" value="<?php echo e($category->id); ?>" required>
                <table class="table display" id="myTable">
                    <thead>
                        <tr>

                             
                            <th>Product Name</th>
							<th>Category</th>
                           
                            
                            <th>Quantity</th>
                            
                            
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>


                         
                           
                            <td><?php echo e($product->name); ?></td>
							 <td><?php echo e(App\ProductToCategory::getProductCategoryByID($product->id)); ?></td>
                           
                            
                            <td>
							
							
							<input type="hidden" name="product_id[]" value="<?php echo e($product->id); ?>" required>
							<input type="number" name="qty[]" class="form-control"  id="name" placeholder="Quantity" required>
							
							
							</td>
                           
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>
        </div>
		  <div class="form-field-here text-center" style="margin-top: 20px">
                   
                    <button id="save_purchase" type="submit" class="btn blue">
<i class="fa fa-plus-circle"></i> Save Purchase</button>
                </div>
    </div>
	
	
	</form>
	
	</div>
	
	



    <?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\raorelays\resources\views/admin/material-product/relation.blade.php ENDPATH**/ ?>
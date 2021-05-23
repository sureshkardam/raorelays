 <?php $__env->startSection('content'); ?>




<div class="breadcumbs-area">
    <ul>
        <li class="title-main">
            <h4>Catalog</h4>
        </li>
        <li class="link-home"><a href="#."><i class="fa fa-home"></i></a></li>
        <li class="link-home"><a href="#.">Home</a></li>
        <li class="link-page"><a href="#.">Raw Material List</a></li>
    </ul>
    <div class="create-button">
        <a href="<?php echo e(route('admin.material.product.create')); ?>"><i class="fa fa-plus"></i></a>
        <a href="#." class="filter-button"><i class="fa fa-filter"></i> Filter</a>
    </div>
</div>
<div class="content-main-here">
    <div class="filter-blocks">
        <div class="row">
            <div class="col-sm-12">
                <div class="card-here">
                    <h3>Filter</h3>



                    <form class="row" action="<?php echo e(route('admin.material.product.list')); ?>" method="post">
                        <div class="input-filter col-sm-4">
                            <input type="text" name="from" class="date-picker" placeholder="From Date">
                        </div>
                        <div class="input-filter col-sm-4">
                            <input type="text" name="to" class="date-picker" placeholder="To Date">
                        </div>
                        <?php echo csrf_field(); ?>
                        <div class="input-filter submit col-sm-2">
                            <button title="Click To Filter">
                                                <i class="fa fa-filter"></i>
                                                <input type="submit" value="Filter">
                                            </button>
                        </div>
                    </form>





                </div>
            </div>
        </div>
    </div>



    <div class="table-main-div">
        <div class="table-header">
            <h2><strong>Raw Material List</strong></h2>
			 <div class="create-button">
        <a href="<?php echo e(route('admin.material.product.create')); ?>"><i class="fa fa-plus"></i></a>
        
    </div>
        </div>
        <div class="tableBody">
            <div class="table-responsive">
      

         <?php echo $__env->make('toast', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

              
             

<?php if($errors->any()): ?>
    <div class="alert alert-danger">
     
            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li><?php echo e($error); ?></li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
       
    </div>
<?php endif; ?>



                <table class="table" id="myTable">
                    <thead>
                        <tr>

                            
                            <th>Name</th>
							
                            <th>Unit</th>
                            
                            <th>Quantity</th>
                            <th>Status</th>
                             <th>Created</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>


                         
                           
                            <td><?php echo e($product->name); ?></td>
							
                            <td width="100"><?php if($product->unit == 1): ?> Meter <?php endif; ?>
							<?php if($product->unit == 2): ?> Gram <?php endif; ?></td>
							
							
							
							
							
                            
                            <td><?php echo e($product->quantity); ?></td>
                            <td><?php echo e($product->status ? 'Enabled' : 'Disabled'); ?></td>
                             <td><?php echo e(date('M\. d\, Y', strtotime($product->created_at))); ?></td>

                              <td>
                                  
                                   <div class="action-dropdown-icons">
                                    <div class="action-btns">

                           
                                <a class="action-dash" href="<?php echo e(route('admin.material.product.edit',$product->id)); ?>"><i class="fa fa-pencil" aria-hidden="true" title="Edit"></i></a>

                      
                               

                                 <a onclick="deleteConfirm('material-product',<?php echo e($product->id); ?>,'<?php echo e($product->name); ?>')"><i class="fa fa-trash" aria-hidden="true" title="Delete"></i></a> 
                        
                                       </div>


                            
                                </div>
                                </td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\raorelays\resources\views/admin/material-product/list.blade.php ENDPATH**/ ?>
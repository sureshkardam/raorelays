 
<?php $__env->startSection('content'); ?>


  <div class="breadcumbs-area">
                    <ul>
                        <li class="title-main">
                            <h4>Material Categories</h4>
                        </li>
                        <li class="link-home"><a href="#."><i class="fa fa-home"></i></a></li>
                        <li class="link-home"><a href="#.">Home</a></li>
                        <li class="link-page"><a href="#.">Material Categories List</a></li>
                    </ul>
                    <div class="create-button">
                        <a title="Add New" href="<?php echo e(route('admin.material.category.create')); ?>"><i class="fa fa-plus"></i></a>
                        <a href="#." class="filter-button"><i class="fa fa-filter"></i> Filter</a>
                    </div>
                </div>
                <div class="content-main-here">
                   


                    <div class="table-main-div mt-0">
                        <div class="table-header">
                            <h2><strong>All Material Categories</strong></h2>
							 <div class="create-button">
                        <a title="Add New" href="<?php echo e(route('admin.material.category.create')); ?>"><i class="fa fa-plus"></i></a>
                       
                    </div>
                        </div>
                        <div class="tableBody">
                            <div class="table-responsive">
                          
          


  <?php echo $__env->make('toast', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                    
 

                        
                                          <table class="table" id="myTable">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Status</th>
                                        <th>Created</th>
                                         <th>Sort Order</th>
                                        <th>Action</th>
                                       
                                    </tr>
                                </thead>
                                <tbody>
                                  <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                  <tr>
                                    <td><?php echo e($category->name); ?></td> 
                                    <td><?php echo e(\App\MaterialCategory::getCategoryStatus($category->category_id)  ? 'Enabled' : 'Disabled'); ?></td>
                                    <td><?php echo e(\App\MaterialCategory::getCreated($category->category_id)); ?></td>
                                    <td><?php echo e(App\MaterialCategory::getSortOrder($category->category_id)); ?></td>
                                           
                                    <td><a href="<?php echo e(route('admin.material.category.edit',['id'=>$category->category_id])); ?>" ><i class="fa fa-pencil" aria-hidden="true" title="Edit"></i></a>
                                      
                               


                                 <a onclick="deleteConfirm('material-category',<?php echo e($category->category_id); ?>,'<?php echo e($category->name); ?>')"><i class="fa fa-trash" aria-hidden="true" title="Delete"></i></a> </td> 
                                    
                                    </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                       
              
                                   
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
  
  
 
 
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>

bootstrapValidate('#addName','alpha:Enter Valid attribute Name!');
bootstrapValidate('#addattribute','alpha:Enter Valid attribute Code!');
bootstrapValidate('#addPhonecode','numeric:Enter Valid Phone Code!');
bootstrapValidate('#editattributename','alpha:Please Check Your attribute Name!');
bootstrapValidate('#editattributecode','alpha:Please Check Your attribute Code!');
bootstrapValidate('#editPhonecode','numeric:Please Check Your Phone Code!');


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\raorelays\resources\views/admin/material-category/list.blade.php ENDPATH**/ ?>
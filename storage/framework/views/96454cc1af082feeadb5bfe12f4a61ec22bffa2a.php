 
<?php $__env->startSection('content'); ?>


  <div class="breadcumbs-area">
                    <ul>
                        <li class="title-main">
                            <h4>Product Main Category List</h4>
                        </li>
                        <li class="link-home"><a href="#."><i class="fa fa-home"></i></a></li>
                        <li class="link-home"><a href="#.">Home</a></li>
                        <li class="link-page"><a href="#.">Product Main Category List</a></li>
                    </ul>
                    <div class="create-button">
                        <a title="Add New" href="<?php echo e(route('admin.category.create')); ?>"><i class="fa fa-plus"></i></a>
                        <a href="#." class="filter-button"><i class="fa fa-filter"></i> Filter</a>
                    </div>
                </div>
                <div class="content-main-here">
                   


                    <div class="table-main-div mt-0">
                        <div class="table-header">
                            <h2><strong>Product Main Category List</strong></h2>
							 <div class="create-button">
                        <a title="Add New" href="<?php echo e(route('admin.category.create')); ?>"><i class="fa fa-plus"></i></a>
                        
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
                                       
                                        
                                        <th>Action</th>
                                       
                                    </tr>
                                </thead>
                                <tbody>
                                  <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                  <tr>
                                    <td><a href="<?php echo e(route('admin.subcategory.category.list',['id'=>$category->id])); ?>"><?php echo e($category->name); ?></a></td> 
                                    <td><?php echo e(\App\Category::getCategoryStatus($category->id)  ? 'Enabled' : 'Disabled'); ?></td>
                                   
                                   
                                    <td><a href="<?php echo e(route('admin.category.edit',['id'=>$category->id])); ?>" ><i class="fa fa-pencil" aria-hidden="true" title="Edit"></i></a>
                                      
                               


                                 <a class="gap" onclick="deleteConfirm('category',<?php echo e($category->id); ?>,'<?php echo e($category->name); ?>')"><i class="fa fa-trash" aria-hidden="true" title="Delete"></i></a>
								 
								 
								<!-- <a href="<?php echo e(route('admin.category.edit',['id'=>$category->category_id])); ?>" ><i class="fa fa-list" aria-hidden="true" title="Raw Material"></i>Raw Material</a>-->
                                      
                               
									
								 </td> 
                                    
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
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\raorelays\resources\views/admin/category/list.blade.php ENDPATH**/ ?>
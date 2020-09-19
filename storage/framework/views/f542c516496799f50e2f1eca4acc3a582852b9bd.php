<?php $__env->startSection('content'); ?>

<div class="breadcumbs-area">
                    <ul>
                        <li class="title-main">
                            <h4>Material Option</h4>
                        </li>
                        <li class="link-home"><a href="#."><i class="fa fa-home"></i></a></li>
                        <li class="link-home"><a href="#.">Home</a></li>
                        <li class="link-page"><a href="#."> Material Option</a></li>
                    </ul>
                    <div class="create-button">
                        <a title="Add New" href="<?php echo e(route('admin.material.option.create')); ?>"><i class="fa fa-plus"></i></a>
                        <a href="#." class="filter-button"><i class="fa fa-filter"></i> Filter</a>
                    </div>
                </div>
                <div class="content-main-here ">
                   


                    <div class="table-main-div mt-0">
                        <div class="table-header">
                            <h2><strong>All Material Option</strong> </h2>
							 <div class="create-button">
                        <a title="Add New" href="<?php echo e(route('admin.material.option.create')); ?>"><i class="fa fa-plus"></i></a>
                       
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
                <?php $__currentLoopData = $options; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $option): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        
                                        <td><?php echo e($option->name); ?></td>
                                        <td><?php echo e($option->status ? 'Enabled' : 'Disabled'); ?></td>
                                         <td><?php echo e(date('M\. d\, Y', strtotime($option->created_at))); ?></td>
                                         <td><?php echo e($option->sort_order); ?></td>
                                        
                                      
                                       
                                        <td>

<!-- Edit -->
                   <a href="<?php echo e(route('admin.material.option.edit',$option->id)); ?>"><i class="fa fa-pencil" aria-hidden="true" title="Edit"></i></a>

             <a onclick="deleteConfirm('material-option-main',<?php echo e($option->id); ?>,'<?php echo e($option->name); ?>')"><i class="fa fa-trash" aria-hidden="true" title="Delete"></i></a>            

   

</td>
                                        
                                         
                                    </tr>
                                 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>  
                                </tbody>
                            </table>
                        </div>
                        </div>
                    </div>
                </div>


<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\rao-relays\resources\views/admin/material-option/list.blade.php ENDPATH**/ ?>
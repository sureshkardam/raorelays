<?php $__env->startSection('content'); ?>
<div class="breadcumbs-area with-label">
                    <ul>
                        <li class="title-main">
                            <h4>Company</h4>
                        </li>
                        <li class="link-home"><a href="#."><i class="fa fa-home"></i></a></li>
                        <li class="link-home"><a href="#.">Home</a></li>
                        <li class="link-page"><a href="#.">Company List</a></li>
                    </ul>
                    <div class="create-button">
                        <!--<a title="Add New" href="<?php echo e(route('admin.company.create')); ?>"><i class="fa fa-plus"></i> Create Company</a>-->
                        <a href="#." class="filter-button"><i class="fa fa-filter"></i> Filter</a>
                    </div>
                </div>
                <div class="content-main-here">
                   <!--<div class="filter-blocks">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card-here">
                                    <h3>Filter</h3>

                                   <form class="row" action="<?php echo e(route('admin.customer.list')); ?>" method="post">
                                    <div class="input-filter col-sm-4">
                                            <input type="date" name="from" placeholder="From Date">
                                        </div>
                                        <div class="input-filter col-sm-4">
                                            <input type="date" name="to" placeholder="To Date">
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
                    </div>-->


                    <div class="table-main-div">
                        <div class="table-header">
                            <h2><strong>All Company</strong></h2>
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
                                    
 

                        
                    <table class="table customer-list" id="myTable">
                                <thead>
                                    <tr>
                                        <th>Company Name</th>
                                        <th>Code</th>
										<th>Telephone</th>
                                        <th>Contact Number</th>
										 <th>Status</th>
                                        
                                        <th>Action</th>
                                       
                                    </tr>
                                </thead>
                                <tbody>
                <?php $__currentLoopData = $companies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $company): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($company->company_name); ?></td>
                                        <td><?php echo e($company->company_code); ?></td>
                                        <td><?php echo e($company->telephone); ?></td>
										<td><?php echo e($company->mobile); ?></td>
							<td>
							
							<?php if($company->status==0): ?>
								Disabled
							<?php endif; ?>
							<?php if($company->status==1): ?>
								Enabled
							<?php endif; ?>
							<?php if($company->status==2): ?>
								Archived
							<?php endif; ?>
							
							</td>
										
                                        <td>




                   <a href="<?php echo e(route('admin.company.edit',$company->id)); ?>"><i class="fa fa-pencil" aria-hidden="true" title="Edit"></i></a>
  
    <!--<a onclick="deleteConfirm('company',<?php echo e($company->id); ?>,'<?php echo e($company->contact_name); ?>')"><i class="fa fa-trash" aria-hidden="true" title="Delete"></i></a> -->

</td>
                                        
                                          
                                    </tr>
                                 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>  
                                </tbody>
                            </table>
                        </div>
                        </div>
                    </div>
         
<script>
$(document).ready(function() {
    $('#customer-list').click(function() {
        //$('.navbar-nav li').removeClass('check');
        $(this).addClass('check');
    })
});
</script>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\raorelays\resources\views/admin/company/list.blade.php ENDPATH**/ ?>
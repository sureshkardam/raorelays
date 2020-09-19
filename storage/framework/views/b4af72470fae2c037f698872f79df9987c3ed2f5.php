<?php $__env->startSection('content'); ?>
<div class="breadcumbs-area">
                    <ul>
                        <li class="title-main">
                            <h4>Activity</h4>
                        </li>
                        <li class="link-home"><a href="#."><i class="fa fa-home"></i></a></li>
                        <li class="link-home"><a href="#.">Home</a></li>
                        <li class="link-page"><a href="#.">Activity List</a></li>
                    </ul>
                    <div class="create-button">
                        <a title="Add New" href="<?php echo e(route('create.user')); ?>"><i class="fa fa-plus"></i></a>
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
                            <h2><strong>User Activity List</strong></h2>
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
                                        <th>Module</th>
										<th>Event</th>
                                       	<th>Key</th>
										<th>Value</th>
										<th>Created By</th>
										 <th>Created Date</th>
                                        
                                       
                                       
                                    </tr>
                                </thead>
                                <tbody>
                <?php $__currentLoopData = $activities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $activity): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        
										<td><?php echo e($activity->module); ?></td>
                                        <td><?php echo e($activity->event); ?></td>
										<td><?php echo e($activity->field_key); ?></td>
										<td><?php echo e($activity->field_value); ?></td>
										
										<td><?php echo e(App\User::getName($activity->user_id)); ?></td>
																		
										<td><?php echo e(date('M\. d\, Y', strtotime($activity->created_at))); ?></td>
										  
                                    </tr>
                                 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>  
                                </tbody>
                            </table>
                        </div>
                        </div>
                    </div>
					
					  </div>
                </div>
         
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\rao-relays\resources\views/admin/activity/user-list.blade.php ENDPATH**/ ?>
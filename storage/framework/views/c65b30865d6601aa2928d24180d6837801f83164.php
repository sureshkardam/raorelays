<?php $__env->startSection('content'); ?>
<div class="breadcumbs-area with-label">
    <ul>
        <li class="title-main">
            <h4>Order Status</h4>
        </li>
        <li class="link-home"><a href="#."><i class="fa fa-home"></i></a></li>
        <li class="link-home"><a href="#.">Home</a></li>
        <li class="link-page"><a href="#.">Order Status</a></li>
    </ul>
    <div class="create-button">
        <a href="" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-plus"></i> Create Status</a>
    </div>
</div>
<div class="table-main-div" style="margin-top: 0;">
    <div class="table-header">
        <h2><strong>Order Status</strong></h2>
		 <div class="create-button">
        <a href="" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-plus"></i> Create Status</a>
    </div>
    </div>
    <div class="tableBody">
        <div class="table-responsive">

            <?php echo $__env->make('toast', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <div class="edit-account">
                <table class="table" id="myTable">
                    <thead>
                        <tr>
                                        <th>Name</th>
                                         <th>Status</th>
                                        <th>Created</th>  
                                        <th>Action</th>
                                       
                                    </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $order_status; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order_status): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                    <tr>
                                        <td><?php echo e($order_status->name); ?></td>
                                        
                                         <td><?php echo e($order_status->status ? 'Enabled' : 'Disabled'); ?></td>
                                       
                                      <td><?php echo e(date('M\. d\, Y', strtotime($order_status->created_at))); ?></td>
                           
                            <td width="60px">
          <!-- Edit -->     <a data-toggle="modal" data-target="#exampleModal_<?php echo e($order_status->id); ?>">
                            <i class="fa fa-pencil" aria-hidden="true" title="Edit"></i></a>
                                


            <!-- delete   -->  

                         <a onclick="deleteConfirm('order-status',<?php echo e($order_status->id); ?>,'<?php echo e($order_status->name); ?>')"><i class="fa fa-trash" aria-hidden="true" title="Delete"></i></a> 


                        <div class="modal fade" id="exampleModal_<?php echo e($order_status->id); ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Edit Order Status </h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                </button>
                                            </div>
                                            <div class="modal-body manu-add">
                                                <form action="<?php echo e(route('order.status.edit',$order_status->id)); ?>" id="popForm" method="post" enctype="multipart/form-data">
                                               
                                                         <input type="hidden" name="_token" id="csrf-token" value="<?php echo e(Session::token()); ?>" />

                                                        
                                                       <div class="form-field-here">
                                                            
                                                            <label for="name">Name
                                                                <span style="color: red">*</span>
                                                            </label>

                                                             <?php if(Session::has('EditOrderStatusErrors')): ?>
                                    <?php $__currentLoopData = Session::get('EditOrderStatusErrors')->get('Name'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $errorMessage): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                  <span class="label label-danger"><?php echo e($errorMessage); ?></span>
                                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?>
                                                            <input type="text" name="name" id="title" value="<?php echo e($order_status->name); ?>" class="form-control input-md" required>
                                                        </div>
                                                        
                                                        
                                                        <div class="form-field-here">
                                                            <label for="status">Status :</label>
                                                            <select class="custom-select form-control" name="status" id="edit_status">
                                                                <option value="1" <?php if($order_status->status==1): ?>selected <?php endif; ?>>Enabled</option>
                                                                <option value="0" <?php if($order_status->status==0): ?>selected <?php endif; ?>>Disabled</option>
																<option value="2" <?php if($order_status->status==2): ?>selected <?php endif; ?>>Archived</option>
                                                            </select>
                                                        </div>
                       
                                                    </div>

                                                    <div class="modal-footer">
                                                <button type="button" class="btn blue" data-dismiss="modal">Close</button>
                                                     
                                                        <button type="submit" class="btn blue">Update</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
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
</div>
</div>
</div>


<!-- Create -->

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Order Status</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <div class="modal-body manu-add">
                <form action="<?php echo e(route('order.status.create')); ?>" id="popForm" method="post" >
                    <?php echo csrf_field(); ?>
                    <div class="popper-box">
                        
                        
                        <div class="form-field-here">
                           
                            <label for="name">Name
                                <span style="color: red">*</span>
                            </label>
                             <?php if(Session::has('CreateOrderStatusErrors')): ?>
                                    <?php $__currentLoopData = Session::get('CreateOrderStatusErrors')->get('Name'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $errorMessage): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                  <span class="label label-danger"><?php echo e($errorMessage); ?></span>
                                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?>
                            <input type="text" name="name" id="name" value="<?php echo e(old('name')); ?>" placeholder="Enter Your Name" class="form-control input-md">
                        </div>
                       
                        <div class="form-field-here">
                            <label for="attribute">Status :</label>
                            <select class="custom-select form-control" name="status" id="status">
                                <option value="1" selected>Enabled</option>
                                <option value="0">Disabled</option>
								<option value="2">Archived</option>
                            </select>
                        </div>



                     


                      
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn blue" data-dismiss="modal">Close</button>
                 
                        <button type="submit" class="btn blue">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>



                                                      

                   
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\rao-relays\resources\views/admin/order_status.blade.php ENDPATH**/ ?>
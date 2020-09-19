	
<?php $__env->startSection('content'); ?>
  


                <div class="breadcumbs-area">
                    <ul>
                        <li class="title-main">
                            <h4>User</h4>
                        </li>
                        <li class="link-home"><a href="#."><i class="fa fa-home"></i></a></li>
                        <li class="link-home"><a href="#.">Home</a></li>
                        <li class="link-page"><a href="#.">Edit User</a></li>
                    </ul>
                    <!-- <div class="create-button">
                        <a title="Add New" href="#."><i class="fa fa-plus"></i></a>
                    </div> -->
                </div>
                <div class="content-main-here">
                    <div class="table-main-div" style="margin-top: 0px;">
                        <div class=" table-header ">
                            <h2><strong>Edit User</strong> </h2>
                        </div>
          
       <?php echo $__env->make('toast', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


             <div class="form-default">
 
         
    
      
            <form action=""  method="post">
                                   
                                <?php echo csrf_field(); ?>    
                                
								<div class="form-group row">
								 <div class="form-group col-sm-6">
								  <label for="full name" class="hello">Employee Name
                           <span style="color: red">*</span>
                            </label>
								  
								  <?php if(Session::has('userErrorMessage')): ?>
                                    <?php $__currentLoopData = Session::get('userErrorMessage')->get('Name'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $errorMessage): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                     <span class="label label-danger"><?php echo e($errorMessage); ?></span>
                                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                       <?php endif; ?>
								 
								 <input type="text"   name="name" class="form-control" value="<?php echo e($user->name); ?>" required>

								 </div>
								 
								 
								 <div class="form-group col-sm-6">
								  <label for="full name" class="hello">Email
                           <span style="color: red">*</span>
                            </label>
								  
								  <?php if(Session::has('userErrorMessage')): ?>
                                    <?php $__currentLoopData = Session::get('userErrorMessage')->get('Email'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $errorMessage): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                     <span class="label label-danger"><?php echo e($errorMessage); ?></span>
                                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                       <?php endif; ?>
								 
								 <input type="text"   name="email" class="form-control" value="<?php echo e($user->email); ?>" required>

								 </div>
								 
								 
              
                                       <div class="form-group col-sm-6">
                                    <label for="employee_id" class="hello">Employee ID
                           <span style="color: red">*</span>
                            </label>
                                         
										 
										  <?php if(Session::has('userErrorMessage')): ?>
                                    <?php $__currentLoopData = Session::get('userErrorMessage')->get('EmployeeId'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $errorMessage): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                     <span class="label label-danger"><?php echo e($errorMessage); ?></span>
                                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                       <?php endif; ?>
										 <input type="text" <?php if($user->apPersonal): ?>  value="<?php echo e($user->apPersonal->employee_id); ?>" <?php endif; ?> name="employee_id" class="form-control" required>
                                        </div>
										
                                        <div class="form-group col-sm-6">
                                        <label for="" class="hello">Contact Number
                           <span style="color: red">*</span>
                            </label>
                                             <?php if(Session::has('userErrorMessage')): ?>
                                    <?php $__currentLoopData = Session::get('userErrorMessage')->get('ContactNumber'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $errorMessage): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                     <span class="label label-danger"><?php echo e($errorMessage); ?></span>
                                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                       <?php endif; ?>
											
		<input type="text"  <?php if($user->apPersonal): ?> value="<?php echo e($user->apPersonal->telephone); ?>" <?php endif; ?> name="contact_number" class="form-control" placeholder="" required> 
                                        </div>
										
										
											<div class="form-group col-sm-6">
                                            <label for="status" class="hello">Status
												<span style="color: red">*</span>
											</label>                                    
                                            <select class="form-control" name="status" required>
                                              <option <?php if($user->status == 1): ?> selected <?php endif; ?> value="1" selected>Enable</option>
                                              <option <?php if($user->status == 0): ?> selected <?php endif; ?> value="0">Disable</option>
											  <option <?php if($user->status == 2): ?> selected <?php endif; ?> value="2">Archive</option>
											  
                                            </select>
                                        </div>

                                    </div>
                                   
                           
                                    <div class="form-group row">
                        <div class="form-group form-check col-sm-12 text-center">
                   
                           <button type="submit" class="btn blue">Update User</button>
                        </div>
                   
 </div>
                                </form>
                
            </div>
        </div>




             
                
        
        
    

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\rao-relays\resources\views/admin/edit-user.blade.php ENDPATH**/ ?>
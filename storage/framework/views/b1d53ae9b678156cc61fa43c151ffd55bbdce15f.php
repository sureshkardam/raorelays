	
<?php $__env->startSection('content'); ?>
  


                <div class="breadcumbs-area">
                    <ul>
                        <li class="title-main">
                            <h4>User</h4>
                        </li>
                        <li class="link-home"><a href="#."><i class="fa fa-home"></i></a></li>
                        <li class="link-home"><a href="#.">Home</a></li>
                        <li class="link-page"><a href="#.">Create User</a></li>
                    </ul>
                    <!-- <div class="create-button">
                        <a title="Add New" href="#."><i class="fa fa-plus"></i></a>
                    </div> -->
                </div>
                <div class="content-main-here">
                    <div class="table-main-div" style="margin-top: 0px;">
                        <div class=" table-header ">
                            <h2><strong>Create User</strong> </h2>
                        </div>
          
       <?php echo $__env->make('toast', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


             <div class="form-default">
 
         
    
      
            <form action=""  method="post" class="user_form">
                                   
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
								 
								 <input type="text"   id="name" name="name" class="form-control" value="<?php echo e(old('name')); ?>" required>

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
								 
								 <input type="text"   id="email" name="email" class="form-control" value="<?php echo e(old('email')); ?>" required>

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
										 <input type="text"   name="employee_id" class="form-control" value="<?php echo e(old('employee_id')); ?>" required>
                                        </div>
										
                                        <div class="form-group col-sm-6">
                                        <label for="contact_number" class="hello">Contact Number
                           <span style="color: red">*</span>
                            </label>
                                             <?php if(Session::has('userErrorMessage')): ?>
                                    <?php $__currentLoopData = Session::get('userErrorMessage')->get('ContactNumber'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $errorMessage): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                     <span class="label label-danger"><?php echo e($errorMessage); ?></span>
                                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                       <?php endif; ?>
											
											<input type="text"   name="contact_number" class="form-control" placeholder="" id="contact_number" value="<?php echo e(old('contact_number')); ?>" required>
                                        </div>
										
										
											<div class="form-group col-sm-6">
                                            <label for="user_type" class="hello">User Type
												<span style="color: red">*</span>
											</label>                                    
                                            <select class="form-control" name="user_type" required>
                                              <option value="2">Sub Admin</option>
                                              <option value="0">Sales</option>
											  <option value="3">Raw Material</option>
											  <option value="4">Production Management</option>
                                            </select>
                                        </div>
											
											
											
											<div class="form-group col-sm-6">
                                            <label for="status" class="hello">Status
												<span style="color: red">*</span>
											</label>                                    
                                            <select class="form-control" name="status" required>
                                              <option value="1" >Enabled</option>
                                              <option value="0">Disabled</option>
											  <option value="2">Archived </option>
                                            </select>
                                        </div>

                                    </div>
                                   
                           
                                    <div class="form-group row">
                        <div class="form-group form-check col-sm-12 text-center">
                   
                           <button type="submit" class="btn blue">Create User</button>
                        </div>
                   
 </div>
                                </form>
                
            </div>
        </div>




             
<script>
$(document).ready(function() {
    $('.user_form').bootstrapValidator({
        message: 'This value is not valid',
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            email: {
                validators: {
                    notEmpty: {
                        message: 'The email address is required and cannot be empty'
                    },
                    regexp: {
                        regexp: /^\w+@[a-zA-Z_]+?\.[a-zA-Z]{2,3}$/,
                        message: 'The Email format is not valid'
                    }
                }
            },
			contact_number: {
                validators: {
                    notEmpty: {
                        message: 'Contact Number is required and cannot be empty'
                    },
                   
					stringLength: {
                        min: 10,
                        max: 10,
                        message: 'Contact Number is not valid'
                    },
                }
            },
			
			
        }
    });
});
</script>                
        
        
    

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\raorelays\resources\views/admin/create-user.blade.php ENDPATH**/ ?>
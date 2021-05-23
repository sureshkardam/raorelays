 
<?php $__env->startSection('content'); ?>


                <div class="breadcumbs-area">
                    <ul>
                        <li class="title-main">
                            <h4>Create Customer</h4>
                        </li>
                        <li class="link-home"><a href="#."><i class="fa fa-home"></i></a></li>
                        <li class="link-home"><a href="#.">Home</a></li>
                        <li class="link-page"><a href="#.">Create Customer</a></li>
                    </ul>
                    <!-- <div class="create-button">
                        <a title="Add New" href="#."><i class="fa fa-plus"></i></a>
                    </div> -->
                </div>
                
                <div class="content-main-here">
                    <div class="table-main-div" style="margin-top: 0px;">
                        <div class=" table-header ">
                            <h2><strong>Enter Customer Detail</strong> </h2>
                        </div>
						<?php echo $__env->make('toast', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
             <?php if($errors->any()): ?>
    <div class="alert alert-danger">
     
            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li><?php echo e($error); ?></li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
       
    </div>
<?php endif; ?> 


                                     <div class="form-default ">
      
                               <form class="customer_form" method="post" action="<?php echo e(route('admin.customer.create')); ?>">
                                    <div class="form-group row">
                                         <div class="form-group col-sm-6">
                                               <label for="customer name" class="hello">Customer Name
                                      <span style="color: red">*</span>
                                        </label>

<!-- Name -->
                                            <input type="text" name="contact_name" class="form-control"  placeholder="Customer Name" value="<?php echo e(old('contact_name')); ?>" required>
                                            <?php if(Session::has('customerErrorMessage')): ?>
                         <?php $__currentLoopData = Session::get('customerErrorMessage')->get('CustomerName'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $errorMessage): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <span class="label label-danger"><?php echo e($errorMessage); ?></span>
                         <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                                        </div>
                                        <?php echo csrf_field(); ?>
                          
						  
										<div class="form-group col-sm-6">
											<label>Customer Code<span style="color: red">*</span></label>
                                            <input type="text" name="customer_code" class="form-control" id="customer_code" placeholder="" value="<?php echo e(App\Http\Controllers\CustomerController::generateReferenceCode()); ?>" required readonly>
											<?php if(Session::has('customerErrorMessage')): ?>
                         <?php $__currentLoopData = Session::get('customerErrorMessage')->get('CustomerCode'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $errorMessage): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <span class="label label-danger"><?php echo e($errorMessage); ?></span>
                         <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                                        </div>
										
										<div class="form-group col-sm-6">
											<label>Email<span style="color: red">*</span></label>
                                            <input type="text" name="email" class="form-control" id="email" placeholder="" value="<?php echo e(old('email')); ?>" required>
											<?php if(Session::has('customerErrorMessage')): ?>
                         <?php $__currentLoopData = Session::get('customerErrorMessage')->get('Email'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $errorMessage): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <span class="label label-danger"><?php echo e($errorMessage); ?></span>
                         <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                                        </div>
										<div class="form-group col-sm-6">
											<label>Contact Number<span style="color: red">*</span></label>
                                            <input type="text" name="mobile" class="form-control" id="mobile" placeholder="" value="<?php echo e(old('mobile')); ?>" required>
											<?php if(Session::has('customerErrorMessage')): ?>
                         <?php $__currentLoopData = Session::get('customerErrorMessage')->get('ContactNumber'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $errorMessage): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <span class="label label-danger"><?php echo e($errorMessage); ?></span>
                         <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                                        </div>
										<div class="form-group col-sm-6">
											<label>Additional Contact Number</label>
                                            <input type="text" name="telephone" class="form-control" id="telephone" placeholder="" value="<?php echo e(old('telephone')); ?>" >
											<?php if(Session::has('customerErrorMessage')): ?>
                         <?php $__currentLoopData = Session::get('customerErrorMessage')->get('AdditionalContactNumber'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $errorMessage): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <span class="label label-danger"><?php echo e($errorMessage); ?></span>
                         <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                                        </div>
										<div class="form-group col-sm-6">
											<label>Registered Address<span style="color: red">*</span></label>
                                            <input type="text" name="registered_address" class="form-control" id="registered_address" placeholder="" value="<?php echo e(old('registered_address')); ?>" required>
											<?php if(Session::has('customerErrorMessage')): ?>
                         <?php $__currentLoopData = Session::get('customerErrorMessage')->get('RegisteredAddress'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $errorMessage): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <span class="label label-danger"><?php echo e($errorMessage); ?></span>
                         <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                                        </div>
										<div class="form-group col-sm-6">
											<label>City<span style="color: red">*</span></label>
                                            <input type="text" name="city" class="form-control" id="city" placeholder="" value="<?php echo e(old('city')); ?>" required>
											<?php if(Session::has('customerErrorMessage')): ?>
                         <?php $__currentLoopData = Session::get('customerErrorMessage')->get('City'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $errorMessage): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <span class="label label-danger"><?php echo e($errorMessage); ?></span>
                         <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                                        </div>
										<div class="form-group col-sm-6">
											<label>State<span style="color: red">*</span></label>
                                            <select class="form-control"  name="state" id="state">
												<option value="">Select State</option>
												<?php $__currentLoopData = $states; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $state): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
												<option value="<?php echo e($state->id); ?>"><?php echo e($state->name); ?></option>
												<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
											</select>
                                        </div>
										<div class="form-group col-sm-6">
											<label>Country<span style="color: red">*</span></label>
                                          
    
         
								<select class="form-control"  name="country" id="country">
												
												<option value="101" selected>India</option>
												
											</select>
        
                         
                     
											
                                        </div>
										<div class="form-group col-sm-6">
											<label>Zip Code<span style="color: red">*</span></label>
                                            <input type="text" name="zip_code" class="form-control" id="zip_code" placeholder="" value="<?php echo e(old('zip_code')); ?>" required>
											<?php if(Session::has('customerErrorMessage')): ?>
                         <?php $__currentLoopData = Session::get('customerErrorMessage')->get('ZipCode'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $errorMessage): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <span class="label label-danger"><?php echo e($errorMessage); ?></span>
                         <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                                        </div>
										
										
										
										<div class="form-group col-sm-6">
											<label>GST<span style="color: red">*</span></label>
                                            <input type="text" name="gst" class="form-control" id="gst" placeholder="" value="<?php echo e(old('gst')); ?>" required>
											<?php if(Session::has('customerErrorMessage')): ?>
                         <?php $__currentLoopData = Session::get('customerErrorMessage')->get('GST'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $errorMessage): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <span class="label label-danger"><?php echo e($errorMessage); ?></span>
                         <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                                        </div>
										
										<div class="form-group col-sm-6">
											<label>Tin<span style="color: red">*</span></label>
                                            <input type="text" name="tin" class="form-control" id="tin" placeholder="" value="<?php echo e(old('tin')); ?>" required>
											<?php if(Session::has('customerErrorMessage')): ?>
                         <?php $__currentLoopData = Session::get('customerErrorMessage')->get('TIN'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $errorMessage): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <span class="label label-danger"><?php echo e($errorMessage); ?></span>
                         <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                                        </div>	
										
										
										
										
										
										<div class="form-group col-sm-12">
											<label>Payment Terms<span style="color: red">*</span></label>
                                            
											
											
											<input type="text" name="payment_terms" class="form-control"  placeholder="" value="<?php echo e(old('payment_terms')); ?>" required>
											
											
											<?php if(Session::has('customerErrorMessage')): ?>
                         <?php $__currentLoopData = Session::get('customerErrorMessage')->get('PaymentTerms'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $errorMessage): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <span class="label label-danger"><?php echo e($errorMessage); ?></span>
                         <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                                        </div>	
										
										<div class="form-group col-sm-12">
											<label>Preferred Mode of Transport<span style="color: red">*</span></label>
                                            
											
											
											<input type="text" name="mode_of_transport" class="form-control"  placeholder="" value="<?php echo e(old('mode_of_transport')); ?>" required>
											
											
											<?php if(Session::has('customerErrorMessage')): ?>
                         <?php $__currentLoopData = Session::get('customerErrorMessage')->get('ModeTransport'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $errorMessage): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <span class="label label-danger"><?php echo e($errorMessage); ?></span>
                         <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                                        </div>	

													
										<div class="form-group col-sm-6">
											<label>Website</label>
                                            <input type="text" name="website" class="form-control" id="website" placeholder="" value="<?php echo e(old('website')); ?>" >
											<?php if(Session::has('customerErrorMessage')): ?>
                         <?php $__currentLoopData = Session::get('customerErrorMessage')->get('Website'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $errorMessage): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <span class="label label-danger"><?php echo e($errorMessage); ?></span>
                         <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                                        </div>										
									            
										<div class="form-group col-sm-6">
                                            <label for="clinic name" class="hello">Status
												<span style="color: red">*</span>
											</label>                                    
                                            <select class="form-control" name="status">
                                              <option value="1" selected>Enabled</option>
                                              <option value="0">Disabled</option>
											  <option value="2">Archived</option>
                                            </select>
                                        </div>
								
										
										
										
                                       
                                    </div>
                                 
                                     
                                
                                     <div class="form-group row">
                        <div class="form-group form-check col-sm-12 text-center">
                   
                           <button type="submit" class="btn blue">
<i class="fa fa-plus-circle"></i> Create Customer</button>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>


<!--<script src="https://cdn.ckeditor.com/4.12.1/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('mode_of_transport');
		
    </script>
	<script>
        CKEDITOR.replace('payment_terms');
		
    </script>-->
<script>
$(document).ready(function() {
    $('.customer_form').bootstrapValidator({
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
			mobile: {
                validators: {
                    notEmpty: {
                        message: 'Contact Number is required and cannot be empty'
                    },
                   
					regexp: {
                        regexp: /^[0-9]*$/,
                        message: 'Only Numric value allowed'
                    },
					
					
					stringLength: {
                        min: 10,
                        max: 10,
                        message: 'Plese enter 10 digit number'
                    },
                }
            },
			telephone: {
                validators: {
                    
					regexp: {
                        regexp: /^[0-9]*$/,
                        message: 'Only Numric value allowed'
                    },
					
					
					stringLength: {
                        min: 10,
                        max: 10,
                        message: 'Plese enter 10 digit number'
                    },
                }
            },
			zip_code: {
                validators: {
                    
					regexp: {
                        regexp: /^[0-9]*$/,
                        message: 'Only Numric value allowed'
                    },
					
					
					stringLength: {
                        min: 6,
                        max: 6,
                        message: 'Plese enter 6 digit Pin Code'
                    },
                }
            },
			
			gst: {
                message: 'The GST is not valid',
                validators: {
                    notEmpty: {
                        message: 'The GST is required and cannot be empty'
                    },
                    stringLength: {
                        min: 15,
                        max: 15,
                        message: 'The GST format should be 15 character long'
                    },
                    regexp: {
                        regexp: /^([0-9]{2}[a-zA-Z]{4}([a-zA-Z]{1}|[0-9]{1})[0-9]{4}[a-zA-Z]{1}([a-zA-Z]|[0-9]){3}){0,15}$/,
                        message: 'The GST format is not valid'
                    }
                }
            },
			
			tin: {
                message: 'The Tin is not valid',
                validators: {
                    notEmpty: {
                        message: 'The Tin is required and cannot be empty'
                    },
                    stringLength: {
                        min: 11,
                        max: 11,
                        message: 'The Tin must be 11 Digit long'
                    }
                }
            },
			
			
        }
    });
});
</script>
</div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\raorelays\resources\views/admin/customer/create.blade.php ENDPATH**/ ?>
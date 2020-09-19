 
<?php $__env->startSection('content'); ?>

                <div class="breadcumbs-area">
                    <ul>
                        <li class="title-main">
                            <h4>Customer</h4>
                        </li>
                        <li class="link-home"><a href="#."><i class="fa fa-home"></i></a></li>
                        <li class="link-home"><a href="#.">Home</a></li>
                        <li class="link-page"><a href="#.">Edit Company</a></li>
                    </ul>
                    <!-- <div class="create-button">
                        <a title="Add New" href="#."><i class="fa fa-plus"></i></a>
                    </div> -->
                </div>
                <div class="content-main-here">
                    <div class="table-main-div" style="margin-top: 0px;">
                        <div class=" table-header ">
                            <h2><strong>Edit Company</strong> </h2>
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
      
                               <form class="customer_form" method="post" action="<?php echo e(route('admin.company.edit',$company->id)); ?>">
                                    <div class="form-group row">
                                         <div class="form-group col-sm-6">
                                               <label for="Company name" class="hello">Company Name
                                      <span style="color: red">*</span>
                                        </label>

<!-- Name -->
                                            <input type="text" name="company_name" class="form-control"  value="<?php echo e($company->company_name); ?>" required>
                                            <?php if(Session::has('CompanyErrorMessage')): ?>
                         <?php $__currentLoopData = Session::get('CompanyErrorMessage')->get('CompanyName'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $errorMessage): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <span class="label label-danger"><?php echo e($errorMessage); ?></span>
                         <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                                        </div>
                                        <?php echo csrf_field(); ?>
                          
						  
										<div class="form-group col-sm-6">
											<label>Company Code<span style="color: red">*</span></label>
                                            <input type="text" name="company_code" class="form-control" id="company_code" value="<?php echo e($company->company_id); ?>" required>
											<?php if(Session::has('CompanyErrorMessage')): ?>
                         <?php $__currentLoopData = Session::get('CompanyErrorMessage')->get('CompanyCode'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $errorMessage): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <span class="label label-danger"><?php echo e($errorMessage); ?></span>
                         <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                                        </div>
										
										
										<div class="form-group col-sm-6">
											<label>Contact Number<span style="color: red">*</span></label>
                                            <input type="text" name="mobile" class="form-control" id="mobile" value="<?php echo e($company->mobile); ?>" required>
											<?php if(Session::has('CompanyErrorMessage')): ?>
                         <?php $__currentLoopData = Session::get('CompanyErrorMessage')->get('ContactNumber'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $errorMessage): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <span class="label label-danger"><?php echo e($errorMessage); ?></span>
                         <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                                        </div>
										<div class="form-group col-sm-6">
											<label>Additional Contact Number</label>
                                            <input type="text" name="telephone" class="form-control" id="telephone" value="<?php echo e($company->telephone); ?>" >
											<?php if(Session::has('CompanyErrorMessage')): ?>
                         <?php $__currentLoopData = Session::get('CompanyErrorMessage')->get('AdditionalContactNumber'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $errorMessage): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <span class="label label-danger"><?php echo e($errorMessage); ?></span>
                         <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                                        </div>
										<div class="form-group col-sm-6">
											<label>Registered Address<span style="color: red">*</span></label>
                                            <input type="text" name="registered_address" class="form-control" id="registered_address" value="<?php echo e($company->registered_address); ?>" required>
											<?php if(Session::has('CompanyErrorMessage')): ?>
                         <?php $__currentLoopData = Session::get('CompanyErrorMessage')->get('RegisteredAddress'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $errorMessage): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <span class="label label-danger"><?php echo e($errorMessage); ?></span>
                         <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                                        </div>
										<div class="form-group col-sm-6">
											<label>City<span style="color: red">*</span></label>
                                            <input type="text" name="city" class="form-control" id="city" value="<?php echo e($company->city); ?>" required>
											<?php if(Session::has('CompanyErrorMessage')): ?>
                         <?php $__currentLoopData = Session::get('CompanyErrorMessage')->get('City'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $errorMessage): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <span class="label label-danger"><?php echo e($errorMessage); ?></span>
                         <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                                        </div>
											<div class="form-group col-sm-6">
											<label>State<span style="color: red">*</span></label>
                                            <select class="form-control"  name="state" id="state">
												<?php $__currentLoopData = $states; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $state): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			<option value="<?php echo e($state->id); ?>" <?php if($company->state==$state->id): ?> selected <?php endif; ?> ><?php echo e($state->name); ?></option>
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
                                            <input type="text" name="zip_code" class="form-control" id="zip_code" value="<?php echo e($company->zip_code); ?>" required>
											<?php if(Session::has('CompanyErrorMessage')): ?>
                         <?php $__currentLoopData = Session::get('CompanyErrorMessage')->get('ZipCode'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $errorMessage): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <span class="label label-danger"><?php echo e($errorMessage); ?></span>
                         <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                                        </div>
										
										
										
											<div class="form-group col-sm-6">
											<label>Excise Registration<span style="color: red">*</span></label>
                                            <input type="text" name="excise_registration" class="form-control" id="excise_registration" value="<?php echo e($company->excise_registration); ?>" required>
											<?php if(Session::has('CompanyErrorMessage')): ?>
                         <?php $__currentLoopData = Session::get('CompanyErrorMessage')->get('ExciseRegistration'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $errorMessage): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <span class="label label-danger"><?php echo e($errorMessage); ?></span>
                         <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                                        </div>
										
										
										<div class="form-group col-sm-6">
											<label>GST<span style="color: red">*</span></label>
                                            <input type="text" name="gst" class="form-control" id="gst" value="<?php echo e($company->gst); ?>" required>
											<?php if(Session::has('CompanyErrorMessage')): ?>
                         <?php $__currentLoopData = Session::get('CompanyErrorMessage')->get('GST'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $errorMessage): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <span class="label label-danger"><?php echo e($errorMessage); ?></span>
                         <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                                        </div>
										
										<div class="form-group col-sm-6">
											<label>Tin<span style="color: red">*</span></label>
                                            <input type="text" name="tin" class="form-control" id="tin" value="<?php echo e($company->tin); ?>" required>
											<?php if(Session::has('CompanyErrorMessage')): ?>
                         <?php $__currentLoopData = Session::get('CompanyErrorMessage')->get('TIN'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $errorMessage): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <span class="label label-danger"><?php echo e($errorMessage); ?></span>
                         <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                                        </div>	
										
										
										
										
									<div class="form-group col-sm-6">
											<label>Range<span style="color: red">*</span></label>
                                            <input type="text" name="company_range" class="form-control" id="company_range"  value="<?php echo e($company->company_range); ?>" required>
											<?php if(Session::has('CompanyErrorMessage')): ?>
                         <?php $__currentLoopData = Session::get('CompanyErrorMessage')->get('CompanyRange'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $errorMessage): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <span class="label label-danger"><?php echo e($errorMessage); ?></span>
                         <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                                        </div>	


									<div class="form-group col-sm-6">
											<label>Division<span style="color: red">*</span></label>
                                            <input type="text" name="company_division" class="form-control" id="company_division" value="<?php echo e($company->company_division); ?>" required>
											<?php if(Session::has('CompanyErrorMessage')): ?>
                         <?php $__currentLoopData = Session::get('CompanyErrorMessage')->get('CompanyDivision'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $errorMessage): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <span class="label label-danger"><?php echo e($errorMessage); ?></span>
                         <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                                        </div>	
										
										
										

													
										<div class="form-group col-sm-6">
											<label>Website</label>
                                            <input type="text" name="website" class="form-control" id="website" value="<?php echo e($company->website); ?>" >
											<?php if(Session::has('CompanyErrorMessage')): ?>
                         <?php $__currentLoopData = Session::get('CompanyErrorMessage')->get('Website'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $errorMessage): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <span class="label label-danger"><?php echo e($errorMessage); ?></span>
                         <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                                        </div>										
									            
										
										
										
                                       
                                    </div>
                                 
                                     
                                
                                     <div class="form-group row">
                        <div class="form-group form-check col-sm-12 text-center">
                   
                           <button type="submit" class="btn blue">
<i class="fa fa-plus-circle"></i> Update Company</button>
                        </div>
                      </div>
                    </form>
                </div>
                    </div>
                </div>
            </div>
        </div>
		
		
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
                   
					stringLength: {
                        min: 10,
                        max: 10,
                        message: 'Contact Number is not valid'
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
                        regexp: /^([0]{1}[1-9]{1}|[1-2]{1}[0-9]{1}|[3]{1}[0-7]{1})([a-zA-Z]{5}[0-9]{4}[a-zA-Z]{1}[1-9a-zA-Z]{1}[zZ]{1}[0-9a-zA-Z]{1})+$/,
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
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\rao-relays\resources\views/admin/company/edit.blade.php ENDPATH**/ ?>
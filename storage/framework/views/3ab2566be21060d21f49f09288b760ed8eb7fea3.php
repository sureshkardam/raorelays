<?php $__env->startSection('content'); ?>
<div class="breadcumbs-area with-label">
    <ul>
        <li class="title-main">
            <h4>Plant</h4>
        </li>
        <li class="link-home"><a href="#."><i class="fa fa-home"></i></a></li>
        <li class="link-home"><a href="#.">Home</a></li>
        <li class="link-page"><a href="#.">Plant</a></li>
    </ul>
    <div class="create-button">
        <a href="" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-plus"></i> Create Plant</a>
    </div>
</div>
<div class="table-main-div" style="margin-top: 0;">
    <div class="table-header">
        <h2><strong>Plant List</strong></h2>
		<div class="create-button">
        <a href="" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-plus"></i> Create Plant</a>
    </div>
    </div>
    <div class="tableBody">
        <div class="table-responsive">

            <?php echo $__env->make('toast', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <div class="edit-account">
                <table class="table" id="myTable">
                    <thead>
                        <tr>
                                        <th>Plant ID</th>
										<th>Plant Name</th>
										<th>Address</th>
										<th>Contact Number</th>
										<th>Mobile</th>
                                         <th>Status</th>
                                        <th>Created</th>  
                                        <th>Action</th>
                                       
                                    </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $plants; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $plant): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                    <tr>
                                        <td><?php echo e($plant->plant_id); ?></td>
										<td><?php echo e($plant->plant_name); ?></td>
										<td><?php echo e($plant->registered_address); ?></td>
										<td><?php echo e($plant->telephone); ?></td>
										<td><?php echo e($plant->mobile); ?></td>
                                        
                                         <td><?php echo e($plant->status ? 'Enabled' : 'Disabled'); ?></td>
                                       
                                      <td><?php echo e(date('M\. d\, Y', strtotime($plant->created_at))); ?></td>
                           
                            <td width="60px">
          <!-- Edit -->     <a data-toggle="modal" data-target="#exampleModal_<?php echo e($plant->id); ?>">
                            <i class="fa fa-pencil" aria-hidden="true" title="Edit"></i></a>
                                


            <!-- delete   -->  

                         <a onclick="deleteConfirm('plant',<?php echo e($plant->id); ?>,'<?php echo e($plant->name); ?>')"><i class="fa fa-trash" aria-hidden="true" title="Delete"></i></a> 


                        <div class="modal fade" id="exampleModal_<?php echo e($plant->id); ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Edit Plant </h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                </button>
                                            </div>
                                            <div class="modal-body manu-add">
                                                <form action="<?php echo e(route('admin.plant.edit',$plant->id)); ?>" id="popForm" method="post" enctype="multipart/form-data">
                                               
                                                         <input type="hidden" name="_token" id="csrf-token" value="<?php echo e(Session::token()); ?>" />

                                                        
                                                       
													   <div class="form-field-here">
                           
                            <label for="name">Plant ID
                                <span style="color: red">*</span>
                            </label>
                             <?php if(Session::has('EditPlantErrors')): ?>
                                    <?php $__currentLoopData = Session::get('EditPlantErrors')->get('PlantID'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $errorMessage): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                  <span class="label label-danger"><?php echo e($errorMessage); ?></span>
                                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?>
                            <input type="text" name="plant_id" id="plant_id" value="<?php echo e($plant->plant_id); ?>" placeholder="plant id" class="form-control input-md" required>
                        </div>
													   
													   
													   <div class="form-field-here">
                                                            
                                                            <label for="name">Name
                                                                <span style="color: red">*</span>
                                                            </label>

                                                             <?php if(Session::has('EditPlantErrors')): ?>
                                    <?php $__currentLoopData = Session::get('EditPlantErrors')->get('Name'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $errorMessage): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                  <span class="label label-danger"><?php echo e($errorMessage); ?></span>
                                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?>
                                                            <input type="text" name="name" id="title" value="<?php echo e($plant->plant_name); ?>" class="form-control input-md" required>
                                                        </div>
                                                       






<div class="form-field-here">
                           
                            <label for="name">Address
                                <span style="color: red">*</span>
                            </label>
                             <?php if(Session::has('EditPlantErrors')): ?>
                                    <?php $__currentLoopData = Session::get('EditPlantErrors')->get('Address'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $errorMessage): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                  <span class="label label-danger"><?php echo e($errorMessage); ?></span>
                                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?>
                            <input type="text" name="registered_address" id="registered_address" value="<?php echo e($plant->registered_address); ?>" class="form-control input-md" required>
                        </div>
						
						
						<div class="form-field-here">
                           
                            <label for="name">Contact Number
                                <span style="color: red">*</span>
                            </label>
                             <?php if(Session::has('EditPlantErrors')): ?>
                                    <?php $__currentLoopData = Session::get('EditPlantErrors')->get('ContactNumber'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $errorMessage): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                  <span class="label label-danger"><?php echo e($errorMessage); ?></span>
                                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?>
                            <input type="text" name="telephone"  id="edit-telephone" value="<?php echo e($plant->telephone); ?>" class="form-control input-md" required>
                        </div>
						
						
						<div class="form-field-here">
                           
                            <label for="name">Mobile
                                <span style="color: red">*</span>
                            </label>
                             <?php if(Session::has('EditPlantErrors')): ?>
                                    <?php $__currentLoopData = Session::get('EditPlantErrors')->get('Mobile'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $errorMessage): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                  <span class="label label-danger"><?php echo e($errorMessage); ?></span>
                                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?>
                            <input type="text" name="mobile" id="edit-mobile" value="<?php echo e($plant->mobile); ?>" class="form-control input-md" required>
                        </div>
						
	   
                                                        
                                                        <div class="form-field-here">
                                                            <label for="status">Status :</label>
                                                            <select class="custom-select form-control" name="status" id="edit_status">
                                                                <option value="1" <?php if($plant->status==1): ?>selected <?php endif; ?>>Enabled</option>
                                                                <option value="0" <?php if($plant->status==0): ?>selected <?php endif; ?>>Disabled</option>
																
																 <option value="2" <?php if($plant->status==2): ?>selected <?php endif; ?>>Archived</option>
																
																
                                                            </select>
                                                        </div>
                       
                                                    </div>

                                                    <div class="modal-footer">
                                                
                                                     
                                                        <button type="submit" class="btn blue">Update</button>
														
														<button type="button" class="btn blue" data-dismiss="modal">Close</button>
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
                <h5 class="modal-title" id="exampleModalLabel">Create Plant</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <div class="modal-body manu-add">
                <form action="<?php echo e(route('admin.plant.create')); ?>" id="popForm" class="plant-form" method="post" >
                    <?php echo csrf_field(); ?>
                    <div class="popper-box">
                        
                        
                        
						 <div class="form-field-here">
                           
                            <label for="name">Plant ID
                                <span style="color: red">*</span>
                            </label>
                             <?php if(Session::has('CreatePlantErrors')): ?>
                                    <?php $__currentLoopData = Session::get('CreatePlantErrors')->get('PlantId'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $errorMessage): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                  <span class="label label-danger"><?php echo e($errorMessage); ?></span>
                                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?>
                            <input type="text" name="plant_id" id="plant_id" value="<?php echo e(old('plant_id')); ?>" placeholder="plant id" class="form-control input-md" required>
                        </div>
						
						<div class="form-field-here">
                           
                            <label for="name">Name
                                <span style="color: red">*</span>
                            </label>
                             <?php if(Session::has('CreatePlantErrors')): ?>
                                    <?php $__currentLoopData = Session::get('CreatePlantErrors')->get('Name'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $errorMessage): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                  <span class="label label-danger"><?php echo e($errorMessage); ?></span>
                                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?>
                            <input type="text" name="name" id="name" value="<?php echo e(old('name')); ?>" placeholder="Enter Your Name" class="form-control input-md" required>
                        </div>
						
						
						<div class="form-field-here">
                           
                            <label for="name">Address
                                <span style="color: red">*</span>
                            </label>
                             <?php if(Session::has('CreatePlantErrors')): ?>
                                    <?php $__currentLoopData = Session::get('CreatePlantErrors')->get('RegisteredAddress'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $errorMessage): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                  <span class="label label-danger"><?php echo e($errorMessage); ?></span>
                                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?>
                            <input type="text" name="registered_address" id="registered_address" value="<?php echo e(old('registered_address')); ?>" placeholder="address" class="form-control input-md" required>
                        </div>
						
						
						<div class="form-field-here">
                           
                            <label for="name">Contact Number
                                <span style="color: red">*</span>
                            </label>
                             <?php if(Session::has('CreatePlantErrors')): ?>
                                    <?php $__currentLoopData = Session::get('CreatePlantErrors')->get('ContactNumber'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $errorMessage): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                  <span class="label label-danger"><?php echo e($errorMessage); ?></span>
                                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?>
                            <input type="text" name="telephone" id="telephone" value="<?php echo e(old('telephone')); ?>" placeholder="Contact Number" class="form-control input-md" required>
                        </div>
						
						
						<div class="form-field-here">
                           
                            <label for="name">Mobile
                                <span style="color: red">*</span>
                            </label>
                             <?php if(Session::has('CreatePlantErrors')): ?>
                                    <?php $__currentLoopData = Session::get('CreatePlantErrors')->get('Mobile'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $errorMessage): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                  <span class="label label-danger"><?php echo e($errorMessage); ?></span>
                                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?>
                            <input type="text" name="mobile" id="mobile" value="<?php echo e(old('mobile')); ?>" placeholder="Mobile" class="form-control input-md" required>
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
                        
						<button type="submit" class="btn blue">Save</button>
						
						<button type="button" class="btn blue" data-dismiss="modal">Close</button>
                 
                        
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php if(Session::has('CreatePlantErrors')): ?>
   <script>
   $("#exampleModal").modal('show');
   $("#exampleModal").addClass('in').css('display','block');
   
	</script>
<?php endif; ?>


                                                   

                   
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\raorelays\resources\views/admin/company/plant.blade.php ENDPATH**/ ?>
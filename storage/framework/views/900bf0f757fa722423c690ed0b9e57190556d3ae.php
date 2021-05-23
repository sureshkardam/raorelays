<?php $__env->startSection('content'); ?>



    <div class="breadcumbs-area">
        <ul>
            <li class="title-main">
                <h4>Create Product Main Category</h4>
            </li>
            <li class="link-home"><a href="#."><i class="fa fa-home"></i></a></li>
            <li class="link-home"><a href="#.">Home</a></li>
            <li class="link-page"><a href="#.">Create Product Main Category</a></li>
        </ul>
        <!-- <div class="create-button">
                        <a title="Add New" href="#."><i class="fa fa-plus"></i></a>
                    </div> -->
    </div>
    <div class="content-main-here">
        <div class="table-main-div" style="margin-top: 0px;">
            <div class=" table-header ">
                <h2><strong>Create Product Main Category</strong> </h2>
            </div>
           <?php echo $__env->make('toast', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <div class="form-default create-category-page">
                <form action="<?php echo e(route('admin.category.create')); ?>" id="popForm" enctype="multipart/form-data" method="post">
                    <?php echo csrf_field(); ?>
                    <div>
                        
                        <div class="form-group row">
                            <div class="form-group col-sm-6">

                                <?php if(Session::has('CategoryCreateErrors')): ?>
                                    <?php $__currentLoopData = Session::get('CategoryCreateErrors')->get('Name'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $errorMessage): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <span class="label label-danger"><?php echo e($errorMessage); ?></span>
                                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?>
                                <label class="input-label">Name<span style="color: red">*</span></label>
                                <input type="text" class="form-control" value="<?php echo e(old('name')); ?>" name="name" required>
                            </div>
							
							
							<div class="form-group col-sm-6">

                                <?php if(Session::has('CategoryCreateErrors')): ?>
                                    <?php $__currentLoopData = Session::get('CategoryCreateErrors')->get('Code'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $errorMessage): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <span class="label label-danger"><?php echo e($errorMessage); ?></span>
                                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?>
                                <label class="input-label">Code<span style="color: red">*</span></label>
                                <input type="text" class="form-control" value="<?php echo e(old('code')); ?>" name="code" required>
                            </div>
                            
                       
                            <div class="form-group col-sm-12">
                                 <?php if(Session::has('CategoryCreateErrors')): ?>
                                    <?php $__currentLoopData = Session::get('CategoryCreateErrors')->get('Description'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $errorMessage): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <span class="label label-danger"><?php echo e($errorMessage); ?></span>
                                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?>
                                <label class="input-label">Description<span style="color: red">*</span></label>
                               <input type="text" class="form-control" value="<?php echo e(old('description')); ?>" name="description" required>
                            </div>
                        </div>
                     
							
							 <div class="form-group row">
							
							
							
							
							<div class="form-group col-sm-6">
                                <label class="input-label">Status</label>
                                <select name="status" class="form-control">
                                    <option value="1">Enabled</option>
                                    <option value="0">Disabled</option>
									<option value="2">Archived</option>
                                </select>
                            </div>
							 
							 </div>
                                              
                                            

                        <div class="form-group row">
                            <div class="form-group form-check col-sm-12 text-center">
                               
                                <button type="submit" class="btn blue">
<i class="fa fa-plus-circle"></i> Create Product Main Category</button>
                            </div>
                        </div>
                </form>
            </div>
        </div>
    </div>




<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\raorelays\resources\views/admin/category/create.blade.php ENDPATH**/ ?>
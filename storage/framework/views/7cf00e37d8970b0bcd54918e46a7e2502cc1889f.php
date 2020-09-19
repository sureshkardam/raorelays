 
<?php $__env->startSection('content'); ?>
 

                <div class="breadcumbs-area">
                    <ul>
                        <li class="title-main">
                            <h4>Edit Material Category</h4>
                        </li>
                        <li class="link-home"><a href="#."><i class="fa fa-home"></i></a></li>
                        <li class="link-home"><a href="#.">Home</a></li>
                        <li class="link-page"><a href="#.">Edit Material Category</a></li>
                    </ul>
                    <!-- <div class="create-button">
                        <a title="Add New" href="#."><i class="fa fa-plus"></i></a>
                    </div> -->
                </div>
                <div class="content-main-here">
                    <div class="table-main-div" style="margin-top: 0px;">
                        <div class=" table-header ">
                            <h2><strong>Edit Material Category</strong> </h2>
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
                      <form action="<?php echo e(route('admin.material.category.edit',['id'=>$category_data->id])); ?>" id="popForm" method="post" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                   

                        
						
						
						
						
                       
                        <div class="form-group row">

                        <div class="form-group col-sm-6">
						                  <?php if(Session::has('CategoryeditErrors')): ?>
                                    <?php $__currentLoopData = Session::get('CategoryeditErrors')->get('Name'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $errorMessage): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                  <span class="label label-danger"><?php echo e($errorMessage); ?></span>
                                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?>
                                <label class="input-label">Name</label>
                                <input type="text" class="form-control" name="name" value="<?php echo e($category_data->name); ?>" required>
                            </div>

                     
                               
                        </div>

                           


                            <div class="form-group row">
                         
                            
                               


                      
                 
                        </div>
                 

                      
                 
                         <div class="form-group row">
                         <div class="form-group col-sm-12">
                            
                                <label class="input-label">Parent Category</label>
                                <select name="parent_id" class="form-control" required>
                                    <option value="0">Select Parent Category</option>
                                    <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    
                                    <option value="<?php echo e($category->category_id); ?>" <?php if($category_data->parent_id==$category->category_id): ?> selected <?php endif; ?>><?php echo e($category->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    
                                </select>
                                
                            </div>
                        </div>
                     
                 
                           <div class="form-group row">
                        <div class="form-group col-sm-12">
                             <?php if(Session::has('CategoryeditErrors')): ?>
                                    <?php $__currentLoopData = Session::get('CategoryeditErrors')->get('Description'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $errorMessage): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                  <span class="label label-danger"><?php echo e($errorMessage); ?></span>
                                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?>
                            <label for="first name" style="top:-20px" class="hello">Description
                           <span style="color: red">*</span>
                            </label>
                           <!--  <input type="text" class="form-control" id="description" value="<?php echo e($category_data->description); ?>" 
                                name="description" placeholder=""> -->
                                <textarea rows="4" cols="50" class="form-control" name="description"><?php echo e($category_data->description); ?></textarea required>
                               

                        </div>
                        </div>

						
						
						
						 <div class="form-group row">

                         <div class="form-group col-sm-6">
                                        
                                <label class="input-label">Sort Order<span style="color: red">*</span></label>
                                <input type="text" class="form-control" value="<?php echo e($category_data->sort_order); ?>" name="sort_order">
                            </div>
						 <div class="form-group col-sm-6">
                     
                                <label class="input-label">Status</label>
                                <select name="status" class="form-control">
                                    <?php if($category_data->status==1): ?>
                                    <option <?php if($category_data->status == 1): ?> selected <?php endif; ?> value="1" >Active</option>
                                    <option <?php if($category_data->status == 0): ?> selected <?php endif; ?> value="0">Inactive</option>
                                    <?php else: ?>
                                        
                                    <?php endif; ?>
                                </select>
                                
                            </div>
						
						</div>
						
						
						
                      <div class="form-group row">

                        <div class="col-sm-12">
                            <div class="form-group form-check col-sm-12 text-center">
                         
                           <button type="submit" class="btn blue">Update Material Category</button>
                        </div>
                        </div>
						</div>


                            

                    
                     </form>
                </div>
            </div>
     

<script type="text/javascript"></script>
 <script src="https://cdn.ckeditor.com/4.12.1/standard/ckeditor.js"></script>
                            <script>
                        CKEDITOR.replace( 'description' );
                </script>    


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\rao-relays\resources\views/admin/material-category/edit.blade.php ENDPATH**/ ?>
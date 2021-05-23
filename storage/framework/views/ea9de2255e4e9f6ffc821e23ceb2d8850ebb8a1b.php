 <?php $__env->startSection('content'); ?>

<div class="breadcumbs-area">
    <ul>
        <li class="title-main">
            <h4>Create Product</h4>
        </li>
        <li class="link-home"><a href="#."><i class="fa fa-home"></i></a></li>
        <li class="link-home"><a href="#.">Home</a></li>
        <li class="link-page"><a href="#.">Create Product</a></li>
    </ul>
</div>
<div class="content-main-here">
    <div class="table-main-div" style="margin-top: 0px;">
        <div class=" table-header ">
            <h2><strong>Create Product</strong> </h2>
        </div>
        <?php echo $__env->make('toast', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>



<?php if($errors->has('file.*')): ?>
    <span class="help-block">
        <strong><?php echo e($errors->first('file')); ?></strong>
    </span>
<?php endif; ?>
      
        <div class="form-default ">
            <form class="add-patient-form" method="post" action="<?php echo e(route('admin.product.create')); ?>" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <div class="tab-content">
                    <!-- General Part -->
                    <div id="general" class="tab-pane fade in active">
                        <div class="form-group row">

                           

                   
                            <div class="form-group col-sm-6">

                                <?php if(Session::has('ProductcreateErrors')): ?> <?php $__currentLoopData = Session::get('ProductcreateErrors')->get('Name'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $errorMessage): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <span class="label label-danger"><?php echo e($errorMessage); ?></span> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> <?php endif; ?>

                                <label for="first name" class="hello">Product Name
                                        <span style="color: red">*</span>
                                    </label>
                                <!-- Product Name -->
                                <input type="text" name="name" class="form-control" value="<?php echo e(old('name')); ?>" id="name" placeholder="Product Name" required>
                            </div>

                            <div class="form-group col-sm-6">
                                <?php if(Session::has('ProductcreateErrors')): ?> <?php $__currentLoopData = Session::get('ProductcreateErrors')->get('Code'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $errorMessage): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <span class="label label-danger"><?php echo e($errorMessage); ?></span> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> <?php endif; ?>
                                <label for="first name" class="hello">Product Code
                                        <span style="color: red">*</span>
                                    </label>
                                <!-- SKU -->
                                <input type="text" name="code" class="form-control" id="code" value="<?php echo e(old('code')); ?>" placeholder="Code" required>
                            </div>
                           
							
							
							    <div class="form-group col-sm-12">
                                <?php if(Session::has('ProducteditErrors')): ?> <?php $__currentLoopData = Session::get('ProducteditErrors')->get('Description'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $errorMessage): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <span class="label label-danger"><?php echo e($errorMessage); ?></span> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> <?php endif; ?>
                                <label class="input-label">Description<span style="color: red">*</span></label>
                                
								
								 <input type="text" name="description" class="form-control" value="<?php echo e(old('description')); ?>"  placeholder="Description">
								
								
                            </div>
							
							 <div class="form-group col-sm-6">
                                <?php if(Session::has('ProductcreateErrors')): ?> <?php $__currentLoopData = Session::get('ProductcreateErrors')->get('Categories'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $errorMessage): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <span class="label label-danger"><?php echo e($errorMessage); ?></span> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> <?php endif; ?>

                                <label for="category" class="category">Select Category
                                        <span style="color: red">*</span>
                                    </label>
                                <select class="form-control select-form" name="category_id[]" required>
                                        <option value="">Select Parent or leave blank for root category</option>
										<?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($category->category_id); ?>"><?php echo e($category->name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                            </div>
                          
                        
                     
                            <div class="form-group col-sm-6">
                                <!-- Status --><label for="first name" class="hello">Status
                                        <span style="color: red">*</span>
                                    </label>
                                <select class="form-control" name="status">
                                        <option value="1" selected>Enabled</option>
                                        <option value="0">Disabled</option>
										 <option value="2">Archived</option>
                                    </select>
                            </div>
                        </div>
                    </div>
               
                </div>
                <div class="form-field-here text-center" style="margin-top: 20px">
                   
                    <button type="submit" class="btn blue">
<i class="fa fa-plus-circle"></i> Save Product</button>
                </div>
            </form>
        </div>
    </div>
	</div>
	</div>

    <script type="text/javascript">
        $(".addjobAtt").click(function() {
            var $clone = $('table.tbllAtt tr.clonemeAtt:first').clone();
            console.log($clone);
            // $clone.append("<td><div class='rmv-clone' >Remove</div></td>");
            $('table.tbllAtt').append($clone);
        });

        $('.tbllAtt').on('click', '.rmv-cloneAtt', function() {
            // alert("Are You Sure?");

            cloneIndex = $(".clonemeAtt").length;

            if (cloneIndex > 1) {


                $(this).closest('tr').remove();
            } else

            {

                alert('At Least one block is required');
            }

            e.preventDefault();
            return false;
        });
    </script>
    <script type="text/javascript">
        $(".addjobOption").click(function() {
            var $clone = $('table.tbllOption tr.clonemeOption:first').clone();
            console.log($clone);
            // $clone.append("<td><div class='rmv-clone' >Remove</div></td>");
            $('table.tbllOption').append($clone);
        });

        $('.tbllOption').on('click', '.rmv-cloneOption', function() {
            // alert("Are You Sure?");

            cloneIndex = $(".clonemeOption").length;

            if (cloneIndex > 1) {


                $(this).closest('tr').remove();
            } else

            {

                alert('At Least one block is required');
            }

            e.preventDefault();
            return false;
        });
    </script>
    <script type="text/javascript">
        $('.tbllOption').on('change', '.option_list', function() {
            var optionID = $(this).val();
            var relTd = $(this).closest('td').next('td');
            if (optionID) {
                $.ajax({
                    type: "GET",
                    url: "<?php echo e(route('admin.get.option.value')); ?>?option_id=" + optionID,
                    success: function(data) {

                        $(relTd).find(".dynamic_option_value").empty();
                        $.each(data, function(key, value) {

                            $(relTd).find(".dynamic_option_value").append('<option value="' + value.id + '">' + value.name + '</option>');
                        });

                    }
                });
            } else {
                $(relTd).find(".dynamic_option_value").empty();

            }
        });
    </script>




    <script type="text/javascript"></script>
    <script src="https://cdn.ckeditor.com/4.12.1/standard/ckeditor.js"></script>
    <!--<script>
        CKEDITOR.replace('description');
    </script>-->
   
  
    <?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\raorelays\resources\views/admin/product/create.blade.php ENDPATH**/ ?>
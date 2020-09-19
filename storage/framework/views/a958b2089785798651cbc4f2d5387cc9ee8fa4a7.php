 <?php $__env->startSection('content'); ?>

<div class="breadcumbs-area">
    <ul>
        <li class="title-main">
            <h4>Create Material Product</h4>
        </li>
        <li class="link-home"><a href="#."><i class="fa fa-home"></i></a></li>
        <li class="link-home"><a href="#.">Home</a></li>
        <li class="link-page"><a href="#.">Create Material Product</a></li>
    </ul>
</div>
<div class="content-main-here">
    <div class="table-main-div" style="margin-top: 0px;">
        <div class=" table-header ">
            <h2><strong>Create Material Product</strong> </h2>
        </div>
        <?php echo $__env->make('toast', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>



<?php if($errors->has('file.*')): ?>
    <span class="help-block">
        <strong><?php echo e($errors->first('file')); ?></strong>
    </span>
<?php endif; ?>
        <div class="form-group row">
            <div class="form-group col-sm-12">
                <ul class="nav nav-tabs">
                    <li class="active"><a data-toggle="tab" href="#general">General</a></li>
                    <li><a data-toggle="tab" href="#option">Option</a></li>
                    
                </ul>
            </div>
        </div>
        <div class="form-default ">
            <form class="add-patient-form" method="post" action="<?php echo e(route('admin.material.product.create')); ?>" enctype="multipart/form-data">
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
                                  <label for="minimum_purchase" class="hello">Minimum Quantity
                                   <span style="color: red">*</span>
								   </label>
                               
                                <input type="text" name="minimum_purchase" class="form-control" value="<?php echo e(old('minimum_purchase')); ?>" id="name" placeholder="Minimum Quantity" required>
                            </div>


                            <div class="form-group col-sm-6">
                                <?php if(Session::has('ProductcreateErrors')): ?> <?php $__currentLoopData = Session::get('ProductcreateErrors')->get('Quantity'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $errorMessage): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <span class="label label-danger"><?php echo e($errorMessage); ?></span> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> <?php endif; ?>
                                <label for="quantity" class="hello">Quantity
                                        <span style="color: red">*</span>
                                    </label>
                                <!-- Quantity -->
                                <input type="text" name="quantity" class="form-control" value="<?php echo e(old('quantity')); ?>" id="name" placeholder="Quantity" required>
                            </div>
               
                            <div class="form-group col-sm-6">

                                <label for="tax_rate" class="hello">Tax Rate
                                    <span style="color: red">*</span>    
                                    </label> 
                                <!-- Dimension (L X W X H) -->
                                <input type="text" name="tax_rate" class="form-control" value="<?php echo e(old('tax_rate')); ?>" placeholder="Tax Rate" required>
                            </div>
                            <div class="form-group col-sm-6">

                                <label for="hsn_code" class="hello">HSN Code
                                     <span style="color: red">*</span>   
                                    </label> 
                                <!-- Dimension (L X W X H) -->
                                <input type="text" name="hsn_code" class="form-control" value="<?php echo e(old('hsn_code')); ?>" placeholder="HSN Code" required>
                            </div>


                   
                            <div class="form-group col-sm-6">

                                <label for="weight" class="hello">Weight
                                      <span style="color: red">*</span>  
                                    </label>
                               
                                <?php if(Session::has('ProductcreateErrors')): ?> <?php $__currentLoopData = Session::get('ProductcreateErrors')->get('Weight'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $errorMessage): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <span class="label label-danger"><?php echo e($errorMessage); ?></span> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> <?php endif; ?>
                                <input type="text" name="weight" class="form-control" value="<?php echo e(old('weight')); ?>" placeholder="" required>
                            </div>
                       
                            <div class="form-group col-sm-6">
                                <?php if(Session::has('ProductcreateErrors')): ?> <?php $__currentLoopData = Session::get('ProductcreateErrors')->get('Sku'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $errorMessage): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <span class="label label-danger"><?php echo e($errorMessage); ?></span> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> <?php endif; ?>
                                <label for="first name" class="hello">SKU
                                        <span style="color: red">*</span>
                                    </label>
                                <!-- SKU -->
                                <input type="text" name="sku" class="form-control" id="name" value="<?php echo e(old('sku')); ?>" placeholder="SKU" required>
                            </div>
                            <div class="form-group col-sm-6">


                                <label for="first name" class="hello">Sort Order
                                       
                                    </label>
                                <!-- Sort Order -->
                                <input type="text" name="sort_order" class="form-control" value="<?php echo e(old('sort_order')); ?>" id="name" placeholder="Sort Order">
                            </div>
               
                            <div class="form-group col-sm-12">
                                <?php if(Session::has('ProductcreateErrors')): ?> <?php $__currentLoopData = Session::get('ProductcreateErrors')->get('Categories'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $errorMessage): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <span class="label label-danger"><?php echo e($errorMessage); ?></span> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> <?php endif; ?>

                                <label for="first name" class="hello">Category
                                        <span style="color: red">*</span>
                                    </label>
                                <select class="form-control for-multiple select-form" name="category_id[]" multiple required>
                                        <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($category->category_id); ?>"><?php echo e($category->name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                            </div>
          
                            <div class="form-group col-sm-12">
                                <?php if(Session::has('ProducteditErrors')): ?> <?php $__currentLoopData = Session::get('ProducteditErrors')->get('Description'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $errorMessage): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <span class="label label-danger"><?php echo e($errorMessage); ?></span> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> <?php endif; ?>
                                <label class="input-label">Description<span style="color: red">*</span></label>
                                <textarea rows="4" id="description" cols="50" class="form-control" name="description" required><?php echo e(old('description')); ?></textarea>
                            </div>
                     
                            <div class="form-group col-sm-12">
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
                    <!-- //option Start Here -->
                    <div id="option" class="tab-pane fade">
                        <div class="option-section">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="table option">
                                        <table class="tbllOption table table-bordered">
                                            <thead>
                                                <th>Select Option<span style="color: red"> *</span></th>
                                                <th>Select Option values<span style="color: red"> *</span></th>
                                                <th> </th>
                                            </thead>
                                            <tbody>
                                                <tr class="clonemeOption">
                                                    <td class="attribute-box">
                                                        <div class="input-attribute">
                                                            <select name="option[]" class="option_list">
                                                                    <option value="">Select Option</option>
                                                                    <?php $__currentLoopData = $options; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $option): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                    <option value="<?php echo e($option->id); ?>"><?php echo e($option->name); ?></option>
                                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                </select>
                                                        </div>
                                                    </td>
                                                    <td class="test">

                                                        <div class="select-value-table">
                                                            <select name="option_value[]" class="dynamic_option_value">
                                                                <option value="">Select Value</option>
                                                                <option value="1">red</option>
                                                                <option value="2">blue</option>
                                                            </select>
                                                        </div>

                                                    </td>
                                                    <td align="right">
                                                        <div class="minus-btn-table">
                                                            <div class="rmv-cloneOption">-</div>
                                                        </div>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <table class="table table-bordered" style="margin-top: -20px; border-top: none;">
                                            <tbody>
                                                <tr align="right">
                                                    <td style="border-top: none;">
                                                        <div class="plus-btn-table">
                                                            <div class="addjobOption">+</div>
                                                        </div>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            






                </div>
                <div class="form-field-here text-center" style="margin-top: 20px">
                   
                    <button type="submit" class="btn blue">
<i class="fa fa-plus-circle"></i> Save Material Product</button>
                </div>
            </form>
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
                    url: "<?php echo e(route('admin.material.get.option.value')); ?>?option_id=" + optionID,
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
    <script>
        CKEDITOR.replace('description');
    </script>
   
  
    <?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\rao-relays\resources\views/admin/material-product/create.blade.php ENDPATH**/ ?>
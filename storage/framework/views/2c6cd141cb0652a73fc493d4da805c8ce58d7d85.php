 <?php $__env->startSection('content'); ?>


<div class="breadcumbs-area">
    <ul>
        <li class="title-main">
            <h4>Edit Product</h4>
        </li>
        <li class="link-home"><a href="#."><i class="fa fa-home"></i></a></li>
        <li class="link-home"><a href="#.">Home</a></li>
        <li class="link-page"><a href="#.">Edit Product</a></li>
    </ul>
    <!-- <div class="create-button">
                        <a title="Add New" href="#."><i class="fa fa-plus"></i></a>
                    </div> -->
</div>
<div class="content-main-here">
    <div class="table-main-div" style="margin-top: 0px;">
        <div class=" table-header ">
            <h2><strong>Edit Product</strong> </h2>
        </div>

        <?php if($message = Session::get('success')): ?>

            <div class="alert alert-success alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <strong><?php echo e($message); ?></strong>
            </div>
            <?php endif; ?>
            <?php if($message = Session::get('error')): ?>
            <div class="alert alert-danger alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <strong><?php echo e($message); ?></strong>
            </div>
            <?php endif; ?>




            

<?php if($errors->any()): ?>
    <div class="alert alert-danger">
     
            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li><?php echo e($error); ?></li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
       
    </div>
<?php endif; ?>


        <div class="form-group row">
            <div class="form-group col-sm-12">
                <ul class="nav nav-tabs">
                    <li class="active"><a data-toggle="tab" href="#general">Main</a></li>
                    <li><a data-toggle="tab" href="#option">Sub Product</a></li>
                   
                </ul>
            </div>
        </div>
        <div class="form-default ">
            <form action="" id="popForm" method="post" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <div class="tab-content">
                    <!-- General Part -->
                           <div id="general" class="tab-pane fade in active">
                        <div class="form-group row">

                           

                   
                            <div class="form-group col-sm-12">

                                <?php if(Session::has('ProductcreateErrors')): ?> <?php $__currentLoopData = Session::get('ProductcreateErrors')->get('Name'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $errorMessage): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <span class="label label-danger"><?php echo e($errorMessage); ?></span> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> <?php endif; ?>

                                <label for="first name" class="hello">Product Name
                                        <span style="color: red">*</span>
                                    </label>
                                <!-- Product Name -->
                                <input type="text" name="name" class="form-control" value="<?php echo e($product->name); ?>" id="name" placeholder="Product Name" required>
                            </div>

                            

							
							


               
                         
                            <div class="form-group col-sm-6">

                                <label for="hsn_code" class="hello">HSN Code
                                     <span style="color: red">*</span>   
                                    </label> 
                                <!-- Dimension (L X W X H) -->
                                <input type="text" name="hsn_code" class="form-control" value="<?php echo e($product->hsn_code); ?>" placeholder="HSN Code" required>
                            </div>


                   
                          
                            <div class="form-group col-sm-6">
                                <?php if(Session::has('ProductcreateErrors')): ?> <?php $__currentLoopData = Session::get('ProductcreateErrors')->get('Sku'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $errorMessage): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <span class="label label-danger"><?php echo e($errorMessage); ?></span> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> <?php endif; ?>
                                <label for="first name" class="hello">Product Code
                                        <span style="color: red">*</span>
                                    </label>
                                <!-- SKU -->
                                <input type="text" name="sku" class="form-control" id="name" value="<?php echo e($product->sku); ?>" placeholder="SKU" required>
                            </div>
                          
							
							
							 <div class="form-group col-sm-12">
                                <?php if(Session::has('ProducteditErrors')): ?> <?php $__currentLoopData = Session::get('ProducteditErrors')->get('Description'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $errorMessage): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <span class="label label-danger"><?php echo e($errorMessage); ?></span> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> <?php endif; ?>
                                <label class="input-label">Description<span style="color: red">*</span></label>
                                <input type="text" name="description" class="form-control" value="<?php echo e($product->description); ?>" >
                            </div>
							
							
                         
                           
                     
                            <div class="form-group col-sm-6">
                                <!-- Status --><label for="first name" class="hello">Status
                                        <span style="color: red">*</span>
                                    </label>
                               <select name="status" class="form-control select-form">
                                        <option <?php if($product->status == 1): ?> selected <?php endif; ?> value="1">Enable</option>
                                        <option <?php if($product->status == 0): ?> selected <?php endif; ?> value="0">Disable</option>
										
										<option <?php if($product->status == 2): ?> selected <?php endif; ?> value="2">Archive</option>
                                    </select>
                            </div>
                        </div>
                    </div>
                    <!-- option editing starting here -->
                    <div id="option" class="tab-pane fade">
                        <div class="option-section">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="table option">
                                        <?php if($product->getSubProducts->count() > '0'): ?>
                                        <table class="tbllOption table table-bordered has-option">
                                            <thead>
                                               <th>Product Code<span style="color: red"> *</span></th>
											   <th>Unit of Quantity<span style="color: red"> *</span></th>
                                                <th>Description<span style="color: red"> *</span></th>
                                                <th> </th>
                                            </thead>
                                            <tbody>
                                                <?php $__currentLoopData = $product->getSubProducts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sub): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <tr class="clonemeOption">
                                                    <td class="attribute-box">
                                                        <div class="input-attribute">
                                                           <input type="text" name="sub_product_code[]" value="<?php echo e($sub->code); ?>" required />  
                                                        </div>
                                                    </td>
													
													 <td class="attribute-box">
                                                        <div class="input-attribute">
                                                           <input type="text" name="sub_product_quantity[]" value="<?php echo e($sub->quantity); ?>" required />  
                                                        </div>
                                                    </td>
													
													
													
													
													
                                                    <td class="test">


                                                        <div class="select-value-table">
                                                       <input type="text" name="sub_product_description[]" value="<?php echo e($sub->description); ?>" required />     
                                                        </div>
                                                    </td>



                                                    </td>
                                                    <td align="right">
                                                        <div class="minus-btn-table">
                                                            <div class="rmv-cloneOption">-</div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </tbody>
                                        </table>
                                        <?php else: ?>
                                        <table class="tbllOption table table-bordered no-option">
                                            <thead>
                                                <th>Select Option</th>
                                                <th>Select option values</th>
                                                <th> </th>
                                            </thead>
                                            <tbody>
                                                <tr class="clonemeOption">
                                                    <td class="attribute-box">
                                                        <div class="input-attribute">
                                                            <select name="option[]" class="option_list">
                                                                    <?php $__currentLoopData = $options; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $option): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                    <option value="<?php echo e($option->id); ?>"><?php echo e($option->name); ?></option>
                                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                </select>
                                                        </div>
                                                    </td>
                                                    <td class="test">
                                                        <div class="table-textarea">
                                                            <!-- change -->
                                                            <table class="table table-bordered">
                                                                <thead>
                                                                    <tr>
                                                                        <th>Value</th>

                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <tr>
                                                                        <td width="120px">
                                                                            <div class="select-value-table">
                                                                                <select name="option_value[]" class="dynamic_option_value">
                                                                                        <option value="">Select Value</option>
                                                                                    </select>
                                                                            </div>
                                                                        </td>

                                                                    </tr>
                                                                </tbody>
                                                            </table>
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
                                        <?php endif; ?>
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
      

                    <section class="submit">
                        <div class="text-center">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-field-here text-center" style="margin-top: 20px">
                                    
                                        <button type="submit" class="btn blue">Update Product</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
            </form>
            </div>
        </div>
    </div>
    
    <!-- <script src="https://code.jquery.com/jquery-3.4.1.min.js" ></script> -->
    
     <script type="text/javascript"></script>
    <script src="https://cdn.ckeditor.com/4.12.1/standard/ckeditor.js"></script>
   <!-- <script>
        CKEDITOR.replace('description');
    </script>-->
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

    <script>
        function editreadURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    $(input).prev('img').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }


        $("#banner-icon").change(function() {
            editreadURL(this);
        });
    </script>

    <style type="text/css">
        .store-logo.manufac {
            position: relative;
        }
        
        .form-field-here input.edit-manufacture-icon {
            position: absolute;
            height: 30px;
            width: 30px;
            border-radius: 50%;
            bottom: 5px;
            left: 5px;
            cursor: pointer;
        }
        
        .form-field-here input.edit-manufacture-icon:focus {
            outline: none;
        }
        
        .form-field-here input.edit-manufacture-icon:before {
            content: "";
            background: green;
            position: absolute;
            height: 100%;
            width: 100%;
            top: 0;
        }
        
        .form-field-here input.edit-manufacture-icon:after {
            content: "\f040";
            font-family: FontAwesome;
            color: #fff;
            top: 0;
            left: 0;
            position: absolute;
            line-height: 30px;
            text-align: center;
            width: 100%;
        }
    </style>

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
    <?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\rao-relays\resources\views/admin/product/edit.blade.php ENDPATH**/ ?>
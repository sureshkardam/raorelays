 <?php $__env->startSection('content'); ?>




<div class="breadcumbs-area">
    <ul>
        <li class="title-main">
            <h4>Create Raw Material</h4>
        </li>
        <li class="link-home"><a href="#."><i class="fa fa-home"></i></a></li>
        <li class="link-home"><a href="#.">Home</a></li>
        <li class="link-page"><a href="#.">Create Raw Material</a></li>
    </ul>
   
</div>


<div class="content-main-here">


 

    <div class="table-main-div">
        <div class="table-header">
            <h2><strong>Create Raw Material</strong></h2>
			 <?php echo $__env->make('toast', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
        
		
		<form class="add-patient-form" method="post" action="<?php echo e(route('admin.material.product.create')); ?>" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
		
		<div class="tableBody">
            <div class="table-responsive">
      
				 <div class="option-section admin-area-here">
	                        <div class="row">
	                            <div class="col-sm-12">
	                                <div class="table option product-add">
	                                    
	                                    <div id="inputtext">
	                                    </div>
	                                    <button class="addBtn" type="button"><i class="fa fa-plus"></i> Add</button>
	                                </div>
	                            </div>
	                        </div>
	                    </div>
				 
            </div>
        </div>
		  <div class="form-field-here text-center" style="margin-top: 20px">
                   
                    <button id="save_purchase" type="submit" class="btn blue">
<i class="fa fa-plus-circle"></i> Create Raw Material</button>
                </div>
				
		</form>		
				
		
				
    </div>
	
</div>	

<script type="text/javascript">
$(document).ready(function() {
    var count = 1;
    $("button.addBtn").click(function() {
		//$(document).on('click', 'button.addBtn', function() {  
		
        $("#inputtext").append("<div class='dynamic'><div class='row'><div class='col-sm-3 first'><input type='text' placeholder='name' name='name[]' required  /></div><div class='col-sm-3'><input type='text' placeholder='quantity' name='qty[]' required  /></div><div class='col-sm-3'><select class='unit form-control' id='unit-"+count+"' name='unit[]' required><option value='0'>Select Unit</option><option value='1'>Meter</option><option value='2'>Gram</option>	</select></div><div class='col-sm-1 last'><button class='removeArea' type='button'>Remove</button></div></div></div>");

        
		
   
   
   count += 1;
   
   });

	
	
	

    $("#inputtext").on("click", ".removeArea", function(event) {
        $(this).closest('.dynamic').remove();
        count -= 1;
    });




})
</script>

    <?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\raorelays\resources\views/admin/material-product/create.blade.php ENDPATH**/ ?>
 <?php $__env->startSection('content'); ?>




<div class="breadcumbs-area">
    <ul>
        <li class="title-main">
            <h4>Purchase Order (Supplier)</h4>
        </li>
        <li class="link-home"><a href="#."><i class="fa fa-home"></i></a></li>
        <li class="link-home"><a href="#.">Home</a></li>
        <li class="link-page"><a href="#.">Purchase Order (Supplier)</a></li>
    </ul>
   
</div>


<div class="content-main-here">


 

    <div class="table-main-div">
        <div class="table-header">
            <h2><strong>Purchase Order (Supplier)</strong></h2>
			 <?php echo $__env->make('toast', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
        
		
		<form class="add-patient-form" method="post" action="<?php echo e(route('admin.material.request')); ?>" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
		 <input type="hidden" name="type" value="RS">
		<div class="tableBody">
            <div class="table-responsive">
      

        

       
				<div class="form-group row back-grey">

                           

                   
                            <div class="form-group col-sm-4">

             <label for="supplier_name" class="supplier_name">Supplier Name </label>
                                
                                 <select class="form-control  for-multiple select-form" id="supplier" name="supplier">
                                        
										 <option value="">Select Supplier</option>
										
										<?php $__currentLoopData = $suppliers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $supplier): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($supplier->id); ?>"><?php echo e($supplier->supplier_name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                            </div>
							<div class="form-group col-sm-4">

								<label for="order" class="order">Orders
                                        
                                    </label>
                                <select class="form-control" id="selUser" name="order" >
                                        <option value="">Select Order</option>
                                        <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($order->display_order_id); ?>"><?php echo e($order->display_order_id); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                            </div>
							
							
							<div class="form-group col-sm-4">


                                <label for="order" class="order">Purchase Order Date
                                        <span style="color: red">*</span>
                                    </label>
                                 <input type="text" name="order_date"  class="form-control date-picker" required>
                                
                            </div>
					
				</div>
				 <p id="notice"></p>
				 
				 
				 <div class="option-section admin-area-here">
	                        <div class="row">
	                            <div class="col-sm-12">
	                                <div class="table option product-add">
	                                    
	                                    <div id="inputtext">
	                                    </div>
	                                    <button class="addBtn" type="button"><i class="fa fa-plus"></i> Add Products</button>
	                                </div>
	                            </div>
	                        </div>
	                    </div>
				 
            </div>
        </div>
		  <div class="form-field-here text-center" style="margin-top: 20px">
                   
                    <button id="save_purchase" type="submit" class="btn blue">
<i class="fa fa-plus-circle"></i> Create Purchase Order</button>
                </div>
				
		</form>		
				
				
				
				
    </div>
	
</div>	

<script type="text/javascript">
$(document).ready(function() {
    var count = 1;
    $("button.addBtn").click(function() {
		//$(document).on('click', 'button.addBtn', function() {  
		
        $("#inputtext").append("<div class='dynamic'><div class='row'><div class='col-sm-3 first'><select class='sub form-control' id='"+count+"' onclick='fill_sub(this)' name='category[]' required></select></div><div class='col-sm-3'><select class='sub form-control' id='parent-"+count+"' data-id='"+count+"' name='parent_id[]' onclick='fill_product(this)' required></select></div><div class='col-sm-3'><select class='product form-control' id='product-"+count+"' name='product_id[]' required></select></div><div class='col-sm-2'><input type='text' placeholder='Qty' name='qty[]' required  /></div><div class='col-sm-1 last'><button class='removeArea' type='button'>Remove</button></div></div></div>");

        
		var data=<?php print_r($main_category);?>
		
		$.each(data, function(key, value) {
						
	   //main.append('<option value="'+value.id+'">'+value.name+'</option>');
	   
	   $('#' + count).append('<option value="'+value.id+'">'+value.name+'</option>');
							
												});
   
   
   count += 1;
   
   });

	
	
	

    $("#inputtext").on("click", ".removeArea", function(event) {
        $(this).closest('.dynamic').remove();
        count -= 1;
    });




})
</script>
<script type="text/javascript">
function fill_product(param)
{
	
	
	var count = $(param).attr('data-id');
	
	//alert(count);
	
	var parant_id=param.value;
	//alert(parant_id);
	if(parant_id){	
								
					$.ajax({
					url: "<?php echo e(route('admin.get.material.product')); ?>",
					data: {
					parant_id: parant_id
					},
					dataType: "json",
					success: function(data) {
						
						//console.log(data);
						
						$('#product-' + count).empty();					
						$.each(data, function(key, value) {
						$('#product-' + count).append('<option value="'+value.id+'">'+value.name+'</option>');
						});
							
					}
							});
								
		}else{
			$('#product-' + count).empty();
											   
		}   	
	
	

	
}



</script>
<script type="text/javascript">
function fill_sub(param)
{
	
	
	var count = $(param).attr('id');
	
	var cat_id=param.value;
	
	if(cat_id){	
								
					$.ajax({
					url: "<?php echo e(route('admin.get.subcategory')); ?>",
					data: {
					cat_id: cat_id
					},
					dataType: "json",
					success: function(data) {
						$('#parent-' + count).empty();					
						$.each(data, function(key, value) {
						$('#parent-' + count).append('<option value="'+value.id+'">'+value.name+'</option>');
						});
							
					}
							});
								
		}else{
			$('#parent-' + count).empty();
											   
		}   	
	
	

	
}



</script>
    <?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\raorelays\resources\views/admin/material-product/purchase.blade.php ENDPATH**/ ?>
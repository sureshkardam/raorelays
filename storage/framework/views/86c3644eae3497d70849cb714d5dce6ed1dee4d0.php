 
<?php $__env->startSection('content'); ?>

                <div class="breadcumbs-area">
                    <ul>
                        <li class="title-main">
                            <h4>Customer Order</h4>
                        </li>
                        <li class="link-home"><a href="#."><i class="fa fa-home"></i></a></li>
                        <li class="link-home"><a href="#.">Home</a></li>
                        <li class="link-page"><a href="#.">Customer Order</a></li>
                    </ul>
                    <!-- <div class="create-button">
                        <a title="Add New" href="#."><i class="fa fa-plus"></i></a>
                    </div> -->
                </div>
                <div class="content-main-here">
                    <div class="table-main-div" style="margin-top: 0px;">
                        <div class=" table-header ">
                            <h2><strong>Customer Order</strong> </h2>
                        </div>
						<?php echo $__env->make('toast', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
             <?php if($errors->any()): ?>
    <div class="alert alert-danger">
     
            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li><?php echo e($error); ?></li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
       
    </div>
<?php endif; ?> 
   <div class="order-customer-area">
                  

                   <div class="row">
               
                    <div class="col-sm-12">
                        <div class="full-comment-section">
                        
                    <div class="details-block-support-edit">
                        <ol>
                            
                            <li>
							
                                    <h3>Customer Name</h3>
                                    
                                        <p><?php echo e($customer->contact_name); ?></p>
                
                                    
                            </li>
							<li>
							
                                    <h3>Customer Name</h3>
                                    
                                        <p><?php echo e($customer->contact_name); ?></p>
                
                                    
                            </li>
							<li>
							
                                    <h3>Customer Name</h3>
                                    
                                        <p><?php echo e($customer->contact_name); ?></p>
                
                                    
                            </li>
							<li>
							
                                    <h3>Customer Name</h3>
                                    
                                        <p><?php echo e($customer->contact_name); ?></p>
                
                                    
                            </li>
							<li>
							
                                    <h3>Customer Name</h3>
                                    
                                        <p><?php echo e($customer->contact_name); ?></p>
                
                                    
                            </li>
                            <li>
                                    <h3>Telephone</h3>
                        
                                        <p><?php echo e($customer->telephone); ?></p>
            
                                    
                            </li>
                        </ol>
                    </div>
           
                    <div class="text-area">
                        
                        
                        
                        
                        <form enctype="multipart/form-data" method="post" action="<?php echo e(route('admin.customer.view',$customer->id)); ?>">
                            
							   <div class="option-section">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="table option product-add">
                                       
									  
									   <div id="inputtext">
									   
									   </div>
									 
										<button class="addBtn" type="button">Add Products</button>


                                    </div>
                                </div>
                            </div>
                        </div>
                           
                           
							<input type="submit" class="btn blue" value="Create Order">
                            <?php echo csrf_field(); ?>
                            </form>
                    </div>
                

                       
                       </div>   
                    </div>
        </div>
    </div>
	<!--
	<link href="https://code.jquery.com/ui/1.10.2/themes/smoothness/jquery-ui.min.css" rel="stylesheet"></link>
<script src="https://code.jquery.com/ui/1.10.2/jquery-ui.min.js"></script>-->

 <link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css" rel="stylesheet" type="text/css"/>
  
  <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js"></script>


	<script type="text/javascript">
        
		$(document).ready(function(){
    var count = 1;
    $("button").click(function(){
       $("#inputtext").append("<div class='dynamic'><div class='row'><div class='col-sm-7'><input type='text' class='suggestion' value='' name='product_name' /><input type='hidden' name='product_ids[]' /></div><div class='col-sm-4'><input type='text' name='qty[]' /></div><div class='col-sm-1'><button class='removeArea' type='button'>Remove</button></div></div></div><br />");
	   
	   count += 1;
	   
	   $(".suggestion").autocomplete({
                source: function(request, response) {
                $.ajax({
                url: "<?php echo e(route('admin.get.product')); ?>",
                data: {
						q: request.term
					},
                dataType: "json",
               success: function(data){
                console.log(data);
                response(data);
                }    
            });
			
			},
      minLength: 3,
      select: function( event, ui ) {
       
		$(this).closest('.dynamic').find('input[name="product_name"]').val(ui.item.label);
		$(this).closest('.dynamic').find('input[name="product_ids[]"]').val(ui.item.value);
		return false;
      },
			
			
        
    });
	   
	   
	   
    });
	
	
	
	$("#inputtext").on("click", ".removeArea", function (event) {
        $(this).closest('.dynamic').remove();      
        count -= 1;
    });
	
	
	
	
})
		
		
	
	

       
    </script>
	
	
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\rao-relays\resources\views/admin/customer/view.blade.php ENDPATH**/ ?>
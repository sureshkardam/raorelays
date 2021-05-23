 <?php $__env->startSection('content'); ?>

<?php
if($order->type=='PR')
{

$title='Raw Material Request (Raw Material Department)';	
$button_text='Raw Material';
}else if($order->type=='RS')
	
	{
		$title='Purchase Request (Supplier)';	
		$button_text='Purchase';
		
	}else if($order->type=='JOB')
		
		{
		$title='Job Work Request';	
		$button_text='Job Work';
		}


?>

<div class="breadcumbs-area">
    <ul>
        <li class="title-main">
            <h4><?php echo e($title); ?> Detail</h4>
        </li>
        <li class="link-home"><a href="#."><i class="fa fa-home"></i></a></li>
        <li class="link-home"><a href="#.">Home</a></li>
        <li class="link-page"><a href="#."><?php echo e($title); ?> Detail</a></li>
    </ul>
   
</div>
<div class="content-main-here">


 <form class="add-patient-form" method="post" action="<?php echo e(route('admin.material.purchase.save')); ?>" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
		

    <div class="table-main-div">
        <div class="table-header">
            <h2><strong><?php echo e($title); ?> Detail</strong></h2>
			 
        </div>
        <div class="tableBody">
            <div class="table-responsive">
      

         <?php echo $__env->make('toast', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

				<div class="form-group row back-grey">

                           
						   <?php if($order->supplier_id): ?>
						   
							 <div class="form-group col-sm-4">

             <label for="supplier_name" class="supplier_name">Supplier Name </label>
                                
                                 <select class="form-control  for-multiple select-form" id="supplier" name="supplier" disabled>
                                        
										 <option value="">Select Supplier</option>
										
										<?php $__currentLoopData = $suppliers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $supplier): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($supplier->id); ?>" <?php if($supplier->id==$order->supplier_id): ?>  selected <?php endif; ?>><?php echo e($supplier->supplier_name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                            </div>
                   <?php endif; ?>
                           
						   
						   <?php if($order->order_id): ?>
						   
							<div class="form-group col-sm-4 order-inline">


                                <label for="order" class="order">Orders</label>
                                    <!-- Product Name -->
									
									
                                  <?php if($order->order_id): ?>
									  <p>
								   <?php $order_display=json_decode($order->order_id); ?>
										
										<?php echo e($order_display); ?>

										</p>
								<?php endif; ?>
                            </div>
							<?php endif; ?>
							
							
							<div class="form-group col-sm-4">


                                <label for="order" class="order">Purchase Order Date
                                        <span style="color: red">*</span>
                                    </label>
                                 <input type="text" name="order_date"  class="form-control" value="<?php echo e($order->purchase_order_date); ?>" disabled >
                                
                            </div>
							
							 
							
							
					 <!--<input type="hidden" name="type" value="PR">-->
					 <input type="hidden" name="order" value="<?php echo e($order->id); ?>">		
				
				</div>
				
					<table class="table" id="myTable" style="margin-top:10px;">
        <thead>
            <tr>
			  
			   <th>S.No</th>
			   <th>Parent Name</th>
			   <th>Name</th>
               <th>Quantity(*)</th>
			   <?php if(App\PurchaseOrderProductRecieve::exists($order->id)): ?>
			<th>Recieved</th>	
			<?php endif; ?>	   
			   <th>Remarks</th>
            </tr>
        </thead>
		 <tbody>
		
		<?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
		<tr>
		 
		 <td><?php echo e($loop->iteration); ?></td>
		<td><?php echo e(App\Category::getName($product->parent_id)); ?></td>
		<td><?php echo e(App\MaterialProduct::getName($product->product_id)); ?>

		 <input type="hidden" name="parent_id[]" value="<?php echo e($product->parent_id); ?>">
		 <input type="hidden" name="product_id[]" value="<?php echo e($product->product_id); ?>">
		
		</td>
		
		<?php if(App\PurchaseOrderProductRecieve::exists($order->id)): ?>
			
		 <td>
		
		 <input name="qty[]" value=" <?php echo e(($product->qty)-(App\PurchaseOrderProductRecieve::getQty($order->id,$product->product_id))); ?>" class="form-control">
		 
		</td>
		
		<td><?php echo e(App\PurchaseOrderProductRecieve::getQty($order->id,$product->product_id)); ?>

		
		
		
		</td>
		<?php else: ?>
			
		 <td>
		
		 <input name="qty[]" value=" <?php echo e($product->qty); ?>" class="form-control">
		 
		</td>
		
		
		<?php endif; ?>
		 <td>
		 <input name="remarks[]" class="form-control" value="">
		 
		</td>
		  
		 </tr>
		
		 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		
		 </tbody>
          </table>     
            </div>
        </div>
		  <div class="form-field-here text-center" style="margin-top: 20px">
                   
                    <?php if($order->status <> 0): ?>
					
					<button id="save_purchase" type="submit" class="btn blue">
<i class="fa fa-plus-circle"></i> Recieve <?php echo e($button_text); ?> Request</button>
<?php endif; ?>
                </div>
    </div>
	
	
	
	</form>
	</div>
	

    <?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\raorelays\resources\views/admin/material-product/request-raw-details.blade.php ENDPATH**/ ?>
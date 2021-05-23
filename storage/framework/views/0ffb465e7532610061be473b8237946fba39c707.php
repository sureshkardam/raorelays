 
<?php $__env->startSection('content'); ?>




<div class="breadcumbs-area with-label">
                    <ul>
                        <li class="title-main">
                            <h4>Job Work Request List</h4>
                        </li>
                        <li class="link-home"><a href="#."><i class="fa fa-home"></i></a></li>
                        <li class="link-home"><a href="#.">Home</a></li>
                        <li class="link-page"><a href="#.">Job Work Request List</a></li>
                    </ul>
                    <div class="create-button">
					 
						
                      
						</div>
						
				</div>
                <div class="content-main-here">
                    <div class="filter-blocks multi-fields-set">
              
                    </div>



                    <div class="table-main-div">
                        <div class="table-header">
                            <h2><strong>Job Work Request List</strong></h2>
							 <div class="create-button">
					  
                      
						<a title="Create Job Work Request" href="<?php echo e(route('admin.material.request.jobwork')); ?>"><i class="fa fa-plus"></i> Create Job Work Request</a>
						</div>
						
                        </div>
                        <div class="tableBody">
                            <div class="table-responsive">
                              <?php echo $__env->make('toast', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                         <table class="table" id="myTable">
                            <thead>
                                <tr>
                                    
                                   <th>Order#</th>
								   <th>Reference order #</th>
                                   <th>Supplier</th>
								   <th>Order Date</th>
                                   
								   <th>Created by</th>
								   <th>Created At</th>
								   <th>Action</th>
									
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr 
								<?php if($order->status==0): ?>
									style="color:green";
								<?php endif; ?>
								<?php if($order->status==1 && App\PurchaseOrderProductRecieve::exists($order->id)): ?>
									style="color:orange";
								<?php endif; ?>
								<?php if($order->status==1): ?>
									style="color:red";
								<?php endif; ?>
								
								>
                                  
                                    <td><?php echo e($order->id); ?></td>
									 <td><?php echo e(json_decode($order->order_id)); ?></td>
									<td><?php if($order->supplier_id): ?> 
									<?php echo e(App\Supplier::getName($order->supplier_id)); ?>

										<?php endif; ?>
									
									</td>
									<td><?php echo e(date('M\. d\, Y', strtotime($order->purchase_order_date))); ?></td>
									
									<td><?php echo e(App\User::getName($order->created_by)); ?></td>
									<td><?php echo e(date('M\. d\, Y', strtotime($order->created_at))); ?></td>
									

                                   
                                    <td>
                                       
                                      <div class="action-dropdown-icons">
                                    <div class="action-btns">
                                        <a href="<?php echo e(route('admin.get.purchase.order.product',['id'=>$order->id])); ?>"><i class="fa fa-eye" aria-hidden="true" title="Edit"></i></a>
                                       
                                           
                                        
                                    </div>
                                    <div class="dropdown icon-action-dropdown">
                                        <a class="dropdown-toggle btnMore" data-toggle="dropdown" href="#" aria-expanded="true">More <i class="fa fa-caret-down" title="Click to More"></i></a>

                                        <ul class="dropdown-menu">
                                           

												<li> <a href="<?php echo e(route('print.pdf',['id'=>$order->id,'type'=>'1'])); ?>"><i class="fa fa-file-pdf-o" aria-hidden="true"></i> Download Request</a></li>
												  

											   <li>
										<a href="<?php echo e(route('print.pdf',['id'=>$order->id,'type'=>'0'])); ?>"><i class="fa fa-file-pdf-o" aria-hidden="true"></i> Download Reciept</a>
									</li>
                                                    
                                                           

                                                    


                                          

                                           
                                        </ul>
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




<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\raorelays\resources\views/admin/material-product/request-jobwork-list.blade.php ENDPATH**/ ?>
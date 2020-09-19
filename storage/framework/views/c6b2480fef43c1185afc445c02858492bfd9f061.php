 
<?php $__env->startSection('content'); ?>




<div class="breadcumbs-area with-label">
                    <ul>
                        <li class="title-main">
                            <h4>Sales</h4>
                        </li>
                        <li class="link-home"><a href="#."><i class="fa fa-home"></i></a></li>
                        <li class="link-home"><a href="#.">Home</a></li>
                        <li class="link-page"><a href="#.">Orders</a></li>
                    </ul>
                    <div class="create-button">
					  
                       
						<a title="Create Order" href="<?php echo e(route('admin.order.create')); ?>"><i class="fa fa-plus"></i> Create Order</a>
						
						
                      
						</div>
						
				</div>
                <div class="content-main-here">
                    <div class="filter-blocks multi-fields-set">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card-here">

<h3>Filter</h3>
                                    

                                   <form class="row" action="<?php echo e(route('admin.order.list')); ?>" method="post">

                                     

                                        <div class="input-filter col-sm-2">
                                          
                                            <input type="text" name="order_id" placeholder="Order ID">
                                         
                                        </div>

                                       

                                         <div class="input-filter col-sm-2">
                                            <input type="text" name="from" placeholder="From Date" class="date-picker">
                                        </div>
                                        <div class="input-filter col-sm-2">
                                            <input type="text" name="to" placeholder="To Date" class="date-picker">
                                        </div>
                                         
                                           
                                                 <div class="input-filter col-sm-4">


                                     <select class="form-control" name="order_status">
                                            <option value="">Select Order Status</option>
                                            <?php $__currentLoopData = $order_status; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order_status): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($order_status->id); ?>"><?php echo e($order_status->name); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                          </select>
                                        </div>
                                       
                                        <?php echo csrf_field(); ?>
                                        <div class="input-filter submit col-sm-2">
                                            <button title="Click To Filter">
                                                <i class="fa fa-filter"></i>
                                                <input type="submit" value="Filter">
                                            </button>
                                        </div>
                                    </form>
                                
                                    
                                    
                                    
                                    
                                </div>
                            </div>
                        </div>
                    </div>



                    <div class="table-main-div">
                        <div class="table-header">
                            <h2><strong>Order</strong></h2>
							 <div class="create-button">
					  
						<a title="Create Order" href="<?php echo e(route('admin.order.create')); ?>"><i class="fa fa-plus"></i></a>
						
						
                      
						</div>
                        </div>
                        <div class="tableBody">
                            <div class="table-responsive">
                              <?php echo $__env->make('toast', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                         <table class="table" id="myTable">
                            <thead>
                                <tr>
                                    
                                    <th>Order Id</th>
									 <th>Plant ID</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                   
                                    
                                     <th>Status</th>
									 	<th>Order Date</th>
                                    
									<th>Action</th>
									
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                  
                                    <td><?php echo e($order->display_order_id); ?></td>
									<td><?php echo e(App\Plant::getPlantId($order->plant)); ?></td>
									
									<td><?php echo e(App\Customer::getName($order->user_id)); ?></td>
                                    
                                    <td><?php echo e(App\Customer::getEmail($order->user_id)); ?></td>
                                  
									 <td><?php echo e(App\OrderStatus::getName($order->order_status_id)); ?></td>
									
									 <td><?php echo e(date('M\. d\, Y', strtotime($order->created_at))); ?></td>
                                     
                               

                                   
                                    <td>
                                      
										<a class="action-dash prl-5" href="<?php echo e(route('admin.order.detail',$order->id)); ?>"><i class="fa fa-eye" aria-hidden="true"></i></a>
										
									<?php if($order->order_status_id=='8'): ?>	
										<a class="action-dash prl-5" href="<?php echo e(route('admin.order.edit',$order->id)); ?>"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                                    <?php endif; ?>        
                                
								 
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

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\rao-relays\resources\views/admin/order/list.blade.php ENDPATH**/ ?>
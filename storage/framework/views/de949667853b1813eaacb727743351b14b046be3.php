 
<?php $__env->startSection('content'); ?>


    <div class="breadcumbs-area">
        <ul>
            <li class="title-main">
                <h4>Sales</h4>
            </li>
            <li class="link-home"><a href="#."><i class="fa fa-home"></i></a></li>
            <li class="link-home"><a href="#.">Home</a></li>
            <li class="link-page"><a href="#.">Order Details</a></li>
        </ul>
        <!-- <div class="create-button">
                        <a title="Add New" href="#."><i class="fa fa-plus"></i></a>
                    </div> -->
    </div>
    <div class="content-main-here  order-sales-view">
        <div class="table-main-div" style="margin-top: 0px;">
            <div class=" table-header ">
                <!--<h2><strong>Order Details (#<?php echo e($order->id); ?>)</strong> </h2>-->
            </div>
            <?php echo $__env->make('toast', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        

            <!-- content order detail -->

<div class="order-history-third accordion-here">
				  <div class="panel-group" id="accordion1">
						<div class="panel panel-default">
						  <div class="panel-heading">
                             <h3 class="panel-title">
							  <a data-toggle="collapse" data-parent="#accordion1" class="collapsed" href="#collapse1">							  
								<i class="fa fa-comment-o"></i> Customer & Products Details </b>
								
						
							  </a>
							</h3>							
                           </div>
						   

						  <div id="collapse1" class="panel-collapse collapse">
							<div class="panel-body">
<div class="are-order-details custom-width-set">
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="order-detail-box">
                                        <div class="panel panel-default">
                                            <div class="panel-heading">
                                                <h3 class="panel-title"><i class="fa fa-user-secret"></i> Order Details</h3>
                                            </div>
                                            <table class="table">
                                                <tbody>
                                                    <tr>
                                                        <td style="width: 1%;"><button data-toggle="tooltip" title="" class="btn btn-danger btn-xs" data-original-title="Store"><i class="fa fa-shopping-cart fa-fw"></i></button></td>
                                                        <td>Rao Relays</td>
                                                    </tr>
                                                    <tr>
                                                        <td><button data-toggle="tooltip" title="" class="btn btn-danger btn-xs" data-original-title="Date Added"><i class="fa fa-calendar fa-fw"></i></button></td>

                                                        <td><?php echo e(date('M\. d\, Y', strtotime($order->created_at))); ?></td>
                                                    </tr>
													
													 <tr>
                                                    <td style="width: 1%;"><button data-toggle="tooltip" title="" class="btn btn-danger btn-xs" data-original-title="Created By"><i class="fa fa-user fa-fw"></i></button></td>
                                                    <td> <?php echo e(App\User::getName($order->created_by)); ?> </td>
                                                </tr>
													
                                                   
                                                </tbody>

                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h3 class="panel-title"><i class="fa fa-user"></i> Customer Details</h3>
                                        </div>
                                        <table class="table">
                                            <tbody>
                                                <tr>
                                                    <td style="width: 1%;"><button data-toggle="tooltip" title="" class="btn btn-danger btn-xs" data-original-title="Customer"><i class="fa fa-user fa-fw"></i></button></td>
                                                    <td> <?php echo e(App\Customer::getName($order->user_id)); ?></td>
                                                </tr>
                                               
                                                <tr>
                                                    <td><button data-toggle="tooltip" title="" class="btn btn-danger btn-xs" data-original-title="E-Mail"><i class="fa fa-envelope-o fa-fw"></i></button></td>
                                                    <td><?php echo e(App\Customer::getEmail($order->user_id)); ?></td>
                                                </tr>
                                                <tr>
                                                    <td><button data-toggle="tooltip" title="" class="btn btn-danger btn-xs" data-original-title="Telephone"><i class="fa fa-phone fa-fw"></i></button></td>
                                                    <td><?php echo e(App\Customer::getContact($order->user_id)); ?></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h3 class="panel-title"><i class="fa fa-cog"></i> Options</h3>
                                        </div>
                                        <table class="table edit-order-he">
                                            <tbody>
                                                
												 <tr>
                                                    <td><div class="order-stats">Order Ref. Number</div></td>
													
													
													
                                                   
                                                    <td align="right"> <b><?php echo e($order->display_order_id); ?></b>
                                                    </td>
                                                </tr>
												
												
                                               <tr>
                                                    <td><div class="order-stats">Order Status</div></td>
													
													
													
                                                   
                                                    <td align="right"> <b>
													
													<?php echo e(App\OrderStatus::getName($order->order_status_id)); ?>

													
													</b>
                                                    </td>
                                                </tr>
												<tr>
                                                    <td>Invoice</td>
                                                  
                                                    <td align="right"> <a href="<?php echo e(route('print.invoice',['id'=>$order->id])); ?>"><i class="fa fa-print" ></i>Print</a>
                                                    </td>
													
													
													
													
													
                                                </tr>
											
                                          
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="order-detail-second">
                          <?php if($order->getProducts->count() > '0'): ?> 
						   <div class="row">
                                <div class="col-sm-12">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h3 class="panel-title"><i class="fa fa-info-circle"></i> Product Details</h3>
                                        </div>
                                        <div class="panel-body">
                                           

                                            <table class="table table-bordered">
                                                <thead>
                                                    <tr>
                                                       
                                                        <td class="text-left">Product Code</td>
                                                        <td class="text-right">Unit Qty</td>
														<td class="text-right">Specification</td>
														<td class="text-right">Comment</td>
                                                        <td class="text-left">Created Date</td>
                                                       
                                                       
                                                    </tr>
                                                </thead>
                                                <tbody>
												<?php $__currentLoopData = $order->getProducts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
												
                                                    <tr>
                                                     
									
									<td class="text-left"><?php echo e($item->sku); ?></td>
									<td class="text-left"><?php echo e($item->quantity); ?></td>
									<td class="text-left"><?php echo e($item->	specification); ?></td>
									<td class="text-left"><?php echo e($item->comment); ?></td>
									<td class="text-left" ><?php echo e(date('M\. d\, Y', strtotime($order->created_at))); ?></td>
                                                </tr>  
												<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>												
                                                </tbody>

                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
							<?php endif; ?>
                        </div>
     
	 </div>
						  </div>
						</div>
					</div> 
					</div>				   
                  
                        
			

            <!-- end content order detail -->
			<!-- order history  -->
			<div class="order-history-third accordion-here">
				  <div class="panel-group" id="accordion">
						<div class="panel panel-default">
						  <div class="panel-heading">
                             <h3 class="panel-title">
							  <a data-toggle="collapse" data-parent="#accordion" class="collapsed" href="#collapse">							  
								<i class="fa fa-comment-o"></i> 
								<?php if((Auth::user()->user_type=='1') || (Auth::user()->user_type=='2')): ?>
								
								Order Status & History

								<?php else: ?>
								Order Status	
								<?php endif; ?>
								</b>
								
						
							  </a>
							</h3>							
                           </div>
						   

						  <div id="collapse" class="panel-collapse collapse">
							<div class="panel-body">
                                            <!--<ul class="nav nav-tabs">
                                                <li class="active"><a href="#tab-history" data-toggle="tab" aria-expanded="true">History</a></li>-->

                                            </ul>
                                            <div class="tab-content">
                                                <div class="tab-pane active" id="tab-history">
                                                    
													<?php if((Auth::user()->user_type=='1') || (Auth::user()->user_type=='2')): ?>
													
													<div id="history">
                                                        <div class="table-responsive">
                                                            <table class="table table-bordered myTable" >
                                                                <thead>
                                                                    <tr>
                                                                        <td class="text-left">Date Added</td>
                                                                        <td class="text-left">Comment</td>
                                                                        <td class="text-left">Status</td>
                                                                        <td class="text-left">Customer Notified</td>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                   
																	<?php $__currentLoopData = $order->getHistory; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $history): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
																	<tr>
                                                                        <td class="text-left"><?php echo e(\Carbon\Carbon::parse($history->created_at)->format('j F Y')); ?></td>
																		
                                                                        <td class="text-left"><?php echo e($history->comment); ?></td>
                                                                        <td class="text-left"><?php echo e(App\OrderStatus::getName($history->order_status_id)); ?>

																								
																		</td>
																		
                                                                        <td class="text-left"><?php echo e($history->notify ? 'Yes' : 'No'); ?></td>
																		

                                                                    </tr>
																	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                       
                                                    </div>
													<?php endif; ?>
                                                    <br>
                                                     
													   

                                                    <form class="form-horizontal order-history-tab-main" action="<?php echo e(route('order.status.update')); ?>" method="post">
                                                    <fieldset>
                                                        <legend></legend>
                                                        
                                                            <?php echo csrf_field(); ?>
															<input type="hidden" name="order_id" value="<?php echo e($order->id); ?>">
															
															
															
															<div class="order-history-form-field">
															
															<div class="form-group">
                                                                <label class="col-sm-3 control-label" for="input-order-status">Order Status </label>
                                                                <div class="col-sm-9">
                                                                    <select name="order_status_id" id="input-order-status" class="form-control order_status_id">
																	<?php $__currentLoopData = $order_status; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $status): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <option value="<?php echo e($status->id); ?>" <?php if($order->order_status_id==$status->id): ?> selected <?php endif; ?> ><?php echo e($status->name); ?></option>
																	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                              </select>
															  
															  
															  
                                                                </div>
                                                            </div>
														
														
														<div class="form-group schedule_date">
														
																<label class="col-sm-3 control-label" for="input-order-status">Schedule Date</label>
																
																
																<div class="col-sm-9">
																
																	<input type="text" class="date-picker" name="schedule_date" />
																		
																
																</div>
																
																
																
															
															  
														</div>
															

                                                            <div class="form-group">
                                                                <label class="col-sm-3 control-label" for="input-notify">Notify Customer</label>
                                                                <div class="col-sm-9">
                                                                    <input type="checkbox" name="notify" value="1" id="input-notify">
                                                                </div>
                                                            </div>
															
															
															
                                                            <div class="form-group">
                                                         <label class="col-sm-3 control-label" for="input-comment">Comment</label>
                                                                <div class="col-sm-9 for-margin">
                                                                    <textarea name="comment" rows="8" id="input-comment" class="form-control" ></textarea><button type="submit" id="button-history" data-loading-text="Loading..." class="btn blue"><i class="fa fa-plus-circle"></i>
   																	Update Order</button>
                                                   
                                                                </div>
                                                            </div>
															</div>
                                                        
                                                    </fieldset>
                                               
                                                       
													</form>

                                                      
                                                     
                                                </div>

                                            </div>
                                        </div>
						  </div>
						</div>
					</div> 
					</div>
			<!-- order hostory -->
			
			
			<!-- order history  -->
			<!--
			<div class="order-history-third accordion-here">
				  <div class="panel-group" id="accordion2">
						<div class="panel panel-default">
						  <div class="panel-heading">
                             <h3 class="panel-title">
							  <a data-toggle="collapse" data-parent="#accordion2" class="collapsed" href="#collapse2">							  
								<i class="fa fa-comment-o"></i> details </b>
								
						
							  </a>
							</h3>							
                           </div>
						   

						  <div id="collapse2" class="panel-collapse collapse">
							<div class="panel-body">
                                   <p>hello</p>   
                            </div>
						  </div>
						</div>
					</div> 
					</div>
					-->
			<!-- order hostory -->


    </div>

<script>
$(function(){
var productSerial = $('.schedule_date').html();
$('.schedule_date').html('');
$('.order_status_id').on('change', function(){
if($(this).val() == 3){
$('.schedule_date').html(productSerial);
}
else{
$('.schedule_date').html('');
}

});
});

$('body').on('focus',".date-picker", function(){
$(this).datepicker({
format: "mm/dd/yyyy",
viewMode: "months",
autoclose: true
});
        });


</script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\raorelays\resources\views/admin/order/detail.blade.php ENDPATH**/ ?>
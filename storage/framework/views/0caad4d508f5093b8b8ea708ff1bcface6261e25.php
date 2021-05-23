<!DOCTYPE html>
<html lang="">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Rao Relays Invoice</title>
    
</head>

<body style="text-align: center;font-family: 'Ubuntu', sans-serif; font-weight: 400;">
    <div class="container-wrapper" style="width: 100%; text-align: left;display: inline-block;">
        <div class="top-div-main" style="border-bottom: solid 1px #ddd;
        padding: 30px 0px;">
             <div class="content-top-dive" style="    display: block;">
                <div class="item-first-left-div" style="    display: inline-block;
    width: 54%;">
                    <h3 style="font-size: 40px;
                    margin: 10px 0px;
                font-weight: 400;
                color: #7d7d7d;">Invoice</h3>
                    <h2 style="    margin: 0;
                    font-size: 18px;">Rao Electromechanical Relays Pvt Ltd</h2>
                    <p style="margin: 0;
                    width: 190px;
                    line-height: 24px;">WZ-65, Khayala Village, New Delhi</p>
                    <a style="display: block;
                    margin: 1px 0px;
                    text-decoration: none;
                    font-size: 16px;
                    color: #000;" href="mailto:christine@healfaster.ca">info@raorelays.com</a>
                    <a style=" display: block;
                    margin: 8px 0px 0px;
                    text-decoration: none;
                    font-size: 16px;
                    color: #000;
                    margin-bottom: 0;" href="www.healfaster.ca">www.raorelays.com</a>
                    <p style="margin: 7px 0px;">GST Registration No. 01AALCA0171E2Z3</p>
                </div>
                   <div class="item-right-div-content" style="display: inline-block;
    width: 2%;
    vertical-align: top;">
                    <div class="image-logo">
					<?php
                             $file_path=url('/').'/admin/images/logo-big.png';
                             $data = base64_encode(file_get_contents($file_path));
                            
                              ?>
					
					
					
              <img src="data:image/png;base64,<?php echo e($data); ?>"  width="200">
            </div>
                </div>
            </div>
             <div class="content-second-dive" style="display: block;">
                <div class="item-second-left-div" style="display: inline-block;
    width: 54%;">

                    <h4 style="margin: 0;
                    font-size: 20px;
                    margin-top: 10px;">Address</h4>
                    <p style="margin: 0; width: 230px; line-height: 24px;"><?php echo e(ucwords($customer->contact_name)); ?> 
					<br> 
					<?php echo e($customer->registered_address); ?> ,
					<br> 
					<?php echo e($customer->city); ?> , <?php echo e(App\State::getName($customer->state)); ?>

					<br> 
					<?php echo e($customer->zip_code); ?> , India</p>

                </div>
                   <div class="item-right-second-content" style="display: inline-block;
    width: 45%;
    text-align: right;
    vertical-align: top;">
                    <p style="font-size: 18px;
                    font-weight: 600;">Invoice# <span class="value" style="font-weight: 400;"><?php echo e($order->display_order_id); ?></span></p>
                    <p style="font-size: 18px;
                    font-weight: 600;">Date : <span class="value" style="font-weight: 400;"><?php echo e(date('M\. d\, Y', strtotime($order->created_at))); ?></span></p>
                </div>
            </div>
        </div>
        <div class="order-details-here" style="text-align: right;">
            <table style="   width: 100%;
            padding: 40px 0px 0px;
            text-align: left;
            border-bottom: dotted 3px #ddd;
            border-collapse: collapse;
            margin-bottom: 20px;">
                <tr>
                    
					<th style="background: #d0d0d0;
                    margin: 0;
                    font-weight: 400;
                    padding: 10px 12px;
                    color: #656565;">CODE</th>
                    <th style="background: #d0d0d0;
                    margin: 0;
                    padding: 10px 12px;
                    font-weight: 400;
                    color: #656565;">QUANTITY</th>
                    <th style="background: #d0d0d0;
                    margin: 0;
                    padding: 10px 12px;
                    font-weight: 400;
                    color: #656565;">DESCRIPTION</th>
                    
                </tr>
                <?php $__currentLoopData = $order->getProducts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				<tr>
					
				   <td style="padding: 10px 12px;"><?php echo e($product->sku); ?></td>
                    <td style="padding: 10px 12px;"><b><?php echo e($product->quantity); ?></b></td>
                    <td style="padding: 10px 12px;"><?php echo e($product->specification); ?></td>
                    
                </tr>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            </table>
    
        </div>
        <div class="disclaimer" style="margin-top:140px; float: left;
    width: 100%;">
            <div class="disclaimer-content" style="    width: 100%; text-align:center;
           ">
               
                <p style="margin-bottom: 30px;">Please let us know if you have any question.</p>
               
               
              
            </div>
            
        </div>

    </div>
</body>

</html><?php /**PATH D:\xampp\htdocs\raorelays\resources\views/pdf/invoice.blade.php ENDPATH**/ ?>
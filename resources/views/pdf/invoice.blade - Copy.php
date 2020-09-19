<!DOCTYPE html>
<html lang="">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Healfaster Invoice</title>
    
</head>

<body style="text-align: center;font-family: 'Ubuntu', sans-serif; font-weight: 400;">
    <div class="container-wrapper" style="width: 100%; text-align: left;     border: solid 1px #ddd;
    padding: 10px 30px 20px; display: inline-block;">
        <div class="top-div-main" style="border-bottom: solid 1px #ddd;
        padding: 30px 0px;">
            <div class="content-top-dive" >
                <div class="item-first-left-div" >
                    <h3 style="font-size: 40px;
                    margin: 10px 0px;
                font-weight: 400;
                color: #7d7d7d;">Invoice</h3>
                    <h2 style="    margin: 0;
                    font-size: 18px;">Game Ready Canada C/O Trademark Consulting Inc.</h2>
                    <p style="margin: 0;
                    width: 190px;
                    line-height: 24px;">170 Zenway BLvd, Unit 3 Woodbridge ON L4H 2Y7 1-844-441-3278</p>
                    <a style="display: block;
                    margin: 1px 0px;
                    text-decoration: none;
                    font-size: 16px;
                    color: #000;" href="mailto:christine@healfaster.ca">christine@healfaster.ca</a>
                    <a style=" display: block;
                    margin: 8px 0px 0px;
                    text-decoration: none;
                    font-size: 16px;
                    color: #000;
                    margin-bottom: 0;" href="www.healfaster.ca">www.healfaster.ca</a>
                    <p style="margin: 7px 0px;">GST/HST Registration No. 812279156RT0001</p>
                </div>
                <div class="item-right-div-content">
                    <div class="image-logo">
					<?php
                             $file_path=url('/').'/healfaster/images/logo-big.png';
                             $data = base64_encode(file_get_contents($file_path));
                            
                              ?>
					
					
					
              <img src="data:image/png;base64,{{$data}}" height="50" width="350">
            </div>
                </div>
            </div>
            <div class="content-second-dive">
                <div class="item-second-left-div">

                    <h4 style="margin: 0;
                    font-size: 20px;
                    margin-top: 10px;">Address</h4>
                    <p style="margin: 0; width: 230px; line-height: 24px;">{{ucwords($order->payment_firstname)}} {{ucwords($order->payment_lastname)}} 
					<br> 
					{{$order->payment_address}} ,
					<br> 
					{{$order->payment_city}} , {{$order->payment_state}}
					<br> 
					{{$order->payment_zipcode}} , Canada</p>

                </div>
                <div class="item-right-second-content">
                    <p style="font-size: 18px;
                    font-weight: 600;">Invoice# <span class="value" style="font-weight: 400;">GR2019-135</span></p>
                    <p style="font-size: 18px;
                    font-weight: 600;">Date : <span class="value" style="font-weight: 400;">{{date('M\. d\, Y', strtotime($order->created_at))}}</span></p>
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
                    color: #656565;">DATE</th>
                    <th style="background: #d0d0d0;
                    margin: 0;
                    padding: 10px 12px;
                    font-weight: 400;
                    color: #656565;">ACTIVITY</th>
                    <th style="background: #d0d0d0;
                    margin: 0;
                    padding: 10px 12px;
                    font-weight: 400;
                    color: #656565;">DESCRIPTION</th>
                    <th align="right" style="background: #d0d0d0;
                    margin: 0;
                    padding: 10px 12px;
                    font-weight: 400;
                    color: #656565;">QTY</th>
                    <th align="right" style="background: #d0d0d0;
                    margin: 0;
                    padding: 10px 12px;
                    font-weight: 400;
                    color: #656565;">RATE</th>
                    <th align="right" style="background: #d0d0d0;
                    margin: 0;
                    padding: 10px 12px;
                    font-weight: 400;
                    color: #656565;">AMOUNT</th>
                </tr>
                @foreach($order->getProducts as $product)
				<tr>
                    <td style="padding: 10px 12px;">{{date('M\. d\, Y', strtotime($product->created_at))}}</td>
                    <td style="padding: 10px 12px;"><b>{{$product->order_type ? 'GR Sales' : 'GR Rental'}}</b></td>
                    <td style="padding: 10px 12px;"><span style="display: block;">{{$product->sku}}</span> {{$product->name}}  ( <?php 
												
						$options=App\OrderProduct::getOptions($order->id,$product->product_id);
						
						
						foreach ($options as $option) {   
						echo $option->name.' - '.$option->value;
						
						 }?>)</td>
                    <td align="right" style="padding: 10px 12px;">{{$product->quantity}}</td>
                    <td align="right" style="padding: 10px 12px;">{{$product->price}}</td>
                    <td align="right" style="padding: 10px 12px;">{{$product->total}}</td>
                </tr>
				@endforeach

            </table>
            <div class="total-subtotal" style="width: 244px; display: inline-block;">
                <div class="total-sub-here" style="text-align: left;">
                    <div class="area-content" style="display: block;">
                        <p class="left" style="display:inline-block;    margin: 4px 0px;font-size: 14px;">Subtotal</p>
                        <p style="font-size: 14px; display:inline-block; float:right;    margin: 0;">{{App\Http\Controllers\Frontend\HomeController::format($order->sub_total)}}</p>
                    </div>
                    <div class="area-content" style="display: block;">
                        <p class="left" style="display:inline-block;  margin: 4px 0px;font-size: 14px;">GST</p>
                        <p style="font-size: 14px;  display:inline-block; float:right;   margin: 0;">{{App\Http\Controllers\Frontend\HomeController::format($order->tax)}}</p>
                    </div>
					
					<div class="area-content" style="display: block;">
                        <p class="left" style="display:inline-block;  margin: 4px 0px;font-size: 14px;">Shipping</p>
                        <p style="font-size: 14px;  display:inline-block; float:right;   margin: 0;">{{App\Http\Controllers\Frontend\HomeController::format($order->shipping_amount)}}</p>
                    </div>
					
					
					
					<div class="area-content" style="display: block;">
                        <p class="left" style="display:inline-block;  margin: 4px 0px;font-size: 14px;">Discount</p>
                        <p style="font-size: 14px;  display:inline-block; float:right;   margin: 0;">{{App\Http\Controllers\Frontend\HomeController::format($order->discount_amount)}}</p>
                    </div>
                    <div class="area-content" style="display: block;">
                        <p class="left" style="display:inline-block;  margin: 4px 0px;font-size: 14px;">Total</p>
                        <p style="  display:inline-block; float:right;  margin: 4px 0px;
                        font-weight: 600;
                        font-size: 16px;">{{App\Http\Controllers\Frontend\HomeController::format($order->total)}}</p>
						<br>
                    </div>

                </div>
            </div>
        </div>
        <div class="disclaimer">
            <div class="disclaimer-content" style="    width: 460px;
            margin-top: -20px;">
                <p style="margin-bottom: 30px;">Here's your Invoice</p>
                <p style="margin-bottom: 30px;">Please let us know if you have any quetion.</p>
                <p style="margin-bottom: 30px;">Please Note that game ready canada and heal faster canada have moved effective june 15, 2019</p>
                <p style="margin-bottom: 30px;">Our new Mailing address is: <span style="display: block;
                    width: 220px;
                    line-height: 24px;
                    margin-top: 4px;">170 zenway Blvd Unit 3 Woodbridge, Ontario L4H 2Y7</span></p>
                <p style="margin-bottom: 30px;">Contact Phone Numbers and email address remain the same.</p>
                <p style="margin-bottom: 30px;">We look forward to continue providing you with the best in recovery devices and customer service!</p>
                <p style=" margin-bottom: 30px; line-height: 25px;">Game Ready Canada <br>C/O Trademark Consulting Inc. </p>
            </div>
            <div class="last-accepted" >
                <p class="left" >Accepted By</p>
                <p style="width: 50%;">Accepted Date</p>
            </div>
        </div>

    </div>
</body>

</html>
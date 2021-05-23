<!DOCTYPE html>
<html lang="">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Rao Relays</title>
</head>
<style>
td,
th {
    border: 1px solid #dddddd;
    text-align: left;
    padding: 5px;
	font-size:13px;
}
</style>

<body>
    <div class="content-main-here prof" style="border:solid 1px #ddd;">
        <div class="headerDiv" style="padding:10px 10px">
            <div class="MainDivForSupplier" style="margin-top:10px;">
                <div class="supplierDetail" style="width:49%;display:inline-block;">
                    <div class="detail-here-supp" style="">
                        <h3 style="font-size:13px; margin: 0; ">GSTIN: 07AAECR4501L1ZE</h3>
                    </div>
                </div>
                <div class="supplierDate" style="width: 50%;display:inline-block;text-align:right;">
                    <div class="Date-here-supp">
                        <p style="font-size:13px; margin: 0;">Triplicate for Supplier</p>
                    </div>
                </div>
            </div>
            <div class="MainDivForSupplier" style="margin-top: 0px;">
                <div class="detail-logo-adress" style="width: 100%;display: inline-block;text-align:center;">
                    <div class="Copmanyadress">
                        <p style="font-size: 13px;
    margin-top: 0px;
    margin-bottom: 0px;
    color:#525252;">(Input Tax Credit is available to a taxable person against this copy)</p>
                        <p style="font-size: 13px;
    margin-top: 0px;
    margin-bottom: 0px;
    font-weight: 700;
    text-decoration:underline;
    text-transform: uppercase;">Tax Invoice</p>
                        <p style="font-size: 18px;
    margin-top: 0px;
    margin-bottom: 0px;
    font-weight: 700;
    text-transform: uppercase;">Rao Electromachanical Relays PVT. LTD.</p>
                        <p style="font-size:13px;margin: 0px; color:#525252; text-transform: uppercase;">CIN : U31501DL200000PTC19825 ; PAN : AAECR4501L</p>
                        <p style="font-size:13px;margin: 0px;">Tel. : 011-25985088 email:info@raorelays.com</p>
                        <p style="font-size:13px;margin-top: 0px;margin-bottom: 0px; font-weight: 600; text-transform: uppercase;">PPOB-WZ 65, Khayala Village New Delhi - 110018</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="invoiceDIv" style="border-top:solid 1px #ddd;">
            <div class="MainDivForSupplier" style="">
                <div class="supplierDetail" style="border-right:solid 1px #ddd;width:49%;display:inline-block; vertical-align: top;">
                    <div class="detail-here-supp" style="padding:10px">
                        <p style="font-size:13px; margin: 0; color:#525252;"><span style="display: inline-block;
    width: 110px;">Invoice No.</span> : <?php echo e($order->display_order_id); ?></p>
                        <p style="font-size:13px; margin: 0; color:#525252;"><span style="display: inline-block;
    width: 110px;">Date of Invoice</span> : <?php echo e(date('M\. d\, Y', strtotime($order->created_at))); ?></p>
                        <p style="font-size:13px; margin: 0; color:#525252;"><span style="display: inline-block;
    width: 110px;">Place of Supply</span> : <?php echo e(\App\State::getName($customer->state)); ?></p>
                        <p style="font-size:13px; margin: 0; color:#525252;"><span style="display: inline-block;
    width: 110px;">Reverse Charge</span> : N</p>
                        <p style="font-size:13px; margin: 0; color:#525252;"><span style="display: inline-block;
    width: 110px;">Transport</span> : Saurashtra Roadways</p>
                        <p style="font-size:13px; margin: 0; color:#525252;"><span style="display: inline-block;
    width: 110px;">Vehice No.</span> : DL01LAE 1154</p>
                    </div>
                </div>
                <div class="supplierDate" style="width: 50%; vertical-align: top;display:inline-block;">
                    <div class="detail-here-supp" style="padding:10px">
                        <p style="font-size:13px; margin: 0; color:#525252;"><span style="display: inline-block;
    width: 110px;">Station</span> : <?php echo e($customer->city); ?></p>
                        <p style="font-size:13px; margin: 0; color:#525252;"><span style="display: inline-block;
    width: 110px;">Pan No.</span> : AAECM0259N</p>
                        <p style="font-size:13px; margin: 0; color:#525252;"><span style="display: inline-block;
    width: 110px;">PO No.</span> : 6067-6244</p>
                        <p style="font-size:13px; margin: 0; color:#525252;"><span style="display: inline-block;
    width: 110px;">E-Way Bill No.</span> : 7711-7965-0139</p>
                        <p style="font-size:13px; margin: 0; color:#525252;"><span style="display: inline-block;
    width: 110px;">No. of Boxes/Pkt</span> : 20</p>
                    </div>
                </div>
            </div>
            <div class="MainDivForSupplier" style="border-top:solid 1px #ddd;">
                <div class="supplierDetail" style="border-right:solid 1px #ddd;width:49%;display:inline-block; vertical-align: top;">
                    <div class="detail-here-supp" style="padding:10px">
                        <p style="font-size:13px; margin: 0; margin-bottom: 10px; color:#525252;"><span style="display: block;
    font-weight:600;">Billed To :</span> <?php echo e($customer->contact_name); ?> <br>
		<?php echo e($customer->registered_address); ?>,<br> <?php echo e($customer->city); ?></p>
                        <p style="font-size:13px; margin: 0; color:#525252;"><span style="display: inline-block;
    width: 110px;">State</span> : <?php echo e(\App\State::getName($customer->state)); ?></p>
                        <p style="font-size:13px; margin: 0; color:#525252;"><span style="display: inline-block;
    width: 110px;">GSTIN / UIN</span> : <?php echo e($customer->gst); ?></p>
                    </div>
                </div>
                <div class="supplierDetail" style="width:50%;display:inline-block; vertical-align: top;">
                    <div class="detail-here-supp" style="padding:10px">
                        <p style="font-size:13px; margin: 0; margin-bottom: 10px; color:#525252;"><span style="display: block;
    font-weight:600;">Shipped To :</span> <?php echo e($customer->contact_name); ?><br>
                           <?php echo e($customer->registered_address); ?>,<br> <?php echo e($customer->city); ?></p>
                        <p style="font-size:13px; margin: 0; color:#525252;"><span style="display: inline-block;
    width: 110px;">State</span> : <?php echo e(\App\State::getName($customer->state)); ?></p>
                        <p style="font-size:13px; margin: 0; color:#525252;"><span style="display: inline-block;
    width: 110px;">GSTIN / UIN</span> : <?php echo e($customer->gst); ?></p>
                    </div>
                </div>
            </div>
        </div>
        <div class="simpleTExt" style="border-top:solid 1px #ddd; border-bottom:solid 1px #ddd;">
            <p style="font-size:13px; margin: 0; padding:10px; text-transform:uppercase; color:#333;">We Declare That We Don't Print Any Brand Name On Our Product And No Specific Packaging</p>
        </div>
        <div class="tableDivhere">
            <table class="tableWithout" style="width: 100%; border-collapse: collapse;
  ">
                <thead>
                    <tr>
                        <th>S.no.</th>
                        <th>Discription of Goods</th>
                        <th>Hsn/SA C</th>
                        <th>Qty.</th>
                        <th>Unit</th>
                        <th>Price</th>
                        <th style="text-align:right;">Amount</th>
                    </tr>
                </thead>
                <tbody>
                     <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					
					<?php echo e($product); ?>

					
					<tr>
                        <td><?php echo e($loop->iteration); ?></td>
                        <td><?php echo e(App\Product::getName($product->product_id)); ?></td>
                        <td><?php echo e(App\Product::getHSN($product->product_id)); ?></td>
                        <td><?php echo e($product->quantity); ?></td>
                        <td>Nos.</td>
                        <td></td>
                        <td style="text-align:right;"></td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
                </tbody>
            </table>
        </div>
		
		<div class="HsnTax" style="padding-top:10px;">
            <div class="MainDivForSupplier" style="">
                <div class="supplierDetail" style="width:100%;display:inline-block; vertical-align: top;">
                    <div class="detail-here-supp" style="padding:10px">
                        <p style="font-size:13px; text-align:center; margin: 0; width:15%; display:inline-block; color:#525252;"><span style="display:block; font-weight:600;">HSN/SAC</span> 8536</p>
						<p style="font-size:13px; text-align:center; margin: 0; width:15%; display:inline-block; color:#525252;"><span style="display:block; font-weight:600;">Tax Rate</span> 18%</p>
						<p style="font-size:13px; text-align:center; margin: 0; width:15%; display:inline-block; color:#525252;"><span style="display:block; font-weight:600;">Taxable Amt.</span> 5,35,900.00</p>
						<p style="font-size:13px; text-align:center; margin: 0; width:15%; display:inline-block; color:#525252;"><span style="display:block;  font-weight:600;">IGST Amt.</span> 96,462.00</p>
						<p style="font-size:13px; text-align:center; margin: 0; width:15%; display:inline-block; color:#525252;"><span style="display:block;  font-weight:600;">Total Tax</span> 96,462.00</p>
                    </div>
                </div>
				<div class="supplierDetail" style="width:100%;display:block; vertical-align: top;">
                    <div class="detail-here-supp" style="padding:15px; padding-top:0;">
                        <p style="font-size:13px; margin: 0; display:inline-block; color:#525252;"><span style="display:block; font-weight:600;">Rupees Six Lakh Thirty Two Thousand Three Sixty Two Only</span></p>
                    </div>
                </div>
            </div>
        </div>
		
		<div class="bankDetails" style="border-top:solid 1px #ddd;">
            <div class="MainDivForSupplier" style="">
                <div class="supplierDetail" style="width:100%;display:block; vertical-align: top;">
                    <div class="detail-here-supp" style="padding:10px">
                        <p style="font-size:13px; text-transform:uppercase; margin: 0; color:#525252;"><span style="font-weight:600; vertical-align:top; display: inline-block;
    width: 130px;">Bank Details</span> : C/A NO. : 918030087283175 / IFS CODE : UTIB0000533 / MICR CODE: 110211046 AXIS BANK LTD, BRANCH MEERA BAGH, NEW DELHI - 110087</p>
                    </div>
                </div>
            </div>
        </div>
		
		<div class="invoiceDIv" style="border-top:solid 1px #ddd;">
            <div class="MainDivForSupplier">
                <div class="supplierDetail" style="border-right:solid 1px #ddd;width:49%;display:inline-block; vertical-align: top;">
                    <div class="detail-here-supp" style="padding:10px;">
    <p style="font-size:13px; margin: 0; margin-bottom: 10px; color:#525252;">
        <span style="display: block;
    font-weight:600; margin-bottom: 10px;">Terms and Condition</span>
	 E.O.E <br>1. Goods Once Sold will not be taken back.
        <br>2. Interest @ 18% p.a will be charged if the payment is not made with in the stipulated time
        <br>3. Subject to "Delhi" Jurisdiction only.
	</p>
</div>
                </div>
                <div class="supplierDetail" style="width:50%;display:inline-block; vertical-align: top;">
                    <div class="detail-here-supp" style="padding:10px">
                        <p style="font-size:13px; margin: 0; margin-bottom: 10px; color:#525252;"><span style="display: block;
    font-weight:600;">Reciever Signature:</span></p>
                    </div>
					<div class="detail-here-supp" style="border-top:solid 1px #ddd;text-align:right;padding:10px">
                        <p style="font-size:13px; margin: 0; margin-bottom: 10px; color:#525252;">for Rao Electromachanical Relays PVT LTD.</p>
						<p style="font-size:13px; margin: 0; margin-top: 20px; color:#525252;">for Authorised Signature</p>
                    </div>
                </div>
            </div>
        </div>
		
    </div>
</body>

</html><?php /**PATH D:\xampp\htdocs\raorelays\resources\views/pdf/print-invoice.blade.php ENDPATH**/ ?>
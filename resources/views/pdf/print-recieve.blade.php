<!DOCTYPE html>
<html lang="">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Rao Relays</title>
    
</head>

<body>

<div class="content-main-here prof">
    <div class="table-main-div">
	
	<div class="MainDivForSupplier" style="margin-top:10px;">
                <div class="supplierDetail" style="width:36%;display:inline-block;">
                    <div class="detail-here-supp" style="">
                        <h3 style="font-size:15px; margin: 0; text-decoration:underline">GSTIN: 07AAECR4501L1ZE</h3>
                    </div>
                </div>
                <div class="supplierDate" style="width: 50%;display:inline-block;text-align:left;">
                    <div class="Date-here-supp">
                        <p style="font-size:15px; margin: 0; text-decoration:underline">RAW MATERIAL ISSUE CHALLAN</p>
                    </div>
                </div>
            </div>
	
        <div class="MainDivForSupplier" style="margin-top: 0px;">
                <div class="detail-logo-adress" style="width: 100%;display: inline-block;text-align:center;">
                    <div class="Copmanyadress">
                        <p style="font-size: 26px;
    margin-top: 10px;
    margin-bottom: 11px;
    font-weight: 700;
    text-transform: uppercase;">Rao Electromachanical Relays PVT. LTD.</p>
						<p style="font-size:18px;margin-top: 0px; text-transform: uppercase;">WZ-65, Khayala Village, New Delhi-110018</p>
                    </div>
                </div>
            </div>
          
            <div class="MainDivForSupplier" style="margin-top:10px; border-bottom: solid 1px #777;">
            <div class="supplierDetail" style="width:49%;display:inline-block;">
                <div class="detail-here-supp" style="">
                    <h3 style="font-size:18px;font-weight: 600;">Challan No: {{json_decode($order->order_id)}}</h3>
                    @if($order->supplier_id)
					<p style="font-size: 15px;margin-top: 5px;">Supplier : {{App\Supplier::getName($order->supplier_id)}}</p>
					@endif
                </div>
            </div>


			
            <div class="supplierDate" style="width: 50%;display:inline-block;text-align:right;">
                <div class="Date-here-supp">
                    <p style="font-size:15px;"><b>Date:</b> {{date('M\. d\, Y', strtotime($order->purchase_order_date))}}</p>
                </div>
            </div>
            </div>




                <div class="table-header" style="position: relative;padding-top: 20px;">
                    <table class="tableWithout" style="width: 100%;">
                        <thead>
                            <tr>
                                <th width="80" style="border: solid 1px #ddd;padding: 9px 10px;">S.no.</th>
                                <th style="border: solid 1px #ddd;padding: 9px 10px;">Description of Goods</th>
                                <th style="border:solid 1px #ddd;padding: 9px 10px;">Qty</th>
								<th style="border:solid 1px #ddd;padding: 9px 10px;">Remarks</th>
                               
                            </tr>
                        </thead>
                        <tbody>
          @foreach($products as $product)
		  
		  <tr>
          <td style="border:solid 1px #ddd;padding: 9px 10px; background: #eee;">{{$loop->iteration}}</td>
          <td style="border:solid 1px #ddd;padding: 9px 10px; background: #eee;">{{App\MaterialProduct::getName($product->product_id)}}</td>
          <td style="border:solid 1px #ddd;padding:9px 10px; background: #eee;">{{$product->qty}}</td>
		  <td style="border:solid 1px #ddd;padding:9px 10px; background: #eee;">{{$product->remarks}}</td>
         
          </tr>
		 @endforeach 
                           
                        </tbody>
                    </table>
                </div>
				
				<div class="MainDivForSupplier" style="margin-top:20px; border-top: solid 1px #777;     ">
                <div class="supplierDetail" style="width:	49%;display:inline-block;">
                    <div class="Date-here-supp">
                        <p style="font-size:15px; margin-bottom: 0;"><b>Date:</b> {{date('M\. d\, Y', strtotime($order->purchase_order_date))}}</p>
                    </div>
                </div>
                <div class="supplierDate" style=" width: 50%;display:inline-block;text-align:right;">
                    <div class="Date-here-supp">
                        <p style="font-size:15px; margin-bottom: 0;">For Rao Electromachanical Relays PVT. LTD.</p>
                    </div>
                </div>
            </div>
			<div class="MainDivForSupplier" style="margin-top:10px;">
                <div class="supplierDetail" style="width:49%; display:inline-block;">
                    <div class="Date-here-supp">
                        <p style="font-size:15px; margin-top: 0;">Rao Material Recieved By:</p>
						
                    </div>
                </div>
                <div class="supplierDate" style="width: 50%; display:inline-block;text-align:right;">
                    <div class="Date-here-supp">
                        <p style="font-size:15px; margin-top: 0;">Sign.</p>
                    </div>
                </div>
            </div>
				
            </div>
        </div>
		
		
   </body>

</html>
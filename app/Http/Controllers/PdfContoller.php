<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\State;
use App\User;
use App\Country;
use App\Attribute;
use App\MaterialOption;
use App\MaterialOptionValue;
use App\MaterialProduct;
use App\MaterialCategory;
use App\ProductToCategory;
use App\MaterialProductOption;
use App\MaterialProductOptionValue;
use App\OrderProduct;
use Validator;
use Auth;
use Illuminate\Support\Arr;
use App\Activity;
use App\SubProduct;
use App\Category;
use App\CategoryPath;
use App\Supplier;
use App\Order;
use App\PurchaseOrder;
use App\PurchaseOrderProduct;
use App\PurchaseOrderProductRecieve;
use App\PurchaseOrderRecieve;
use App\MaterialRelation;
use App\Customer;
use App\Plant;

//use App\Unit;


use DB;
use PDF;



class PdfController extends Controller
{
	
	
	
	
	
	
	
	public function printPdf(Request $request,$id,$type){
		
	
	
	$purchaseOrder=PurchaseOrder::find($id);
	
	
	if($purchaseOrder->type)
		
	
//name	
	
if($purchaseOrder->type=='PR')
{

		$title='Raw-Material';
			

}else if($purchaseOrder->type=='RS')
	
{
		$title='Purchase-Order';	
		
		
}else if($purchaseOrder->type=='JOB')
		
{
		$title='Job-Work';	
		
}
	

	
//end of name	
	
	
	
	
	if($type==1)

	{
		
	$title=$title.'-'.'Request.pdf';
	$orderProduct=PurchaseOrderProduct::where('purchase_order_id','=',$id)->get();
		
				$data=	[
                        'order' => $purchaseOrder,
                        'products' => $orderProduct
						];
						
						
		$pdf = PDF::loadView('pdf.print-request', $data);
					
		$pdf->setOptions(['defaultFont' => 'sans-serif']);
		$pdf->setWarnings(true);
		$pdf->setPaper('a4', 'portrait');
        return $pdf->download($title);

	}else


	{
	$title=$title.'-'.'Recieve.pdf';	
	$orderProduct=PurchaseOrderProductRecieve::where('purchase_order_id','=',$id)->orderBy('product_id')->get();	
	
		$data=	[
                        'order' => $purchaseOrder,
                        'products' => $orderProduct
						];

		$pdf = PDF::loadView('pdf.print-recieve', $data);
					
		$pdf->setOptions(['defaultFont' => 'sans-serif']);
		$pdf->setWarnings(true);
		$pdf->setPaper('a4', 'portrait');
        return $pdf->download($title);
		
	}
		
		
		/*
		return PDF::loadView('pdf.invoice')->setPaper('a4', 'landscape')->setOptions(['defaultFont' => 'sans-serif'])->setWarnings(true)->save('invoice.pdf');
    	*/
    }
	
	
	
	
	public function printinvoice(Request $request,$id){
		
	
	
	$purchaseOrder=Order::find($id);
	
	
		
	$title='invoice.pdf';
	$orderProduct=OrderProduct::where('order_id','=',$id)->get();
	
	$customer=Customer::find($purchaseOrder->user_id);	
	$plant=Plant::find($purchaseOrder->plant);	
				$data=	[
                        'order' => $purchaseOrder,
                        'products' => $orderProduct,
						'customer' => $customer,
						'plant' => $plant
						];
						
						
		$pdf = PDF::loadView('pdf.print-invoice', $data);
					
		$pdf->setOptions(['defaultFont' => 'sans-serif']);
		$pdf->setWarnings(true);
		$pdf->setPaper('a4', 'portrait');
        return $pdf->download($title);

    }
	
	
	
	

	

}

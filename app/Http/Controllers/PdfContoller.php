<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\State;
use App\User;
use App\Country;
use App\Attribute;
use App\Option;
use App\OptionValue;
use App\Product;
use App\Customer;
use App\Order;
use App\Category;
use App\ProductToCategory;
use App\ProductOption;
use App\ProductOptionValue;
use App\OrderProduct;
use App\SubProduct;
use Validator;
use Auth;
use Illuminate\Support\Arr;
use App\Activity;
use PDF;

use App\Http\Controllers\QuickBookController as QuickBook;

class PdfController extends Controller
{
	
	
	
	
	
	
	
	public function printInvoice(Request $request,$id){
		
		
        $order=Order::find($id);
        $OrderProduct=OrderProduct::where('order_id',$id)->get(); 
		$customer = Customer::find($order->user_id);
		
				$data=	[
                        'order' => $order,
                        'orderProducts' => $OrderProduct,
						'customer' => $customer,
                           ];

		
		$pdf = PDF::loadView('pdf.invoice', $data);
					
		$pdf->setOptions(['defaultFont' => 'sans-serif']);
		$pdf->setWarnings(true);
		$pdf->setPaper('a4', 'portrait');
        return $pdf->download('invoice.pdf');
		
		/*
		return PDF::loadView('pdf.invoice')->setPaper('a4', 'landscape')->setOptions(['defaultFont' => 'sans-serif'])->setWarnings(true)->save('invoice.pdf');
    	*/
    }
	
	
	
	

	

}

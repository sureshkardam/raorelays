<?php

namespace App\Http\Controllers;

//use Bitfumes\Multiauth\Model\Admin;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\User;

use App\Country;
use App\State;

use App\Customer;
use Auth;
use Validator;

use DB;
use App\Activity;
use App\Order;
use App\Product;
use App\OrderStatus;
use App\OrderProduct;
use App\OrderHistory;
use App\OrderOption;
use App\Company;
use App\Plant;
use App\SubProduct;






class OrderController extends Controller
{
   

 


public function listOrder(Request $request){

    
			
            $status = $request->input('order_status');
	 		$order_id = $request->input('order_id');
	 		
	 		$from = $request->input('from');
             $to = $request->input('to');
	 		
	 		
		$orders = Order::OrderStatus($status)->OrderID($order_id)->BetweenDates($from,$to)->orderBy('created_at','desc')->get();
		
		$order_status=OrderStatus::where('status','=',1)->get();
		return view('admin.order.list', compact('orders','order_status'));
      
     


  }

public function showOrderDetail(Request $request,$id){

        	 $order=Order::where('id','=',$id)->first();
        	 
             $order_status=OrderStatus::where('status','=',1)->get();

			 
             if ($request->isMethod('get')) {

				return view('admin.order.detail',compact('order','order_status'));

			}
		
		}




 
public function createOrder(Request $request){

      
      $company=Company::where('id','=',1)->first();
	  $plants=Plant::where('status','=',1)->get();

  if ($request->isMethod('get')) {
      
     return view('admin.order.create',compact('company','plants'));

  }else{
			 
			/*
			echo"<pre>";
			print_r($request->all());
			exit;
			*/
			$errors      = false;
            $errorMsg    = array();
			
			
            $product_ids = $request->input('product_ids');
            $qty = $request->input('qty');
            $specification = $request->input('specification');
			$comment = $request->input('comment');
			$plant = $request->input('plant');
			$cust_id = $request->input('customer_id');
			
			
			
			
                $applicantMainInfo = array(
                'ProductId' => $product_ids,
				'Qty' => $qty,
				'Plant' => $plant,
				'CustId' => $cust_id,
				
                            );

         
            $appInfoValidate =  Validator::make($applicantMainInfo, array(
                'ProductId' =>   'required',
				'Qty' => 'required',
				'Plant' => 'required',
				'CustId' =>'required',
				
            ));


           if ($appInfoValidate->fails()) {
                $errors = true;
            }
           
           
            if ($errors) {


             
                $appInfoErrorMsg='';
if ($appInfoValidate->messages())
                    $appInfoErrorMsg = $appInfoValidate->messages();
				session()->flash('error', 'Please check the form for input values!');
return redirect()->back()->withInput($request->input())->with('OrderErrorMessage', $appInfoErrorMsg);

            }
           
            else {
             
					
					
										//for product option value table
					
					$customer = Customer::find($cust_id);
					
					$product_ids=array_unique(array_filter($product_ids));
					
					$count=count($product_ids);
					$result=array();
					 //count no of records
					 
					 

					 //place all in regular order
					 for ($i=0; $i < $count; $i++)
					 {
			 		 
					$result[$i]['product_id']=(isset($product_ids[$i])) ? $product_ids[$i]: '';
					$result[$i]['qty']=(isset($qty[$i])) ? $qty[$i]: '';
					$result[$i]['specification']=(isset($specification[$i])) ? $specification[$i]: '';
					$result[$i]['comment']=(isset($comment[$i])) ? $comment[$i]: '';

					}

					 
				
					
					 //insert order table
					 $order = Order::create(array(
                    'display_order_id' => '',
                    'created_by' => Auth::user()->id,
                    'user_id' => $customer->id,
					'plant' => $plant,
					'transaction_id' => 0,
					'comment' => '',
                    'order_status_id' => 8,
                     ));
					 
					  //insert order product table
					 foreach($result as $res)
							{
							$orderProduct = OrderProduct::create(array(
												'order_id' => $order->id,
												'user_id' => $order->user_id,
												'product_id' => $res['product_id'],
												'quantity' => $res['qty'],
												'specification' => $res['specification'],
												'comment' => $res['comment'],
												//'name' => \App\Product::getName($res['product_id']),
												'sku' => \App\SubProduct::getCode($res['product_id']),
												
											));

							}  
												
					 
 (isset($product_ids[$i])) ? $product_ids[$i]: '';
 
 
					//insert order history table
					 $orderHistory = OrderHistory::create(array(
                    'created_by' => Auth::user()->id,
					'order_id' => $order->id,
					'order_status_id' => $order->order_status_id,
                    'comment' => 'New Order',
					));
					
					if($request->input('create-order') <> '')
					
					{
					
					
					$order->display_order_id=$this->getDisplayOrderId($order,$customer);
					$order->transaction_id=$this->getDisplayOrderId($order,$customer);
					$order->order_status_id=1;
					
					}
					
					$order->save();
					
					
					
					
    

       return redirect()->route('admin.order.list')->with('success', 'Order Successfully Created!');

   }
     
    
   }
     
    }       


public function editOrder(Request $request,$id){

      
      $company=Company::where('id','=',1)->first();
	  $plants=Plant::where('status','=',1)->get();
	  $order=Order::where('id','=',$id)->first();

  if ($request->isMethod('get')) {
      
     return view('admin.order.edit',compact('company','plants','order'));

  }else{
			 
			/*
			echo"<pre>";
			print_r($request->all());
			exit;
			*/
			$errors      = false;
            $errorMsg    = array();
			
			
            $order_id = $request->input('order_id');
			$product_ids = $request->input('product_ids');
            $qty = $request->input('qty');
            $specification = $request->input('specification');
			$comment = $request->input('comment');
			$plant = $request->input('plant');
			$cust_id = $request->input('customer_id');
			
	
			
                $applicantMainInfo = array(
                'ProductId' => $product_ids,
				'Qty' => $qty,
				'Plant' => $plant,
				'CustId' => $cust_id,
				
                            );

         
            $appInfoValidate =  Validator::make($applicantMainInfo, array(
                'ProductId' =>   'required',
				'Qty' => 'required',
				'Plant' => 'required',
				'CustId' =>'required',
				
            ));


           if ($appInfoValidate->fails()) {
                $errors = true;
            }
           
           
            if ($errors) {


             
                $appInfoErrorMsg='';
if ($appInfoValidate->messages())
                    $appInfoErrorMsg = $appInfoValidate->messages();
				session()->flash('error', 'Please check the form for input values!');
return redirect()->back()->withInput($request->input())->with('OrderErrorMessage', $appInfoErrorMsg);

            }
           
            else {
             
					
					
										//for product option value table
					//$order=Order::where('id','=',$id)->first();
					
					$customer = Customer::find($cust_id);
					
					$product_ids=array_unique(array_filter($product_ids));
					
					$count=count($product_ids);
					$result=array();
					 
					$insert_order=array(
                    'display_order_id' => '',
                    'created_by' => Auth::user()->id,
                    'user_id' => $customer->id,
					'plant' => $plant,
					'transaction_id' => 0,
					'comment' => '',
                    'order_status_id' => 8,
                );
				
				$order_update=Order::where('id',$order_id)->update($insert_order);
					 
					 
				
					 //count no of records
if($count > 0)
 {
  OrderProduct::where('order_id',$id)->delete(); 
					 

					 //place all in regular order
					 for ($i=0; $i < $count; $i++)
					 {
			 		 
					$result[$i]['product_id']=(isset($product_ids[$i])) ? $product_ids[$i]: '';
					$result[$i]['qty']=(isset($qty[$i])) ? $qty[$i]: 1;
					$result[$i]['specification']=(isset($specification[$i])) ? $specification[$i]: '';
					$result[$i]['comment']=(isset($comment[$i])) ? $comment[$i]: '';

					}

				
					  //insert order product table
					 foreach($result as $res)
							{
							$orderProduct = OrderProduct::create(array(
												'order_id' => $order->id,
												'user_id' => $order->user_id,
												'product_id' => $res['product_id'],
												'quantity' => $res['qty'],
												'specification' => $res['specification'],
												'comment' => $res['comment'],
												//'name' => \App\Product::getName($res['product_id']),
												'sku' => \App\SubProduct::getCode($res['product_id']),
												
											));

							}  
												
 }		 
 
					//insert order history table
					 $orderHistory = OrderHistory::create(array(
                    'created_by' => Auth::user()->id,
					'order_id' => $order->id,
					'order_status_id' => $order->order_status_id,
                    'comment' => 'Edit Order',
					));
					
					if($request->input('create-order') <>'')
					
					{
					
					
					$order->display_order_id=$this->getDisplayOrderId($order,$customer);
					$order->transaction_id=$this->getDisplayOrderId($order,$customer);
					$order->order_status_id=1;
					$orderHistory->order_status_id=1;
					$orderHistory->save();
					
					}
					
					$order->save();
					
					
					
					
    

       return redirect()->route('admin.order.list')->with('success', 'Order Updated Successfully!');

   }
     
    
   }
     
    }       




public  function getDisplayOrderId($order,$customer){
	
	
	$date=\Carbon\Carbon::parse($order->created_at);
	$string=$date->isoFormat('YY/MM/DD');
	$first = strtok($string, ' ');
	return $customer->customer_code.'/'.$first.'/'.$order->id;
	
	
}

public  function deleteCustomer($id){

           
           

           Customer::where('id',$id)->delete();
           return redirect()->back()->with('success', 'Successfully Deleted!');
               


            } 


public static function generateReferenceCode()
    {
		
		
		
		$code ='';
		$customer = DB::table('customer')->max('id');
		
		$code='CUST000'.$customer;
		
		return $code;
		//exit;
		
		
	}	

public function editOrderStatus(Request $request){
        
             
			$order_id = $request->input('order_id');
			$order_status_id = $request->input('order_status_id');
            $notify = $request->input('notify');
	 		$comment = $request->input('comment');
			$schedule_date = $request->input('schedule_date');
			if($schedule_date)
				
				{
					$comment=$comment.'--'.$schedule_date;
				}
			 
			$history = OrderHistory::create(array(

                          'created_by' =>Auth::user()->id,
						  'order_id' =>$order_id,
                          'order_status_id'=>$order_status_id,
						  'notify'=>($notify ? $notify : 0),
                          'comment'=>$comment 
						  				  
                                     ));
	
			 
			 
			 
			 if($history)
			 {
				$order=Order::where('id','=',$history->order_id)->first();
				$order->order_status_id=$order_status_id;
				$order->schedule_date=$schedule_date;
				$order->save();
				return redirect()->back()->with('success', 'Order History Added!');
				
		
								
				
			 }else
				 
				 {
					 return redirect()->back()->with('error', 'Oops somehting wrong!');
					 
				 }

		}
		

	


}
	
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
//use App\Unit;


use DB;

class MaterialProductController extends Controller
{



	public function showProduct(Request $request)

    {




       $products = MaterialProduct::orderBy('created_at', 'desc')->get();

     return view('admin.material-product.list',compact('products'));

}



public function subCategoryProduct(Request $request,$id)

{

	$category=Category::find($id);
	$products=MaterialRelation::where('category_id','=',$id)->get();
	return view('admin.material-product.category-wise-relation-list',compact('products','category'));
	
}
public function getProduct(Request $request)

{

	$category_id = $request->parant_id;
	$products=Category::getMaterialProducts($category_id);
	$response = array();
		  foreach($products as $product){
			 $response[] = array("id"=>$product['id'],"name"=>$product['name']);
		  }

		  echo json_encode($response);
}

public function relation(Request $request,$id)

{
	$data['category']=Category::getRow($id);
	
	
	
	//$data['products']=Category::getMaterialProducts($id);
	$data['products']=MaterialProduct::all();
	
	if ($request->isMethod('get')) {

      //
	  return view('admin.material-product.relation',$data);     

    }else{
		
		/*
		echo"<pre>";
		print_r($request->all());
		exit;
		*/
		
			$category_id = $request->input('category_id');
			$product_ids = $request->input('product_id');
			$qty = $request->input('qty');
			
			
			$product_ids=array_unique(array_filter($product_ids));
					
					$count=count($product_ids);
					$result=array();
					 //count no of records
					 
					 

					 //place all in regular order
					 for ($i=0; $i < $count; $i++)
					 {
			 		 
					$result[$i]['product_id']=(isset($product_ids[$i])) ? $product_ids[$i]: '';
					$result[$i]['qty']=(isset($qty[$i])) ? $qty[$i]: '';
								

					}
					
					
					
					 foreach($result as $res)
							{
							
							$find=MaterialRelation::where('category_id','=',$category_id)->where('product_id','=',$res['product_id'])->first();
							
							if($find)
							{
								$find->qty=$res['qty'];
								$find->save();
								
							}else
								{
								
								$orderProduct = MaterialRelation::create(array(
													'category_id' => $category_id,
													'product_id' => $res['product_id'],
													'qty' => $res['qty']
													
													
												));
								}
							}

					 return redirect()->back()->with('success', 'Raw Metrial Relation Created Successfully!');
		
		
		
		
		
	}
	
	
}

public function getSupplierOrder(Request $request)

{

	$supplier_id = $request->supplier_id;
	$supplierOrders=PurchaseOrder::where('supplier_id','=',$supplier_id)
							->where('status','=',1)
							->get();
	
	
	
	$response = array();
		  foreach($supplierOrders as $order){
			 $display=Order::getDisplayOrderID($order->order_id);
			 $response[] = array("id"=>$order->id,"name"=>$display);
		  }

		  echo json_encode($response);
		  
	
}
public function getSupplierOrderProduct(Request $request)

{

	$order_id = $request->order_id;
	$data['products']=PurchaseOrderProduct::where('purchase_order_id','=',$order_id)
							->get();
	
	
	$returnHTML = view('admin.material-product.receiving-table',$data)->render();
	return response()->json(array('success' => 1, 'msg' => $returnHTML));
	
	
}

public function getPurchaseOrder(Request $request,$id)

{
	$data['suppliers']=Supplier::all();
    $data['orders']=Order::all();
	$order=PurchaseOrder::where('id','=',$id)->first();
	$data['products']=PurchaseOrderProduct::where('purchase_order_id','=',$order->id)
							->get();
							
	$data['order']=$order;
	
	return view('admin.material-product.request-raw-details',$data);     
	//$returnHTML = view('admin.material-product.receiving-table',$data)->render();
	//return response()->json(array('success' => 1, 'msg' => $returnHTML));
	
	
}


public function savePurchase(Request $request){
	
			/*
			echo"<pre>";
			print_r($request->all());
			exit;
			*/
			$supplier = $request->input('supplier');
			$order = $request->input('order');
			$order_date = $request->input('order_date');
			
			//$category = $request->input('category');
			$parent_id = $request->input('parent_id');
			$product_ids = $request->input('product_id');
			$qty = $request->input('qty');
			$remarks = $request->input('remarks');
			
			
			$product_ids=array_unique(array_filter($product_ids));
					
					$count=count($product_ids);
					$result=array();
					 //count no of records
					 
					 

					 //place all in regular order
					 for ($i=0; $i < $count; $i++)
					 {
			 		 
					$result[$i]['product_id']=(isset($product_ids[$i])) ? $product_ids[$i]: '';
					$result[$i]['qty']=(isset($qty[$i])) ? $qty[$i]: '';
					$result[$i]['parent_id']=(isset($parent_id[$i])) ? $parent_id[$i]: '';
					$result[$i]['remarks']=(isset($remarks[$i])) ? $remarks[$i]: '';
					

					}
					
					
					
					 foreach($result as $res)
							{
							
							$find=PurchaseOrderProduct::where('purchase_order_id','=',$order)->where('product_id','=',$res['product_id'])->first();
							
							$recieved_qty=PurchaseOrderProductRecieve::where('purchase_order_id','=',$order)->where('product_id','=',$res['product_id'])->sum('qty');
							
							$recieved_qty=(isset($recieved_qty)) ? $recieved_qty: 0;
							
							if($find->qty==($res['qty']+$recieved_qty))
							{
								$status=0;
							}else
							{
								$status=1;
							}
							
							
							if($res['qty'] > 0)
							{
							
							$orderProduct = PurchaseOrderProductRecieve::create(array(
												'purchase_order_id' => $order,
												'parent_id' => $res['parent_id'],
												'product_id' => $res['product_id'],
												'qty' => $res['qty'],
												'status' => $status,
												'remarks' => $res['remarks']
												
											));
											
							}

							}
							
							
							
							/*
							$check=PurchaseOrderProductRecieve::where('purchase_order_id','=',$order)->where('status','=',1)->first();
							
							if($check)
							{
								
							}else

							{
								$orderUpdate=PurchaseOrder::find($order);
								$orderUpdate->status=0;
								$orderUpdate->save();
							}								
							*/
							$this->updateRecord($order);
							

					 $purchaseOrder=PurchaseOrder::find($order);
					 
					 if($purchaseOrder->type=='PR')
						{
							return redirect()->route('admin.material.request.list')->with('success', 'Recieving Successfully Created!');
						
						}else if($purchaseOrder->type=='RS')
							
							{
								return redirect()->route('admin.material.purchase.list')->with('success', 'Recieving Successfully Created!');
								
							}else if($purchaseOrder->type=='JOB')
								
								{
								return redirect()->route('admin.material.request.jobwork.list')->with('success', 'Recieving Successfully Created!');
								}
					 
					 
					 //return redirect()->back()->with('success', 'Recieving Successfully Created!');
			
			
			
	
}
public function updateRecord($id){
	$purchaseOrder=PurchaseOrder::find($id);
	$orderProduct=PurchaseOrderProduct::where('purchase_order_id','=',$id)->get();
	
	foreach($orderProduct as $product)
	
	{
		$records=PurchaseOrderProductRecieve::where('purchase_order_id','=',$product->purchase_order_id)->where('product_id','=',$product->product_id)->get();
		
		$recieved=PurchaseOrderProductRecieve::where('purchase_order_id','=',$product->purchase_order_id)->where('product_id','=',$product->product_id)->sum('qty');
		
		foreach($records as $record)
		{
		
				if($recieved)
				{
					
					
					if($product->qty==$recieved)
					{
						$record->status=0;
						$record->save();
					}
				}
		
		}
		
	}
	
	
	$allRecords=PurchaseOrderProductRecieve::where('purchase_order_id','=',$product->purchase_order_id)->get();
	
	foreach($allRecords as $item)
	{
	   if($item->status==1)
	   {
		   break;
	   }else
	   {
		   
		   $purchaseOrder->status=0;
		   $purchaseOrder->save();
	   }
	}
	
	
}



public function requestRaw(Request $request){
	
   $data['suppliers']=Supplier::all();
   $data['orders']=Order::all();
   $data['main_category']=Category::getRootCategory();
   $data['products'] = MaterialProduct::orderBy('created_at', 'desc')->get();
   
    if ($request->isMethod('get')) {

      return view('admin.material-product.request-raw',$data);    

    }else{
		
		
			$supplier = $request->input('supplier');
			$order = $request->input('order');
			$order_date = $request->input('order_date');
			$type = $request->input('type');
			
			$category = $request->input('category');
			$parent_id = $request->input('parent_id');
			$product_ids = $request->input('product_id');
			$qty = $request->input('qty');
			
			
						
			
			$product_ids=array_unique(array_filter($product_ids));
					
					$count=count($product_ids);
					$result=array();
					
					 //place all in regular order
					 for ($i=0; $i < $count; $i++)
					 {
			 		 
					$result[$i]['product_id']=(isset($product_ids[$i])) ? $product_ids[$i]: '';
					$result[$i]['qty']=(isset($qty[$i])) ? $qty[$i]: '';
					$result[$i]['parent_id']=(isset($parent_id[$i])) ? $parent_id[$i]: '';
					

					}
					
					
					
					 //insert order table
					 $order = PurchaseOrder::create(array(
                    'order_id' => (isset($order)) ? json_encode($order): '',
                    'supplier_id' => (isset($supplier)) ? $supplier: 0,
					'purchase_order_date' => $order_date,
					'created_by' => Auth::user()->id,
                    'status' => 1,
					'type' => $type
                     ));
					
					
					 foreach($result as $res)
							{
							$orderProduct = PurchaseOrderProduct::create(array(
												'purchase_order_id' => $order->id,
												'parent_id' => $res['parent_id'],
												'product_id' => $res['product_id'],
												'qty' => $res['qty'],
												'status' => 1
												
											));

							}

					 
					 
					 
					 
					 if($order->type=='PR')
						{
							return redirect()->route('admin.material.request.list')->with('success', 'Raw Material Request Successfully Created!');
						
						}else if($order->type=='RS')
							
							{
								return redirect()->route('admin.material.purchase.list')->with('success', 'Purchase Request Successfully Created!');
								
							}else if($order->type=='JOB')
								
								{
								return redirect()->route('admin.material.request.jobwork.list')->with('success', 'Job Work Request Successfully Created!');
								}
					 
					 
					 
					 
					 
					 
					 
					 //return redirect()->back()->with('success', 'Raw Material Request Created Successfully!');
		
		
	}
   
   
}


public function requestRawList(Request $request){
	
   $data['suppliers']=Supplier::all();
   $data['orders']=Order::all();
   $data['main_category']=Category::getRootCategory();
   $data['products'] = MaterialProduct::orderBy('created_at', 'desc')->get();
   
   $data['orders'] = PurchaseOrder::where('type','=','PR')->orderBy('created_at', 'desc')->get();
   

      return view('admin.material-product.request-raw-list',$data);    

	}


public function dispatchRaw(Request $request){
   $data['suppliers']=Supplier::all();
   $data['orders']=Order::all();
   $data['main_category']=Category::getRootCategory();
   $data['products'] = MaterialProduct::orderBy('created_at', 'desc')->get();
   
    if ($request->isMethod('get')) {

     return view('admin.material-product.dispatch-raw',$data);    

    }else{
		
		
		
		
		
	}
}

public function requestJobWork(Request $request){
   $data['suppliers']=Supplier::all();
   $data['orders']=Order::all();
   $data['main_category']=Category::getRootCategory();
   $data['products'] = MaterialProduct::orderBy('created_at', 'desc')->get();
   
    if ($request->isMethod('get')) {

     return view('admin.material-product.request-jobwork',$data);    

    }else{
		
	//
		
	}
}
public function requestJobWorkList(Request $request){
	
   $data['suppliers']=Supplier::all();
   $data['orders']=Order::all();
   $data['main_category']=Category::getRootCategory();
   $data['products'] = MaterialProduct::orderBy('created_at', 'desc')->get();
   
   $data['orders'] = PurchaseOrder::where('type','=','JOB')->orderBy('created_at', 'desc')->get();
   

      return view('admin.material-product.request-jobwork-list',$data);    

	}
public function recieveJobWork(Request $request){
   $data['suppliers']=Supplier::all();
   $data['orders']=Order::all();
   $data['main_category']=Category::getRootCategory();
   $data['products'] = MaterialProduct::orderBy('created_at', 'desc')->get();
   
    if ($request->isMethod('get')) {

     return view('admin.material-product.receiving-jobwork',$data);    

    }else{
		
		
		
		
		
	}
}


public function purchase(Request $request){
   
   //$data['categories']=Category::getCategory();
   $data['suppliers']=Supplier::all();
   $data['orders']=Order::all();
   $data['main_category']=Category::getRootCategory();
   $data['products'] = MaterialProduct::orderBy('created_at', 'desc')->get();
    //$data['options']=MaterialOption::where('status','=',1)->get();
	//$data['categories']=SubProduct::orderBy('code','ASC')->get();
	
    
    if ($request->isMethod('post')) {

      //

    }else{

    return view('admin.material-product.purchase',$data);     
    }

    
    }
    

public function purchaseList(Request $request){
	
   $data['suppliers']=Supplier::all();
   $data['orders']=Order::all();
   $data['main_category']=Category::getRootCategory();
   $data['products'] = MaterialProduct::orderBy('created_at', 'desc')->get();
   
   $data['orders'] = PurchaseOrder::where('type','=','RS')->orderBy('created_at', 'desc')->get();
   

      return view('admin.material-product.purchase-list',$data);    

	}

	
	
	public function receiving(Request $request){
   
   $data['categories']=Category::getCategory();
   $data['suppliers']=Supplier::all();
   $data['orders']=Order::all();
   //$data['products'] = MaterialProduct::orderBy('created_at', 'desc')->get();
    //$data['options']=MaterialOption::where('status','=',1)->get();
	//$data['categories']=SubProduct::orderBy('code','ASC')->get();
	
    
    if ($request->isMethod('post')) {

      //

    }else{

    return view('admin.material-product.receiving',$data);     
    }

    
    }
    
 
public function saveReceiving(Request $request){
	
			/*
			echo"<pre>";
			print_r($request->all());
			exit;
			*/
			$supplier = $request->input('supplier');
			$order = $request->input('order');
			$recieve_order_date = $request->input('recieve_order_date');
			
			
			
			
			
					
					
					 //insert order table
					 $order = PurchaseOrderRecieve::create(array(
                    'order_id' => $order,
                    'supplier_id' => $supplier,
					'recieve_order_date' => $recieve_order_date,
					'created_by' => Auth::user()->id,
                    'status' => 1
                     ));
					
					
					
					 return redirect()->back()->with('success', 'Order Recieved!');
			
			
			
	
}

  
   public function createProduct(Request $request){
   
   //$data['categories']=Category::getCategory();
   $data['categories']= Category::getChildCategory();
    //$data['options']=MaterialOption::where('status','=',1)->get();
	//$data['categories']=SubProduct::orderBy('code','ASC')->get();
	
	
	
    
    if ($request->isMethod('post')) {

      
    
$name=$request->input('name');
$unit=$request->input('unit');
$quantity=$request->input('qty');



					$count=count($name);
					$result=array();
					 //count no of records
					 
					 

					 //place all in regular order
					 for ($i=0; $i < $count; $i++)
					 {
			 		 
					$result[$i]['name']=(isset($name[$i])) ? $name[$i]: '';
					$result[$i]['quantity']=(isset($quantity[$i])) ? $quantity[$i]: '';
					$result[$i]['unit']=(isset($unit[$i])) ? $unit[$i]: '';
					

					}
					
					
					 foreach($result as $res)
							{
							

							
							$product = MaterialProduct::create(array(
							   
								'name' =>$res['name'],
								'unit' => $res['unit'], 
								'quantity' => $res['quantity'],
								'status' =>1,
                   
                    
                ));
							
							
							
							
							
							}
         

			// return redirect()->back()->with('message', 'Product Successfully created!');
	return redirect()->route('admin.material.product.list')->with('success', 'Product Updated Successfully!');

             }else{

   

   

    return view('admin.material-product.create',$data);     
    }

    
    }
    
 

    public function editProduct(Request $request,$id){
            
            //$data['categories']=MaterialCategory::getCategory();
			$data['categories']=Category::getCategory();
            $data['product']=MaterialProduct::find($id);
           
            $product_cats=ProductToCategory::where('product_id',$id)->get();
            $data['product_cats']=[];
            foreach ($product_cats as $key => $product_cat) {
            $data['product_cats'][]=$product_cat->category_id;
            }
       
            if ($request->isMethod('post')) { 
 
            $errors      = false;
            $errorMsg    = array();   

$name=$request->input('name');
$unit=$request->input('unit');
$quantity=$request->input('quantity');
//$categories=$request->input('category_id');
$status=$request->input('status');







          $applicantMainInfo = array(
               'Name' => $name,
               //'MetaTitle' => $meta_title,
               'Unit' => $unit,
               'Quantity' => $quantity,
              // 'Categories'  =>  $categories,
                         

            );

          
            $appInfoValidate =  Validator::make($applicantMainInfo, array(
                 'Name'              =>   'required',
                 'Unit'   			=>   'required',
                 'Quantity'          =>   'required',
                 //'Categories'        =>   'required',
                    
            )); 


$insert_product=array(
                    'name' => $name,
                    'unit' => $unit, 
                    'quantity' => $quantity,
					'status' => $status
                );

// 

if ($appInfoValidate->fails()) {
                $errors = true;

            }
           
           
            if ($errors) {
 

              
                $appInfoErrorMsg='';
if ($appInfoValidate->messages())
                    $appInfoErrorMsg = $appInfoValidate->messages();
                    session()->flash('error', 'Please check the form values!');
return redirect()->back()->withInput($request->input())->with('ProducteditErrors', $appInfoErrorMsg);

            }
           
            else {
$product=MaterialProduct::where('id',$id)->update($insert_product);




 } 


 return redirect()->route('admin.material.product.list')->with('success', 'Product Updated Successfully!');
 

            }else{

            return view('admin.material-product.edit',$data);     
            }
            
    }


public static function array_to_obj($array, &$obj)
  {
    foreach ($array as $key => $value)
    {
          if (is_array($value))
          {
          $obj->$key = new \stdClass();
          self::array_to_obj($value, $obj->$key);
          }
          else
          {
            $obj->$key = $value;
          }
    }
  return $obj;
  }

public static function arrayToObject($array)
        {
         
         if($array)
         {
         $object= new \stdClass();
         return self::array_to_obj($array,$object);
         }
        }



}

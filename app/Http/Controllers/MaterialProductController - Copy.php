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
use App\PurchaseOrderRecieve;
use App\MaterialRelation;

use DB;

class MaterialProductController extends Controller
{



	public function showProduct(Request $request)

    {




       $products = MaterialProduct::orderBy('created_at', 'desc')->get();

     return view('admin.material-product.list',compact('products'));

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
	
	
	
	$data['products']=Category::getMaterialProducts($id);
	
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
	$supplierOrderProduct=PurchaseOrderProduct::where('purchase_order_id','=',$order_id)
							->get();
	
	
	
	$response = array();
		  foreach($supplierOrderProduct as $product){
			 
			 $name=MaterialProduct::getName($product->product_id);
			 
			 $response[] = array("id"=>$product->product_id,"name"=>$name,"qty"=>$product->qty);
			 //$response[] = array($product->product_id,$name,$product->qty);
			 
		  }

		  echo json_encode($response);
		  //echo $response;
		  
	
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
			
			$category = $request->input('category');
			$parent_id = $request->input('parent_id');
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
					$result[$i]['parent_id']=(isset($parent_id[$i])) ? $parent_id[$i]: '';
					

					}
					
					
					
					 //insert order table
					 $order = PurchaseOrder::create(array(
                    'order_id' => $order,
                    'supplier_id' => $supplier,
					'purchase_order_date' => $order_date,
					'created_by' => Auth::user()->id,
                    'status' => 1
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

					 return redirect()->back()->with('success', 'Purchase Order Successfully Created!');
			
			
			
	
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
    
	
	/*
	public function receiving(Request $request){
   
   $data['categories']=Category::getCategory();
   $data['suppliers']=Supplier::all();
   $data['orders']=Order::all();
   $data['products'] = MaterialProduct::orderBy('created_at', 'desc')->get();
    //$data['options']=MaterialOption::where('status','=',1)->get();
	//$data['categories']=SubProduct::orderBy('code','ASC')->get();
	
    
    if ($request->isMethod('post')) {

      //

    }else{

    return view('admin.material-product.receiving',$data);     
    }

    
    }
	*/
    
 public function receiving(Request $request)
    {

			
   $data['categories']=Category::getCategory();
   $data['suppliers']=Supplier::all();
   $data['orders']=Order::all();
   $data['products']='';
   //$data['products'] = MaterialProduct::orderBy('created_at', 'desc')->get();
			
			$order = $request->input('order');

              if ($request->isMethod('get')) {

               $order_product =[]; 

      
            }else{

      $data['products']=PurchaseOrderProduct::where('purchase_order_id','=',$order)
							->get();
     
        
               


            }
           //return view('admin.product.admin.received-rental-product',compact('order_product'));
       return view('admin.material-product.receiving',$data);     
}

public function receivedOrderProduct(Request $request)
    {

              
$id=$request->input('id');

              if ($request->isMethod('post')) {

              
      $order_products = ProductTransaction::find($id);

            
              $transaction = ProductTransaction::create(array(

                          'order_id' =>$order_products->order_id,
                          'product_id' =>$order_products->product_id,
                          'order_type'=>$order_products->order_type,
                          'serial' =>$order_products->serial,
                          'name' =>$order_products->name,
                          'sku' =>$order_products->sku,
                          'price' =>$order_products->price,
                          'shipping_method' =>'ups',
                          'awb' =>'2222222222',
                          'type' =>1,
						  'status' =>0,
                          'comment'=>'' 
                                     ));
									 
			
			//also update the status so it does not came in query again
			$order_products->status=0;
			$order_products->save();
			
			
			$product=ProductSerialType::where('product_id','=',$order_products->product_id)
									->where('serial_number','=',$order_products->serial)
									->first();
									
			if($product)
			{
			$product->status=3;
			$product->save();
			}
			
             if($transaction)
                return redirect()->back()->with('success', 'Product Recieved Successfully!');   

            }
          
       
}


  
   public function createProduct(Request $request){
   
   $data['categories']=Category::getCategory();
    //$data['options']=MaterialOption::where('status','=',1)->get();
	//$data['categories']=SubProduct::orderBy('code','ASC')->get();
	
    
    if ($request->isMethod('post')) {

      
    
            $errors      = false;
            $errorMsg    = array();
   
   



//general values
$name=$request->input('name');
$unit=$request->input('unit');
$quantity=$request->input('quantity');
$categories=$request->input('category_id');
$status=$request->input('status');




          $applicantMainInfo = array(
               'Name' => $name,
               //'MetaTitle' => $meta_title,
               'Unit' => $unit,
               'Quantity' => $quantity,
               'Categories'  =>  $categories,
                         

            );

          
            $appInfoValidate =  Validator::make($applicantMainInfo, array(
                 'Name'              =>   'required',
                 'Unit'   			=>   'required',
                 'Quantity'          =>   'required',
                 'Categories'        =>   'required',
                    
            )); 






 if ($appInfoValidate->fails()) {
                $errors = true;
            }
           
           
            if ($errors) {


              
                $appInfoErrorMsg='';
if ($appInfoValidate->messages())
                    $appInfoErrorMsg = $appInfoValidate->messages();
                      session()->flash('error', 'Please check the form values!');
return redirect()->back()->withInput($request->input())->with('ProductcreateErrors', $appInfoErrorMsg);

            }
           
            else {



$product = MaterialProduct::create(array(
                   
                    'name' => $name,
                    'unit' => $unit, 
                    'quantity' => $quantity,
					'status' => $status,
                   
                    
                ));

//product category data

foreach($categories as $category)
{
$productCategory = ProductToCategory::create(array(
                    'product_id' => $product->id,
                    'category_id' => $category
                ));

}

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
$categories=$request->input('category_id');
$status=$request->input('status');







          $applicantMainInfo = array(
               'Name' => $name,
               //'MetaTitle' => $meta_title,
               'Unit' => $unit,
               'Quantity' => $quantity,
               'Categories'  =>  $categories,
                         

            );

          
            $appInfoValidate =  Validator::make($applicantMainInfo, array(
                 'Name'              =>   'required',
                 'Unit'   			=>   'required',
                 'Quantity'          =>   'required',
                 'Categories'        =>   'required',
                    
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

//product category data
ProductToCategory::where('product_id',$id)->delete();
            
			foreach ($categories as $key => $category) {
					$insert_cat=ProductToCategory::create([
					'product_id'=>$id,
					'category_id'=>$category,
					]);
            }


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

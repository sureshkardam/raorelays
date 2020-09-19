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


class ProductController extends Controller
{



	public function showProduct(Request $request)

    {




       $products = Product::orderBy('created_at', 'desc')->get();

     return view('admin.product.list',compact('products'));

}

public function getProduct(Request $request)

{





$search = $request->q;
$products = Product::orderby('name','asc')->select('id','name')->where('name', 'like', '%' .$search . '%')->limit(5)->get();

$response = array();
      foreach($products as $product){
         $response[] = array("value"=>$product->id,"label"=>$product->name);
      }

      echo json_encode($response);
	 
     

     

}

public function getSubProduct(Request $request)

{



$product_id = $request->product_id;
$products = SubProduct::where('product_id', '=',$product_id)->limit(5)->get();
/*
$response = array();
      foreach($products as $product){
         $response[] = array("value"=>$product->id,"label"=>$product->code);
      }
*/


      echo json_encode($products);
	 
     

     

}




  
   public function createProduct(Request $request){
   
    $data['categories']=Category::getCategory();
    $data['options']=Option::where('status','=',1)->get();
    
    if ($request->isMethod('post')) {

      
    
            $errors      = false;
            $errorMsg    = array();
   
   



//general values
$name=$request->input('name');
$hsn_code=$request->input('hsn_code');
$sku=$request->input('sku');
$description=$request->input('description');
$status=$request->input('status');

 //for product option value table
$sub_product_code=$request->input('sub_product_code');
$sub_product_quantity=$request->input('sub_product_quantity');
$sub_product_description=$request->input('sub_product_description');
$count=count($sub_product_code);

$sub_product_code = array_filter($sub_product_code);
if (empty($sub_product_code)) {

return redirect()->back()->withInput($request->input())->with('error', 'Please check for sub product code and description');
	
}


          $applicantMainInfo = array(
               'Name' => $name,
               'Hsn' => $hsn_code,
			   'Sku' => $sku,
               'Description' => $description,
            
            );

          
            $appInfoValidate =  Validator::make($applicantMainInfo, array(
                 'Name'              =>   'required',
				 'Hsn'        		 =>   'required',
				 'Sku'               =>   'required',
                 'Description'  	 =>   'required',
                
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



$product = Product::create(array(
                   
                    'name' => $name,
                    'description' => $description,
                    'hsn_code' => $hsn_code,
                    'sku' => $sku,
                    'status' => $status
                ));



 $result=array();
 //count no of records
 

 //place all in regular order
 for ($i=0; $i < $count; $i++)
 {
 
$result[$i]['sub_product_code']=(isset($sub_product_code[$i])) ? $sub_product_code[$i]: '';
$result[$i]['sub_product_quantity']=(isset($sub_product_quantity[$i])) ? $sub_product_quantity[$i]: '';
$result[$i]['sub_product_description']=(isset($sub_product_description[$i])) ? $sub_product_description[$i]: '';

 }

 //insert option table
 

foreach($result as $res)
{   

$productOptionValue = SubProduct::create(array(
                    
'product_id' => $product->id,
'code' => $res['sub_product_code'],
'quantity' => $res['sub_product_quantity'],
'description' => $res['sub_product_description'],

                ));


}
//product option value end
//option  end
            }

    return redirect()->back()->with('message', 'Product Successfully created!');

    }else{

    return view('admin.product.create',$data);     
    }

    
    }
    
 

    public function editProduct(Request $request,$id){
            
            
            $data['product']=Product::find($id);
            $data['options']=Option::where('status','=',1)->get();
            $data['master_option_values']=OptionValue::all();
			
			$data['sub_products']=SubProduct::where('product_id','=',$id)->get();
			
           
          
       
            if ($request->isMethod('post')) { 
 
            $errors      = false;
            $errorMsg    = array();   

$name=$request->input('name');
$hsn_code=$request->input('hsn_code');
$sku=$request->input('sku');
$description=$request->input('description');
$status=$request->input('status');

 


 $applicantMainInfo = array(
               'Name' => $name,
               'Hsn' => $hsn_code,
			   'Sku' => $sku,
               'Description' => $description,
            
            );

          
            $appInfoValidate =  Validator::make($applicantMainInfo, array(
                 'Name'              =>   'required',
				 'Hsn'        		 =>   'required',
				 'Sku'               =>   'required',
                 'Description'  	 =>   'required',
                
            )); 

 


$insert_product=array(
                    'name' => $name,
                    'description' => $description,
                    'hsn_code' => $hsn_code,
                    'sku' => $sku,
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
$product=Product::where('id',$id)->update($insert_product);

 //for product option value table
$sub_product_code=$request->input('sub_product_code');
$sub_product_quantity=$request->input('sub_product_quantity');
$sub_product_description=$request->input('sub_product_description');

 $result=array();
 //count no of records
 $count=count($sub_product_code);
 
 //delete the old values
 if($count > 0)
 {
  SubProduct::where('product_id',$id)->delete();
  //end of deletion
  //place all in regular order
 for ($i=0; $i < $count; $i++)
 {
 
$result[$i]['sub_product_code']=(isset($sub_product_code[$i])) ? $sub_product_code[$i]: '';
$result[$i]['sub_product_quantity']=(isset($sub_product_quantity[$i])) ? $sub_product_quantity[$i]: '';
$result[$i]['sub_product_description']=(isset($sub_product_description[$i])) ? $sub_product_description[$i]: '';

 }

foreach($result as $res)
{   

$productOptionValue = SubProduct::create(array(
                    'product_id' => $id,
                    'code' => $res['sub_product_code'],
					'quantity' => $res['sub_product_quantity'],
					'description' => $res['sub_product_description'],
                ));


}
 
 }
 } 


 return redirect()->route('admin.product.list')->with('success', 'Product Updated Successfully!');
 

            }else{

            return view('admin.product.edit',$data);     
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

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
use App\MaterialProductToCategory;
use App\MaterialProductOption;
use App\MaterialProductOptionValue;
use App\OrderProduct;
use Validator;
use Auth;
use Illuminate\Support\Arr;
use App\Activity;

class MaterialProductController extends Controller
{



	public function showProduct(Request $request)

    {




       $products = MaterialProduct::orderBy('created_at', 'desc')->get();

     return view('admin.material-product.list',compact('products'));

}





  
   public function createProduct(Request $request){
   
    $data['categories']=MaterialCategory::getCategory();
    $data['options']=MaterialOption::where('status','=',1)->get();
    
    if ($request->isMethod('post')) {

      
    
            $errors      = false;
            $errorMsg    = array();
   
   



//general values
$name=$request->input('name');
$minimum_purchase=$request->input('minimum_purchase');
$hsn_code=$request->input('hsn_code');
$tax_rate=$request->input('tax_rate');
$quantity=$request->input('quantity');
$weight=$request->input('weight');
$sku=$request->input('sku');
$sort_order=$request->input('sort_order');
$description=$request->input('description');
$categories=$request->input('category_id');
$status=$request->input('status');

 //for product option value table
$option=$request->input('option');
$option_value=$request->input('option_value');
$count=count($option);

$option = array_filter($option);
if (empty($option)) {

return redirect()->back()->withInput($request->input())->with('error', 'Please check the option Tab, Options are Mandatory');
	
}


          $applicantMainInfo = array(
               'Name' => $name,
               //'MetaTitle' => $meta_title,
               'Description' => $description,
               'Quantity' => $quantity,
               'Sku' => $sku,
               'Weight' => $weight,
               'Categories'  =>  $categories,
                         

            );

          
            $appInfoValidate =  Validator::make($applicantMainInfo, array(
                 'Name'              =>   'required',
                 'Description'   =>   'required',
                 'Quantity'          =>   'required',
                 'Sku'               =>   'required',
                 'Weight'            =>   'numeric',
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
                    'description' => $description,
                    'quantity' => $quantity,
					'weight' => $weight,
                    'minimum_purchase' => $minimum_purchase,
                    'hsn_code' => $hsn_code,
                    'tax_rate' => $tax_rate,
                    'sku' => $sku,
                    'sort_order' => $sort_order ? $sort_order: '0',
                    'status' => $status
                ));

//product category data

foreach($categories as $category)
{
$productCategory = MaterialProductToCategory::create(array(
                    'product_id' => $product->id,
                    'category_id' => $category
                ));

}
//option start



 $result=array();
 //count no of records
 

 //place all in regular order
 for ($i=0; $i < $count; $i++)
 {
 
$result[$i]['option']=(isset($option[$i])) ? $option[$i]: '';
$result[$i]['option_value']=(isset($option_value[$i])) ? $option_value[$i]: '';

 }

 //insert option table
 
 $option=array_unique(array_filter($option));
 
 
 
 foreach($option as $option_id)
{



$productOption = MaterialProductOption::create(array(
                    'product_id' => $product->id,
                    'option_id' => $option_id
                ));


}   

//product option end
//product option value start

foreach($result as $res)
{   

$productOptionValue = MaterialProductOptionValue::create(array(
                    'product_option_id' => $productOption->id,
'product_id' => $product->id,
'option_id' => $res['option'],
'option_value_id' => $res['option_value'],

                ));


}
//product option value end
//option  end
            }

   // return redirect()->back()->with('message', 'Product Successfully created!');
	return redirect()->route('admin.material.product.list')->with('success', 'Product Updated Successfully!');

    }else{

    return view('admin.material-product.create',$data);     
    }

    
    }
    
 

    public function editProduct(Request $request,$id){
            
            $data['categories']=MaterialCategory::getCategory();
            $data['product']=MaterialProduct::find($id);
            $data['options']=MaterialOption::where('status','=',1)->get();
            $data['master_option_values']=MaterialOptionValue::all();
            $product_cats=MaterialProductToCategory::where('product_id',$id)->get();
            $data['product_cats']=[];
            foreach ($product_cats as $key => $product_cat) {
            $data['product_cats'][]=$product_cat->category_id;
            }
       
            if ($request->isMethod('post')) { 
 
            $errors      = false;
            $errorMsg    = array();   

//general values
$name=$request->input('name');
$minimum_purchase=$request->input('minimum_purchase');
$hsn_code=$request->input('hsn_code');
$tax_rate=$request->input('tax_rate');
$quantity=$request->input('quantity');
$weight=$request->input('weight');
$sku=$request->input('sku');
$sort_order=$request->input('sort_order');
$description=$request->input('description');
$categories=$request->input('category_id');
$status=$request->input('status');


 $applicantMainInfo = array(
               'Name' => $name,
               //'MetaTitle' => $meta_title,
               'Description' => $description,
               'Quantity' => $quantity,
               'Sku' => $sku,
               'Weight' => $weight,
               'Categories'  =>  $categories,
                         

            );

          
            $appInfoValidate =  Validator::make($applicantMainInfo, array(
                 'Name'              =>   'required',
                 'Description'   =>   'required',
                 'Quantity'          =>   'required',
                 'Sku'               =>   'required',
                 'Weight'            =>   'numeric',
                 'Categories'        =>   'required',
                    
            )); 

 


$insert_product=array(
                    'name' => $name,
                    'description' => $description,
                    'quantity' => $quantity,
					'weight' => $weight,
                    'minimum_purchase' => $minimum_purchase,
                    'hsn_code' => $hsn_code,
                    'tax_rate' => $tax_rate,
                    'sku' => $sku,
                    'sort_order' => $sort_order ? $sort_order: '0',
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
MaterialProductToCategory::where('product_id',$id)->delete();
            
			foreach ($categories as $key => $category) {
					$insert_cat=MaterialProductToCategory::create([
					'product_id'=>$id,
					'category_id'=>$category,
					]);
            }

//option start
 //for product option value table
$option=$request->input('option');
$option_value=$request->input('option_value');

 $result=array();
 //count no of records
 $count=count($option);
 
 //delete the old values
 if($count > 0)
 {
  MaterialProductOption::where('product_id',$id)->delete();
  //end of deletion
  //place all in regular order
 for ($i=0; $i < $count; $i++)
 {
 
$result[$i]['option']=(isset($option[$i])) ? $option[$i]: '';
$result[$i]['option_value']=(isset($option_value[$i])) ? $option_value[$i]: '';

 }

 //insert option table
$option=array_unique(array_filter($option));
 foreach($option as $option_id)
{



$productOption = MaterialProductOption::create(array(
                    'product_id' => $id,
                    'option_id' => $option_id
                ));


}   

//product option end
//product option value start


MaterialProductOptionValue::where('product_id',$id)->delete();
foreach($result as $res)
{   

$productOptionValue = MaterialProductOptionValue::create(array(
                    'product_option_id' => $productOption->id,
                     'product_id' => $id,
                     'option_id' => $res['option'],
					'option_value_id' => $res['option_value'],
                ));


}
 
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

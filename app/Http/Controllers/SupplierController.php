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
use App\Company;
use App\Plant;
use App\Supplier;






class SupplierController extends Controller
{
   

		
public function supplierList(Request $request){


   $suppliers = Supplier::all();


   return view('admin.supplier.index',compact('suppliers'));


    }



      public function createSupplier(Request $request){

     
			 
			  $errors      = false;
              $errorMsg    = array();
			 
			 
			 //$plant_id = $request->input('plant_id');
			 $name = $request->input('name');
			 $registered_address = $request->input('registered_address');
			
			 $mobile = $request->input('mobile');
			 $status = $request->input('status');
			 $description = $request->input('description');
           
             
			 
			 
			 
			  $applicantMainInfo = array(
                //'PlantId' => $plant_id,
				'Name' => $name,
				'RegisteredAddress' => $registered_address,
				'Mobile' => $mobile,
				
				 );
			 
			 
			 
			 $appInfoValidate =  Validator::make($applicantMainInfo, array(
                //'PlantId' =>   'required|string|min:1|max:250',
				'Name' =>   'required|string|min:1|max:250',
				
				'RegisteredAddress' => 'required|string|min:4|max:250',
				
				'Mobile' => 'required|numeric|digits:10',
				
            ));
			 
			if ($appInfoValidate->fails()) {
                $errors = true;
            }
           
           
            if ($errors) {


             
                $appInfoErrorMsg='';
if ($appInfoValidate->messages())
                    $appInfoErrorMsg = $appInfoValidate->messages();
				session()->flash('error', 'Please check the form values!');
return redirect()->back()->withInput($request->input())->with('CreatePlantErrors', $appInfoErrorMsg);

            }
           
            else { 
			 
			 
			 
			 
			 $supplier = Supplier::create(array(
                               'created_by'=>Auth::user()->id,
							   //'plant_id'=>$plant_id,
							   'supplier_name'=>$name,
							   'registered_address'=>$registered_address,
							   
							   'mobile'=>$mobile,
							   'description'=>$description,
                               'status'=>$status
                               
                              ));
           
       
             

     
     
      return redirect()->route('admin.supplier.list')->with('success', 'Supplier Successfully Created');
             

			}


    }


public function editSupplier(Request $request,$id){

         
			$errors      = false;
              $errorMsg    = array();
			
			$supplier = Supplier::find($id);
			//$plant_id = $request->input('plant_id');
			 $name = $request->input('name');
			 $registered_address = $request->input('registered_address');
			
			 $mobile = $request->input('mobile');
			 $status = $request->input('status');   
			 $description = $request->input('description');   
       

            
		$applicantMainInfo = array(
                //'PlantId' => $plant_id,
				'Name' => $name,
				'RegisteredAddress' => $registered_address,
				
				'Mobile' => $mobile,
				
				 );
			 
			 
			 
			 $appInfoValidate =  Validator::make($applicantMainInfo, array(
              
				'Name' =>   'required|string|min:1|max:250',
				'RegisteredAddress' => 'required|string|min:4|max:250',
				
				'Mobile' => 'required|numeric|digits:10',
				
            ));
			 
			if ($appInfoValidate->fails()) {
                $errors = true;
            }
           
           
            if ($errors) {


             
                $appInfoErrorMsg='';
if ($appInfoValidate->messages())
                    $appInfoErrorMsg = $appInfoValidate->messages();
				session()->flash('error', 'Please check the form values!');
return redirect()->back()->withInput($request->input())->with('CreatePlantErrors', $appInfoErrorMsg);

            }
           
            else { 






			//$plant->plant_id=$plant_id;
             $supplier->supplier_name=$name;
			 $supplier->registered_address=$registered_address;
			
			 $supplier->mobile=$mobile;
			 $supplier->status=$status;
			 $supplier->description=$description;
             $supplier->save();
       
             
          
         
           return redirect()->route('admin.supplier.list') ->with('success', 'Successfully Updated!');
			}

              }
			  
			  
public function getSupplier(Request $request)

{

$supplier_id = $request->supplierID;
$supplier = Supplier::where('id', '=', $supplier_id)->first()->toArray();

//$response = array();
      

      //return json_encode($plant);
	  return $supplier;

}

           

}
	
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






class CompanyController extends Controller
{
   

	public function companyList(Request $request)
    {

       $companies = Company::orderBy('created_at', 'desc')->get();
		return view('admin.company.list',compact('companies'));

	}

    



      public function createCompany(Request $request){
     
       $states=State::where('country_id','=',101)->get();
        
        if ($request->isMethod('get')) {

          return view('admin.company.create', compact('states')); 
          
        }else{ 
		
            $errors      = false;
            $errorMsg    = array();
            $company_name = $request->input('company_name');
            $company_code = $request->input('company_code');
           
			$mobile = $request->input('mobile');
			$telephone = $request->input('telephone');
			$registered_address = $request->input('registered_address');
			$city = $request->input('city');
			$state = $request->input('state');
			$country = $request->input('country');
			$zip_code = $request->input('zip_code');
			$website = $request->input('website');
			$gst = $request->input('gst');
			$tin = $request->input('tin');
			$excise_registration = $request->input('excise_registration');
			$company_range = $request->input('company_range');
			$company_division = $request->input('company_division');
			
			
			
			$status = $request->input('status');
			
			
           



                $applicantMainInfo = array(
                'CompanyName' => $company_name,
				'CompanyCode' => $company_code,
				'ContactNumber' => $mobile,
				'RegisteredAddress' => $registered_address,
				'City' => $city,
				'State' => $state,
				'Country' => $country,
				'ZipCode' => $zip_code,
				'ExciseRegistration' => $excise_registration,
				'CompanyRange' => $company_range,
				'CompanyDivision' => $company_division,
				'GST' => $gst,
				'TIN' => $tin,
				
                            );

         
            $appInfoValidate =  Validator::make($applicantMainInfo, array(
                'CompanyName' =>   'required|string|min:1|max:250',
				'CompanyCode' => 'required|string|min:1|max:250',
				'ContactNumber' => 'required|numeric|digits:10',
				'RegisteredAddress' => 'required|string|min:4|max:250',
				'City' => 'required|string|min:1|max:250',
				'State' => 'required|string|min:1|max:4',
				'Country' => 'required|string|min:1|max:4',
				'ZipCode' => 'required|string|max:6',
				'ExciseRegistration' => 'required|alpha_num|min:15|max:15',
				'CompanyRange' => 'required|string|min:4|max:250',
				'CompanyDivision' => 'required|string|min:4|max:250',
				
				'GST' => ['required', 'regex:/^([0-9]{2}[a-zA-Z]{4}([a-zA-Z]{1}|[0-9]{1})[0-9]{4}[a-zA-Z]{1}([a-zA-Z]|[0-9]){3}){0,15}$/'],
				
				'TIN' => 'required|numeric|digits:11',
              
            ));


           if ($appInfoValidate->fails()) {
                $errors = true;
            }
           
           
            if ($errors) {


             
                $appInfoErrorMsg='';
if ($appInfoValidate->messages())
                    $appInfoErrorMsg = $appInfoValidate->messages();
				session()->flash('error', 'Please check the form values!');
return redirect()->back()->withInput($request->input())->with('CompanyErrorMessage', $appInfoErrorMsg);

            }
           
            else {

           
            
             
            $data=array(  'company_name'=>$company_name,
							'company_id'=>$company_code,
							'mobile'=>$mobile,
							'telephone'=>$telephone,
							'registered_address'=>$registered_address,
							'city'=>$city,
							'state'=>$state,
							'country'=>$country,
							'zip_code'=>$zip_code,
							'website'=>$website,
							'gst'=>strtoupper($gst),
							'tin'=>$tin,
							'company_division'=>$company_division,
							'excise_registration'=>$excise_registration,
							'company_range'=>$company_range,
							'status'=>$status,
							'created_by'=>Auth::user()->id,
							
							
                          );
						
			
             Company::create($data);
             return redirect()->route('admin.company.list')->with('success', 'Successfully Created!');


              }

            }
          }


public function editCompany(Request $request,$id){

      $company = Company::find($id);
      //$countries=Country::all();
	  $states=State::where('country_id','=',101)->get();


  if ($request->isMethod('get')) {
      
     return view('admin.company.edit', compact('company','states'));

  }else{
			  $errors      = false;
              $errorMsg    = array();

			/*
			echo"<pre>";
			print_r($request->all());
			exit;
			*/
			
            $company_name = $request->input('company_name');
            $company_code = $request->input('company_code');
           
			$mobile = $request->input('mobile');
			$telephone = $request->input('telephone');
			$registered_address = $request->input('registered_address');
			$city = $request->input('city');
			$state = $request->input('state');
			$country = $request->input('country');
			$zip_code = $request->input('zip_code');
			$website = $request->input('website');
			$gst = $request->input('gst');
			$tin = $request->input('tin');
			$excise_registration = $request->input('excise_registration');
			$company_range = $request->input('company_range');
			$company_division = $request->input('company_division');
			$status = $request->input('status');


               
                $applicantMainInfo = array(
                'CompanyName' => $company_name,
				'CompanyCode' => $company_code,
				'ContactNumber' => $mobile,
				'RegisteredAddress' => $registered_address,
				'City' => $city,
				'State' => $state,
				'Country' => $country,
				'ZipCode' => $zip_code,
				'ExciseRegistration' => $excise_registration,
				'CompanyRange' => $company_range,
				'CompanyDivision' => $company_division,
				'GST' => $gst,
				'TIN' => $tin,
				
                            );

         
            $appInfoValidate =  Validator::make($applicantMainInfo, array(
                'CompanyName' =>   'required|string|min:1|max:250',
				'CompanyCode' => 'required|string|min:1|max:250',
				'ContactNumber' => 'required|numeric|digits:10',
				'RegisteredAddress' => 'required|string|min:4|max:250',
				'City' => 'required|string|min:1|max:250',
				'State' => 'required|string|min:1|max:4',
				'Country' => 'required|string|min:1|max:4',
				'ZipCode' => 'required|string|max:6',
				'ExciseRegistration' => 'required|alpha_num|min:15|max:15',
				'CompanyRange' => 'required|string|min:4|max:250',
				'CompanyDivision' => 'required|string|min:4|max:250',
				
				'GST' => ['required', 'regex:/^([0-9]{2}[a-zA-Z]{4}([a-zA-Z]{1}|[0-9]{1})[0-9]{4}[a-zA-Z]{1}([a-zA-Z]|[0-9]){3}){0,15}$/'],
				
				'TIN' => 'required|numeric|digits:11',
              
            ));


           if ($appInfoValidate->fails()) {
                $errors = true;
            }
           
           
            if ($errors) {


             
                $appInfoErrorMsg='';
if ($appInfoValidate->messages())
                    $appInfoErrorMsg = $appInfoValidate->messages();
				session()->flash('error', 'Please check the form values!');
return redirect()->back()->withInput($request->input())->with('CompanyErrorMessage', $appInfoErrorMsg);

            }
           
            else {
             
        
             $company->company_name= $company_name;
             $company->company_id= $company_code;
             
			 $company->mobile=$mobile;
			 $company->telephone=$telephone;
			 $company->registered_address=$registered_address;
			 $company->city=$city;
			 $company->state=$state;
			 $company->country=$country;
			 $company->zip_code=$zip_code;
			 $company->website=$website;
			 $company->gst=strtoupper($gst);
			 $company->tin=$tin;
			 
			 $company->excise_registration=$excise_registration;
			 $company->company_range=$company_range;
			 $company->company_division=$company_division;
			 
			 $company->status=1;
			 $company->save();
    

       return redirect()->route('admin.company.list')->with('success', 'Successfully Updated!');

   }
     
    
   }
     
    }       




		public  function deleteCompany($id){

           Company::where('id',$id)->delete();
           return redirect()->back()->with('success', 'Successfully Deleted!');
         
            } 


		
public function plantList(Request $request){


   $plants = Plant::all();


   return view('admin.company.plant',compact('plants'));


    }



      public function createPlant(Request $request){

     
			 
			  $errors      = false;
              $errorMsg    = array();
			 
			 
			 $plant_id = $request->input('plant_id');
			 $name = $request->input('name');
			 $registered_address = $request->input('registered_address');
			 $telephone = $request->input('telephone');
			 $mobile = $request->input('mobile');
			 $status = $request->input('status');
           
             
			 
			 
			 
			  $applicantMainInfo = array(
                'PlantId' => $plant_id,
				'Name' => $name,
				'RegisteredAddress' => $registered_address,
				'ContactNumber' => $telephone,
				'Mobile' => $mobile,
				 );
			 
			 
			 
			 $appInfoValidate =  Validator::make($applicantMainInfo, array(
                'PlantId' =>   'required|string|min:1|max:250',
				'Name' =>   'required|string|min:1|max:250',
				'RegisteredAddress' => 'required|string|min:4|max:250',
				'ContactNumber' => 'required|numeric|digits:10',
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
			 
			 
			 
			 
			 $plant = Plant::create(array(
                               'created_by'=>Auth::user()->id,
							   'plant_id'=>$plant_id,
							   'plant_name'=>$name,
							   'registered_address'=>$registered_address,
							   'telephone'=>$telephone,
							   'mobile'=>$mobile,
                               'status'=>$status
                               
                              ));
           
       
             

     
     
      return redirect()->route('admin.plant.list')->with('success', 'Plant Successfully Created');
             

			}


    }


public function editPlant(Request $request,$id){

         
			$errors      = false;
              $errorMsg    = array();
			
			$plant = Plant::find($id);
			$plant_id = $request->input('plant_id');
			 $name = $request->input('name');
			 $registered_address = $request->input('registered_address');
			 $telephone = $request->input('telephone');
			 $mobile = $request->input('mobile');
			 $status = $request->input('status');   
       

            
		$applicantMainInfo = array(
                'PlantId' => $plant_id,
				'Name' => $name,
				'RegisteredAddress' => $registered_address,
				'ContactNumber' => $telephone,
				'Mobile' => $mobile,
				 );
			 
			 
			 
			 $appInfoValidate =  Validator::make($applicantMainInfo, array(
                'PlantId' =>   'required|string|min:1|max:250',
				'Name' =>   'required|string|min:1|max:250',
				'RegisteredAddress' => 'required|string|min:4|max:250',
				'ContactNumber' => 'required|numeric|digits:10',
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






			$plant->plant_id=$plant_id;
             $plant->plant_name=$name;
			 $plant->registered_address=$registered_address;
			 $plant->telephone=$telephone;
			 $plant->mobile=$mobile;
			 $plant->status=$status;
             $plant->save();
       
             
          
         
           return redirect()->route('admin.plant.list') ->with('success', 'Successfully Updated!');
			}

              }
			  
			  
public function getPlant(Request $request)

{

$plant_id = $request->plantID;
$plant = Plant::where('id', '=', $plant_id)->first()->toArray();

//$response = array();
      

      //return json_encode($plant);
	  return $plant;

}

           

}
	
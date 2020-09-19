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






class CustomerController extends Controller
{
   

    
	
	public function getCustomer(Request $request)

{

$search = $request->q;
$customers = Customer::where('contact_name', 'like', '%' .$search . '%')->limit(5)->get();

$response = array();
      foreach($customers as $customer){
         $response[] = array(
		 
				"value"=>$customer->id,
				"label"=>$customer->contact_name,
				"email"=>$customer->email,
				"customer_code"=>$customer->customer_code,
				"telephone"=>$customer->telephone,
				"mobile"=>$customer->mobile,
				"registered_address"=>$customer->registered_address,
				"gst"=>$customer->gst,
				"tin"=>$customer->tin,
				"zip_code"=>$customer->zip_code,
				"city"=>$customer->city,
				"payment_terms"=>$customer->payment_terms,
				"mode_of_transport"=>$customer->mode_of_transport
				
				);
      }

      echo json_encode($response);

}

	public function customerList(Request $request)
    {




       $customers = Customer::orderBy('created_at', 'desc')->get();

//customer List 
     return view('admin.customer.list',compact('customers'));

}



public function activeCustomer(Request $request)
    {




       $customers = Customer::where('status','=',1)->orderBy('created_at', 'desc')->get();

//customer List 
     return view('admin.customer.active-list',compact('customers'));

}


public function archiveCustomer(Request $request)
    {




       $customers = Customer::where('status','=',2)->orderBy('created_at', 'desc')->get();

//customer List 
     return view('admin.customer.archive-list',compact('customers'));

}

    



      public function createCustomer(Request $request){
     
       $states=State::where('country_id','=',101)->get();
        
        if ($request->isMethod('get')) {

          return view('admin.customer.create', compact('states')); 
          
        }else{ 
		
		
		// echo(Auth::user()->id);
		// exit;
			



              $errors      = false;
              $errorMsg    = array();


            $contact_name = $request->input('contact_name');
            $customer_code = $request->input('customer_code');
            $email = $request->input('email');
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
			
			//$customer_hsn_code = $request->input('customer_hsn_code');
			$payment_terms = $request->input('payment_terms');
			$mode_of_transport = $request->input('mode_of_transport');
			
			
			
			$status = $request->input('status');
			//$notify = $request->input('notify');
			
           



                $applicantMainInfo = array(
                'CustomerName' => $contact_name,
				'CustomerCode' => $customer_code,
				'Email' => $email,
				'ContactNumber' => $mobile,
				//'AdditionalContactNumber' => $telephone,
				'RegisteredAddress' => $registered_address,
				'City' => $city,
				'State' => $state,
				'Country' => $country,
				'ZipCode' => $zip_code,
				//'Website' => $website,
				//'CustomerHsnCode' => $customer_hsn_code,
				'PaymentTerms' => $payment_terms,
				'ModeTransport' => $mode_of_transport,
				'GST' => $gst,
				'TIN' => $tin,
				
                            );

         
            $appInfoValidate =  Validator::make($applicantMainInfo, array(
                'CustomerName' =>   'required|string|min:1|max:250',
				'CustomerCode' => 'required|string|min:1|max:250',
				'Email' => 'email|unique:users',
				'ContactNumber' => 'required|numeric|digits:10',
				//'AdditionalContactNumber' => 'numeric|digits:10',
				'RegisteredAddress' => 'required|string|min:4|max:250',
				'City' => 'required|string|min:1|max:250',
				'State' => 'required|string|min:1|max:4',
				'Country' => 'required|string|min:1|max:4',
				'ZipCode' => 'required|string|max:6',
				//'Website' => 'required|string|min:4|max:250',
				//'CustomerHsnCode' => 'required|string|min:4|max:250',
				'PaymentTerms' => 'required|string|min:4|max:5000',
				'ModeTransport' => 'required|string|min:4|max:5000',
				
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
return redirect()->back()->withInput($request->input())->with('customerErrorMessage', $appInfoErrorMsg);

            }
           
            else {

           
            
             
            $data=array(  'contact_name'=>$contact_name,
							'customer_code'=>$customer_code,
							'email'=>$email,
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
							
							//'customer_hsn_code'=>$customer_hsn_code,
							'payment_terms'=>$payment_terms,
							'mode_of_transport'=>$mode_of_transport,
							
											
							'status'=>$status,
							//'notify'=>($notify ? $notify : '0'),
							'created_by'=>Auth::user()->id,
                         
                          );
						
			
             Customer::create($data);
             return redirect()->route('admin.customer.list')->with('success', 'Successfully Created!');


              }

            }
          }


public function editCustomer(Request $request,$id){

      $customer = Customer::find($id);
      //$countries=Country::all();
	  $states=State::where('country_id','=',101)->get();


  if ($request->isMethod('get')) {
      
     return view('admin.customer.edit', compact('customer','states'));

  }else{
			  $errors      = false;
              $errorMsg    = array();

			/*
			echo"<pre>";
			print_r($request->all());
			exit;
			*/
			
            $contact_name = $request->input('contact_name');
            $customer_code = $request->input('customer_code');
            $email = $request->input('email');
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
			$status = $request->input('status');
			//$notify = $request->input('notify');
           $payment_terms = $request->input('payment_terms');
			$mode_of_transport = $request->input('mode_of_transport');
			



               
                $applicantMainInfo = array(
                'CustomerName' => $contact_name,
				'CustomerCode' => $customer_code,
				'Email' => $email,
				'ContactNumber' => $mobile,
				//'AdditionalContactNumber' => $telephone,
				'RegisteredAddress' => $registered_address,
				'City' => $city,
				'State' => $state,
				'Country' => $country,
				'ZipCode' => $zip_code,
				//'Website' => $website,
				//'CustomerHsnCode' => $customer_hsn_code,
				'PaymentTerms' => $payment_terms,
				'ModeTransport' => $mode_of_transport,
				'GST' => $gst,
				'TIN' => $tin,
				
                            );

         
            $appInfoValidate =  Validator::make($applicantMainInfo, array(
                'CustomerName' =>   'required|string|min:1|max:250',
				'CustomerCode' => 'required|string|min:1|max:250',
				//'Email' => 'email|unique:users',
				'Email' => 'email|unique:customer,email,'.$customer->id,
				'ContactNumber' => 'required|numeric|digits:10',
				//'AdditionalContactNumber' => 'numeric|digits:10',
				'RegisteredAddress' => 'required|string|min:4|max:250',
				'City' => 'required|string|min:1|max:250',
				'State' => 'required|string|min:1|max:4',
				'Country' => 'required|string|min:1|max:4',
				'ZipCode' => 'required|string|max:6',
				//'Website' => 'required|string|min:4|max:250',
				//'CustomerHsnCode' => 'required|string|min:4|max:250',
				'PaymentTerms' => 'required|string|min:4|max:5000',
				'ModeTransport' => 'required|string|min:4|max:5000',
				'GST' => ['required', 'regex:/^([0]{1}[1-9]{1}|[1-2]{1}[0-9]{1}|[3]{1}[0-7]{1})([a-zA-Z]{5}[0-9]{4}[a-zA-Z]{1}[1-9a-zA-Z]{1}[zZ]{1}[0-9a-zA-Z]{1})+$/'],
				
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
return redirect()->back()->withInput($request->input())->with('customerErrorMessage', $appInfoErrorMsg);

            }
           
            else {
             
        
             
             $customer->contact_name= $contact_name;
             $customer->customer_code= $customer_code;
             $customer->email=$email;
			 $customer->mobile=$mobile;
			 $customer->telephone=$telephone;
			 $customer->registered_address=$registered_address;
			 $customer->city=$city;
			 $customer->state=$state;
			 $customer->country=$country;
			 $customer->zip_code=$zip_code;
			 $customer->website=$website;
			 $customer->gst=strtoupper($gst);
			 $customer->tin=$tin;
			 
			 $customer->payment_terms=$payment_terms;
			 $customer->mode_of_transport=$mode_of_transport;
			 
			 $customer->status=$status;
			 //$customer->notify=$notify;
			
         $customer->save();
    

       return redirect()->route('admin.customer.list')->with('success', 'Successfully Updated!');

   }
     
    
   }
     
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


}
	
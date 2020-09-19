<?php

namespace App\Http\Controllers;

//use Bitfumes\Multiauth\Model\Admin;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Country;
use App\State;
use App\City;
use App\OptionValue;
use App\Option;
use App\Clinic;
use App\PatientProfile;
use App\User;
use App\AssignClinic;
use App\AssignPatient;
use App\ProductSerialType;
use App\ProductTransferReport;
use Auth;
use App\Activity;







class AjaxController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    /*
    public function __construct()
    {
        $this->middleware('auth:admin');
        $this->middleware('role:super', ['only'=>'show']);
    }
*/
  
	
	
	
	public function updateUserStatus(Request $request) 
	{
		$id = $request->get('id');
       	$status = $request->get('status');
		
		$data=array();
		$user = User::where('id', '=', $id)->first();
		
		$user->status=$status;
		$user->save();
		$data[]=array('success'=>'1','msg'=>'User Status Changed!');
		return $data;
	}
	
	
	
   public function selectState(Request $request) {
       
	    $country_id = $request->get('country_id');
		$states=State::where('country_id','=', $country_id)->get();
        
		if($states)
           return $states;
    
        else
            return ['value'=>'No Match Found','key'=>''];
    }
	
	
	public function selectSingleState(Request $request) {
       
	    
		$state_name = $request->get('state_name');
		$state=State::where('name','=', $state_name)
						->where('country_id','=',38)
						->first();
        
		if($state)
           return $state;
    
        else
            return ['value'=>'No Match Found','key'=>''];
    }
	
	
	public function selectCity(Request $request) {
       
	    $state_id = $request->get('state_id');
		$city=City::where('state_id','=', $state_id)->get();
        
		if($city)
           return $city;
    
        else
            return ['value'=>'No Match Found','key'=>''];
    }
	
	  public function selectOptionList(Request $request) {
       
        $option_id = $request->get('option_id');
        $optionValue=OptionValue::where('option_id','=', $option_id)->get();

       
        
        if($optionValue)
           return $optionValue;
    
        else
            return ['value'=>'No Match Found','key'=>''];
    }
	
	
	public function bulkAssignClinic(Request $request) 
	{
    
			$result=array();
			$records=$request->input('data');
			$sales_agent_id=$request->input('sales_agent_id');
			$records =explode(',',$records);

			// echo"<pre>";
			// print_r($records);
			// exit;


			foreach($records as $record)

			{

				$find=Clinic::where('user_id','=',$record)->first();
					if($find)
					{
					$find->created_by=$sales_agent_id;
					$find->save();
					
					$out= AssignClinic::create(array(
						'clinic_id'=>$record,
                        'sales_agent_id'=>$sales_agent_id,
                        'assign_by'=>Auth::user()->id
                         
						));
					
					//saved
					
					}
			}


			$data[]=array('success'=>'1','msg'=>'Clinic Assigned to Sales Agent');
			return $data;
	} 
	
	public function bulkProductTransfer(Request $request) 
	{
			$result=array();
			$records=$request->input('data');
			$type=$request->input('type');
			$records =explode(',',$records);

			// echo"<pre>";
			// print_r($records);
			// exit;


			foreach($records as $record)
			{
				$find=ProductSerialType::where('id','=',$record)->first();
					if($find)
					{
					$old_product_type=$find->product_type; 	
					$find->product_type=$type;
					$find->save();
					
					$out= ProductTransferReport::create(array(
						'from'=>$old_product_type,
                        'to'=>$type,
                        'product_id'=>$find->product_id,
                        'serial_number'=>$find->serial_number,
                        'user_id'=>Auth::user()->id
                         
						));
					
					//saved
					
					}
			}


			$data[]=array('success'=>'1','msg'=>'Product Transfer to Sales Agent');
			return $data;
	} 

	public function bulkAssignPatient(Request $request) 
	{
    
			$result=array();
			$records=$request->input('data');
			$clinic_id=$request->input('clinic_id');
			$records =explode(',',$records);

			// echo"<pre>";
			// print_r($records);
			// exit;


			foreach($records as $record)

			{

				$find=PatientProfile::where('user_id','=',$record)->first();
					if($find)
					{
					$find->created_by=$clinic_id;
					$find->save();
					
					//save entry
					
					$out= AssignPatient::create(array(
						'patient_id'=>$record,
                        'clinic_id'=>$clinic_id,
                        'assign_by'=>Auth::user()->id
                         
						));
					
					//saved
					
					}
			}


			$data[]=array('success'=>'1','msg'=>'Patient Assigned to Clinic');
			return $data;
	} 
				


}

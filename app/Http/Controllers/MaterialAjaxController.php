<?php

namespace App\Http\Controllers;

//use Bitfumes\Multiauth\Model\Admin;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\MaterialOptionValue;
use App\MaterialOption;
use App\User;
use Auth;
use App\Activity;







class MaterialAjaxController extends Controller
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
  
	
	
	
	
	
	
   
	
	  public function selectOptionList(Request $request) {
       
        $option_id = $request->get('option_id');
        $optionValue=MaterialOptionValue::where('option_id','=', $option_id)->get();

       
        
        if($optionValue)
           return $optionValue;
    
        else
            return ['value'=>'No Match Found','key'=>''];
    }
	
	
	
}

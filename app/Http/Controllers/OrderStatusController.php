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
use App\OrderStatus;
use App\Activity;







class OrderStatusController extends Controller
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
     

    public function OrderStatusList(Request $request){


   $order_status = OrderStatus::all();


   return view('admin.order_status',compact('order_status'));


    }



      public function createOrderStatus(Request $request){

         
     //$user = User::where('id','=',Auth::user()->id)->first();
        
        if ($request->isMethod('get')) {
      
      // echo($user);
      // exit;

           return view('admin.order-status.create');
          
         }else{



             $errors      = false;
            $errorMsg    = array();
     

    
             $name = $request->input('name');
              $status = $request->input('status');
           

           $applicantMainInfo = array(
                'Name' => $name,
               
               
            );
            

            $appInfoValidate = Validator::make($applicantMainInfo, array(
                'Name' => 'required|string|min:4|max:250',
               
            ));
            if ($appInfoValidate->fails()) {
                $errors = true;
            }
           
            
            if ($errors) {
                $appInfoErrorMsg='';
                   if ($appInfoValidate->messages())
                    $appInfoErrorMsg = $appInfoValidate->messages();
                   session()->flash('error', 'Please check the form values!');
                  return Redirect::back()->withInput($request->input())->with('CreateOrderStatusErrors', $appInfoErrorMsg);
      
            }
            
            else {


               

                $order_status = OrderStatus::create(array(
                               'name'=>$name,
                               'status'=>$status
                               
                                      ));
           
       
             

     
     
      return redirect()->route('order.status.list')->with('success', 'Successfully Created');
              }

            }


    }


public function editOrderStatus(Request $request,$id){

         
     $order_status = OrderStatus::find($id);
        
        if ($request->isMethod('post')) {



            $errors      = false;
            $errorMsg    = array();
     

    
             $name = $request->input('name');
              $status = $request->input('status');
           

           $applicantMainInfo = array(
                'Name' => $name,
               
               
            );
            

            $appInfoValidate = Validator::make($applicantMainInfo, array(
                'Name' => 'required|string|min:4|max:250',
               
            ));
            if ($appInfoValidate->fails()) {
                $errors = true;
            }
           
            
            if ($errors) {
                $appInfoErrorMsg='';
                   if ($appInfoValidate->messages())
                    $appInfoErrorMsg = $appInfoValidate->messages();
                   session()->flash('error', 'Please check the form values!');
                  return Redirect::back()->withInput($request->input())->with('EditOrderStatusErrors', $appInfoErrorMsg);
      
            }
            
            else {


             $order_status->name=$name;
             $order_status->status=$status;
             $order_status->save();
       
             
          
         
           return redirect()->route('order.status.list') ->with('success', 'Successfully Updated!');
         

              }

            }


    }





 

        
       



     


              


}

<?php

namespace App\Http\Controllers;

//use Bitfumes\Multiauth\Model\Admin;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\User;
use App\UserRole;
use App\Role;
use App\Country;
use App\Permission;
use App\Patient;
use App\Attribute;
use Auth;
use Validator;
use App\Activity;






class AttributeController extends Controller
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
  

    public function showAttribute(Request $request)
    {




       $attribute = Attribute::all();

//Attribute List 
     return view('admin.attribute.list',compact('attribute'));

}

    



      public function createAttribute(Request $request){
     
         
        
        if ($request->isMethod('get')) {

          return view('admin.attribute.create');
          
        }else{ 
		
		
		// echo(Auth::user()->id);
		// exit;






              $errors      = false;
              $errorMsg    = array();


            $name = $request->input('name');
            $status = $request->input('status');
            $sort_order = $request->input('sort_order');
           



                $applicantMainInfo = array(
                'Name' => $name,
                            );

         
            $appInfoValidate =  Validator::make($applicantMainInfo, array(
                'Name' =>   'required|alpha',
                


            ));


           if ($appInfoValidate->fails()) {
                $errors = true;
            }
           
           
            if ($errors) {


             
                $appInfoErrorMsg='';
if ($appInfoValidate->messages())
                    $appInfoErrorMsg = $appInfoValidate->messages();
				session()->flash('error', 'Please check the form values!');
return redirect()->back()->withInput($request->input())->with('attributeErrorMessage', $appInfoErrorMsg);

            }
           
            else {

           
            
             
             $data=array('name'=>$name,
                         'sort_order'=>($sort_order ? $sort_order : '0'),
                         "status"=>$status,
                      
                          );


          
              Attribute::create($data);
             return redirect()->route('admin.attribute.list')->with('success', 'Successfully Created!');


              }

            }
          }


public function editAttribute(Request $request,$id){

      $attributes = Attribute::find($id);
      


  if ($request->isMethod('get')) {
      
     return view('admin.attribute.edit', compact('attributes'));

  }else{
 $errors      = false;
              $errorMsg    = array();


            $name = $request->input('name');
            $status = $request->input('status');
            $sort_order = $request->input('sort_order');
           



                $applicantMainInfo = array(
                'Name' => $name,
                            );

         
            $appInfoValidate =  Validator::make($applicantMainInfo, array(
                'Name' =>   'required|alpha',
                


            ));


           if ($appInfoValidate->fails()) {
                $errors = true;
            }
           
           
            if ($errors) {


             
                $appInfoErrorMsg='';
if ($appInfoValidate->messages())
                    $appInfoErrorMsg = $appInfoValidate->messages();
				session()->flash('error', 'Please check the form values!');
return redirect()->back()->withInput($request->input())->with('attributeErrorMessage', $appInfoErrorMsg);

            }
           
            else {
             
        
             
             $attributes->name= $name;
             $attributes->sort_order= $sort_order;
             $attributes->status=$status;
           
          
         $attributes->save();
    

       return redirect()->route('admin.attribute.list')->with('success', 'Successfully Updated!');

   }
     
    
   }
     
    }       

public  function deleteAttribute($id){

           
           

           Attribute::where('id',$id)->delete();
           return redirect()->back()->with('success', 'Successfully Deleted!');
               


            }    


}
	
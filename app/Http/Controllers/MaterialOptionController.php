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
use App\PatientProfile;
use App\Attribute;
use App\MaterialOption;
use App\MaterialOptionValue;

use Auth;
use App\Activity;






class MaterialOptionController extends Controller
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
  

    public function showOption(Request $request)

    {

                     $options=MaterialOption::all();

                     if ($request->isMethod('get')) {

          return view('admin.material-option.list',compact('options'));


        }

            else{


                 $options=MaterialOption::where('id','=',$id)->get(); 
//Attribute List 
     return view('admin.material-option.list',compact('options'));

}

}

    



      public function createOption(Request $request){
     
         
        
        if ($request->isMethod('get')) {

          return view('admin.material-option.create');
          
        }else{





           $validatedData = $request->validate([

         
      'name' => 'required',

      
        ]);
     
  

             $name = $request->input('name');
             $type = $request->input('type');
             $sort_order = $request->input('sort_order');
             $status = $request->input('status');

             $option_value_name = $request->input('option_value_name');
             // $option_value_file = $request->file('option_value_file'); 
             $option_value_sort_order = $request->input('option_value_sort_order');


             // echo "<pre>";
             // print_r($option_value_file);
             // exit;

             $count_option = count($option_value_name);

             // //  print_r($count_option);
             // // exit();


             $result = array();

           
            
             for ($i=0; $i < $count_option ; $i++) { 
               
               $result[$i]['option_value_name']=(isset($option_value_name[$i])) ? $option_value_name[$i] : "";
               // $result[$i]['option_value_file']=(isset($option_value_file[$i])) ? $option_value_file[$i] : "";
               $result[$i]['option_value_sort_order']=(isset($option_value_sort_order[$i])) ? $option_value_sort_order[$i] : "";

             }

         
         // echo "<pre>";
         // print_r($result);
         // exit;
            
             
           
            $option_create = MaterialOption::create(array('name'=>$name,
                                                'type'=>$type,
                                                 'sort_order'=>($sort_order ? $sort_order : '0'),
                                                 "status"=>$status));



      foreach($result as $option_value)
      
      {
    
     
      
       $OptionValue = MaterialOptionValue::Create(array(
                    'name' =>$option_value['option_value_name'],
                    'option_id' => $option_create->id,
                    // 'image' => $image_path,
                   'sort_order' => ($option_value['option_value_sort_order'] ? $option_value['option_value_sort_order'] : '0'),
          
                ));
     
      }


          
             
             return redirect()->route('admin.material.option.list')->with('success', 'Successfully Created!');


              }

           }



public function editOption(Request $request,$id){

     $option=MaterialOption::where('id','=',$id)->first();
    $optionValue=MaterialOptionValue::where('id','=',$id)->first();
      


  if ($request->isMethod('get')) {
      
     return view('admin.material-option.edit', compact('option','optionValue'));

  }else{
    
  
   $validatedData = $request->validate([
      'name' => 'required',
      
                    ]);


        
             
             $name = $request->input('name');

             // $type = $request->input('type');
             $sort_order = $request->input('sort_order');           
             $status = $request->input('status');





              $option_value_name = $request->input('option_value_name');
               $option_value_id = $request->input('option_value_id');
              // $option_value_file=$request->file('option_value_file');
              $option_value_sort_order = $request->input('option_value_sort_order');
            

                $count=count($option_value_name);
      $result=array();
      for ($i=0; $i < $count; $i++)
      {
      
      $result[$i]['option_value_name']=(isset($option_value_name[$i])) ? $option_value_name[$i]: '';
      $result[$i]['option_value_id']=(isset($option_value_id[$i])) ? $option_value_id[$i]: '';
      //$result[$i]['image']=(isset($option_value_file[$i])) ? $option_value_file[$i]: '';
      $result[$i]['option_value_sort_order']=(isset($option_value_sort_order[$i])) ? $option_value_sort_order[$i]: '';
    
      }


        
             
             $option->name= $name;
              $option->sort_order=($sort_order ? $sort_order: '0');
             $option->status=$status;
           
          
            $option->save();

            MaterialOptionValue::where('option_id','=',$option->id)->delete();
      
      

      foreach($result as $option_value)
      
      {
    
    
    if(!empty($option_value['option_value_id'])){
         $resOptionValue = MaterialOptionValue::Create(array(
                    'id'=>$option_value['option_value_id'],
                    'name' =>$option_value['option_value_name'],
                    'option_id' => $option->id,
          'sort_order' => ($option_value['option_value_sort_order'] ? $option_value['option_value_sort_order'] : '0'),
          
                ));

    }else{
          $resOptionValue = MaterialOptionValue::Create(array(
                   
                    'name' =>$option_value['option_value_name'],
                    'option_id' => $option->id,
          'sort_order' => ($option_value['option_value_sort_order'] ? $option_value['option_value_sort_order'] : '0'),
          
                ));

    }
      
     
      }
    

       return redirect()->route('admin.material.option.list')->with('success', 'Successfully Updated!');

   }
     
    
   }           

public  function deleteOption($id){

           
           

           MaterialOption::where('id',$id)->delete();
           MaterialOptionValue::where('option_id',$id)->delete();

           return redirect()->back()->with('success', 'Successfully Deleted!');
               


            } 



}

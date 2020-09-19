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
use App\Option;
use App\OptionValue;

use Auth;
use App\Activity;






class OptionController extends Controller
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

                     $options=Option::all();

                     if ($request->isMethod('get')) {

          return view('admin.option.list',compact('options'));


        }

            else{


                 $options=Option::where('id','=',$id)->get(); 
//Attribute List 
     return view('admin.option.list',compact('options'));

}

}

    



      public function createOption(Request $request){
     
         
        
        if ($request->isMethod('get')) {

          return view('admin.option.create');
          
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
            
             
           
            $option_create = Option::create(array('name'=>$name,
                                                'type'=>$type,
                                                 'sort_order'=>($sort_order ? $sort_order : '0'),
                                                 "status"=>$status));



      foreach($result as $option_value)
      
      {
    
     
      
       $OptionValue = OptionValue::Create(array(
                    'name' =>$option_value['option_value_name'],
                    'option_id' => $option_create->id,
                    // 'image' => $image_path,
                   'sort_order' => ($option_value['option_value_sort_order'] ? $option_value['option_value_sort_order'] : '0'),
          
                ));
     
      }


          
             
             return redirect()->route('admin.option.list')->with('success', 'Successfully Created!');


              }

           }



public function editOption(Request $request,$id){

     $option=Option::where('id','=',$id)->first();
    $optionValue=OptionValue::where('id','=',$id)->first();
      


  if ($request->isMethod('get')) {
      
     return view('admin.option.edit', compact('option','optionValue'));

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

            OptionValue::where('option_id','=',$option->id)->delete();
      
      

      foreach($result as $option_value)
      
      {
    
     // $image_path='';
     
     //  if($option_value['image'])
     //  {
     //  $image_path=$this->image_upload($option_value['image'],$option_value['option_value_name']);
     
     //  }
      
 /*       DB::table('users')
    ->updateOrInsert(
        ['email' => 'john@example.com', 'name' => 'John'],
        ['votes' => '2']
    );*/

    if(!empty($option_value['option_value_id'])){
         $resOptionValue = OptionValue::Create(array(
                    'id'=>$option_value['option_value_id'],
                    'name' =>$option_value['option_value_name'],
                    'option_id' => $option->id,
          'sort_order' => ($option_value['option_value_sort_order'] ? $option_value['option_value_sort_order'] : '0'),
          
                ));

    }else{
          $resOptionValue = OptionValue::Create(array(
                   
                    'name' =>$option_value['option_value_name'],
                    'option_id' => $option->id,
          'sort_order' => ($option_value['option_value_sort_order'] ? $option_value['option_value_sort_order'] : '0'),
          
                ));

    }
      
     
      }
    

       return redirect()->route('admin.option.list')->with('success', 'Successfully Updated!');

   }
     
    
   }           

public  function deleteOption($id){

           
           

           Option::where('id',$id)->delete();
           OptionValue::where('option_id',$id)->delete();

           return redirect()->back()->with('success', 'Successfully Deleted!');
               


            } 



  // public function image_upload($image,$option_name){
  //      $option_name=strtolower(str_replace(' ', '_', $option_name));
  //    $name = $option_name.'-'.time().'.'.$image->getClientOriginalExtension(); //get the  file extention
  //      $destinationPath = public_path('/option-image'); //public path folder dir
  //      $sucess=$image->move($destinationPath, $name);  //mve to destination you mentioned 
  //     if ($sucess) {
  //           return 'option-image/'.$name;
  //       }

  //       return NULL;

  //   }   


}

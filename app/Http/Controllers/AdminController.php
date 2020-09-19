<?php

namespace App\Http\Controllers;

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use Hash;
use Auth;
use DB;
use App\User;
use App\Userpersonal;
use App\Activity;

class AdminController extends Controller
{
    
   
	public function __construct()
    {
        $this->middleware('auth');
    }
	
	public function index()
    {
      
	  //return view('admin.index');	
	  return view('admin.index');
    }
	
	
	
	
	public function subAdminUserList(Request $request)
    {
      $users=User::where('user_type','=',2)->orderBy('created_at', 'desc')->get();
	  return view('admin.admin-user-list', compact('users')); 
    }
	
	
	public function allUserList(Request $request)
    {
      $users=User::where('user_type','<>',1)->orderBy('created_at', 'desc')->get();
	  return view('admin.all-user-list', compact('users')); 
    }
	
	
	
	
	public function salesUserList(Request $request)
    {
      $users=User::where('user_type','=',0)->orderBy('created_at', 'desc')->get();
	  return view('admin.sales-user-list', compact('users')); 
    }
	
	public function rawUserList(Request $request)
    {
      $users=User::where('user_type','=',3)->orderBy('created_at', 'desc')->get();
	  return view('admin.raw-user-list', compact('users')); 
    }
	
	public function productionUserList(Request $request)
    {
      $users=User::where('user_type','=',4)->orderBy('created_at', 'desc')->get();
	  return view('admin.production-user-list', compact('users')); 
    }
	
	
	public function editUser(Request $request,$id){

      $user = User::find($id);
      

  if ($request->isMethod('get')) {
      
     return view('admin.edit-user', compact('user'));

  }else{
			  $errors      = false;
              $errorMsg    = array();

			
            $name = $request->input('name');
            $email = $request->input('email');
			$employee_id = $request->input('employee_id');
			$contact_number = $request->input('contact_number');
           	$status = $request->input('status');
		
        $applicantMainInfo = array(
                'Name' => $name,
				'Email' => $email,
				'EmployeeId' => $employee_id,
				'ContactNumber' => $contact_number,
              );

         
            $appInfoValidate =  Validator::make($applicantMainInfo, array(
                'Name' =>   'required|string|min:1|max:250',
				'Email' => 'email||unique:users,email,'.$user->id,
				'EmployeeId' =>      'required',
                'ContactNumber' => 'required|numeric|digits:10',
				
            ));

           if ($appInfoValidate->fails()) {
                $errors = true;
            }
           
           
            if ($errors) {
             
                $appInfoErrorMsg='';
if ($appInfoValidate->messages())
                    $appInfoErrorMsg = $appInfoValidate->messages();
				session()->flash('error', 'Please check the form values!');
return redirect()->back()->withInput($request->input())->with('userErrorMessage', $appInfoErrorMsg);

            }
           
					else {
					 
				
					 
					 $user->name= $name;
					 $user->email= $email;
					 //$user->password=Hash::make($password);
					 $user->status=$status;
					 
					
					$user->save();
					
					$user->apPersonal->employee_id=$employee_id;
					$user->apPersonal->telephone=$contact_number;
					$user->apPersonal->save();
					
					//activity for edit users
					
					$activity=array( 'module'=>'user',
							'user_id'=>Auth::user()->id,
							'field_key'=>'id',
							'field_value'=>$user->id,
							'event'=>'edit',
							
					);
						  
					\App\Http\Controllers\ActivityController::save($activity); 
					
					//end activity for edit users
					
					
					//activity for archive users
					
					if($status==2)
					{
					$activity=array( 'module'=>'user',
							'user_id'=>Auth::user()->id,
							'field_key'=>'status',
							'field_value'=>$status,
							'event'=>'edit',
							
					);
						  
					\App\Http\Controllers\ActivityController::save($activity); 	
						
					}
					//end activity for archive users
					
					
					
					return redirect()->back()->with('success', 'User Successfully Updated!');
		   }
			 
    
			}
     
		}      




public function createUser(Request $request){

      
      

  if ($request->isMethod('get')) {
      
     return view('admin.create-user');

  }else{
			  $errors      = false;
              $errorMsg    = array();

			
            $name = $request->input('name');
            $email = $request->input('email');
			$employee_id = $request->input('employee_id');
			$contact_number = $request->input('contact_number');
			$user_type = $request->input('user_type');
           	$status = $request->input('status');
		
        $applicantMainInfo = array(
                'Name' => $name,
				'Email' => $email,
				'EmployeeId' => $employee_id,
				'ContactNumber' => $contact_number,
              );

         
            $appInfoValidate =  Validator::make($applicantMainInfo, array(
                'Name' =>   'required|string|min:1|max:250',
				'Email' => 'email|unique:users',
				'EmployeeId' =>      'required',
                'ContactNumber' => 'required|numeric|digits:10',
				
            ));

           if ($appInfoValidate->fails()) {
                $errors = true;
            }
           
           
            if ($errors) {
             
                $appInfoErrorMsg='';
if ($appInfoValidate->messages())
                    $appInfoErrorMsg = $appInfoValidate->messages();
				session()->flash('error', 'Please check the form values!');
return redirect()->back()->withInput($request->input())->with('userErrorMessage', $appInfoErrorMsg);

            }
           
					else {
					 
				
					 
					 $data=array(  'name'=>$name,
							'email'=>$email,
							'password'=>Hash::make('metabole1978'),
							'user_type'=>$user_type,
							'status'=>$status,
							
                          );
						  
						 
					$user=User::create($data);
					
					
					$personal = Userpersonal::create(array(
												'user_id' => $user->id,
												'employee_id' => $employee_id,
												'telephone' => $contact_number,
												
												 ));
					
					//activity for create users
					$activity=array( 'module'=>'user',
							'user_id'=>Auth::user()->id,
							'field_key'=>'id',
							'field_value'=>$user->id,
							'event'=>'create',
							
                          );
						  
					\App\Http\Controllers\ActivityController::save($activity);
					//end activity for create users
					
					
					return redirect()->back()->with('success', 'User Successfully Created!');
		   }
			 
    
			}
     
		} 


		public function changePassword(Request $request){

         
		 $user = User::where('id','=',Auth::user()->id)->first();
        
        if ($request->isMethod('get')) {
			
			// echo($user);
			// exit;

          return view('admin.change-password',compact('user'));
          
        }else{



			$errors      = false;
            $errorMsg    = array();
     

    
             //$full_name = $request->input('full_name');
             $password = $request->input('password');
             $confirm_password = $request->input('confirm_password');
           $applicantMainInfo = array(
                //'FullName' => $full_name,
				 'Password' => $password,
                'ConfirmPassword' => $confirm_password
            );
            
            $appInfoValidate = Validator::make($applicantMainInfo, array(
                //'FullName' => 'required|min:4|max:60',
				'Password' => 'required|min:6|max:60',
                'ConfirmPassword' => 'required|same:Password'
            ));
            if ($appInfoValidate->fails()) {
                $errors = true;
            }
           
            
            if ($errors) {
                $appInfoErrorMsg='';
            			 if ($appInfoValidate->messages())
                    $appInfoErrorMsg = $appInfoValidate->messages();
                 session()->flash('error', 'Please check the form values!');
			return Redirect::back()->withInput($request->input())->with('adminProfileErrors', $appInfoErrorMsg);
			
            }
            
            else {
            
             //$user->name=$full_name;
			  $user->password=Hash::make($password);
			   $user->save();
			 
				$activity=array( 'module'=>'user',
							'user_id'=>Auth::user()->id,
							'field_key'=>'id',
							'field_value'=>$user->id,
							'event'=>'change-password',
							
                  );
						  
					\App\Http\Controllers\ActivityController::save($activity); 
            
			session()->flash('success', 'Successfully Updated!');
			return redirect()->back();

              }

            }


	  }


		

}

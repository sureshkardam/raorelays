<?php
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use Redirect;
use Hash;
use Auth;
use DB;
use App\User;
use App\Userpersonal;
use App\Activity;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Default Auth Controller
    |--------------------------------------------------------------------------
    |
    | You may wish to use controllers instead of, or in addition to, Closure
    | based routes. That's great! Here is an example controller method to
    | get you started. To route to this controller, just add the route:
    |
    |    Route::get('/', 'AuthController@');
    |
    */

    
	
	
  	public function login(Request $request)
    {
        if ($request->isMethod('get')) {
					
					return view('auth.login');	
					
		}else
		{
			
            
			
			
			$email     =$request->input('email');
		    $password = $request->input('password');
		    $input    = array(
                'Email' => $email,
                'Password' => $password
              
            );
            
            $errors='';
            $validate1 = Validator::make($input, array(
                'Email' => 'required|min:5|max:120',
                'Password' => 'required|min:5|max:60'
            ));
            if ($validate1->fails()) {
                $errors = true;
            }
           
            
            if ($errors) {
				$appInfoErrorMsg='';
            if ($validate1->messages())
                    $validate1ErrorMsg = $validate1->messages();
			return Redirect::back()->withInput($request->input())->with('appLoginPageErrors', $validate1ErrorMsg);
			} else {
            $user_email = User::where('email', '=', $email)->first();
               
                if ($user_email && $user_email->valid=='1') {
					
					
                    
					 if (Hash::check($password, $user_email->password)) {
                       
                      
                        Auth::login($user_email);
							
						//event
						$event_description= 'User Login : '.Auth::user()->name;
						\App\Http\Controllers\ActivityController::createEvent('User',Auth::user()->id,'Login',$event_description); 
						//event end
						
						
						
						
						
						if(Auth::user()->user_type =='1')
						{
							
										//return redirect()->route('admin.home');
										return redirect()->route('admin.home')->with('success', 'Welcome!');
										//return view('admin.index');
										
						
						}else if(Auth::user()->user_type =='2')
						{
						return redirect()->route('sub-admin.home')->with('success', 'Welcome!');
						}else if(Auth::user()->user_type =='0')
						{
						return redirect()->route('sales.home')->with('success', 'Welcome!');
							
						}else if(Auth::user()->user_type =='3')
						{
						
						return redirect()->route('raw.home')->with('success', 'Welcome!');
							
						} else if(Auth::user()->user_type =='4')
						{
						
						return redirect()->route('production.home')->with('success', 'Welcome!');
							
						}					
						else {
                    
				
				session()->flash('credential_error_page', 'Please check the email and password.');
    			return redirect()->back();
				
						}
                
                
						}else
						{
						session()->flash('error', 'Please check the email and password.');
						return redirect()->back();
						}
				}else
					
					{
						session()->flash('error', 'Please check the email and password.');
						return redirect()->back();
					}
			}
  	
		}
		
	}
		
		
	
	public function changePass(Request $request)
    {
       
			 $id     = Auth::user()->id;
			$user   = User::where('id', '=', $id)->first();
			
			$errors      = false;
            $errorMsg    = array();
            //print_r($request->input());
            $password    = $request->input('password');
			
            $reenterpass = $request->input('passwordConfirm');
            
            
            $applicantMainInfo = array(
                'Password' => $password,
                'ConfirmPassword' => $reenterpass
            );
            
            $appPersonalValidate = Validator::make($applicantMainInfo, array(
                'Password' => 'required|min:5|max:60',
                'ConfirmPassword' => 'required|same:Password'
            ));
             if ($appPersonalValidate->fails()) {
                $errors = true;
            }
			
			if ($errors) {
                $appPersoanlErrorMsg = '';
                
                if ($appPersonalValidate->messages())
                    $appPersoanlErrorMsg = $appPersonalValidate->messages();
                
                
               
				Session::flash('error', 'There are errors on this page. Please review them!');
                return Redirect::back()->withInput($request->input())->with('appPersoanlErrors', $appPersoanlErrorMsg);
               
            } else {
                
               
                    $user->password = Hash::make($password);
                   
                    
                    $user->save();
                    
                    Session::flash('success', 'Your password has been reset. You can now login with your new password');
					return Redirect::back();			
					
                } 
                
          
            
       
    }
    
    public function changeEmail(Request $request)
    {
       
			
			 $id     = Auth::user()->id;
			$user   = User::where('id', '=', $id)->first();
			$errors      = false;
            $errorMsg    = array();
            //print_r($request->input());
            $email    = $request->input('email');
			
            $reenteremail = $request->input('emailConfirm');
            
            
            $applicantMainInfo = array(
                'Email' => $email,
                'ConfirmEmail' => $reenteremail
            );
            
            $appPersonalValidate = Validator::make($applicantMainInfo, array(
                'Email' => 'unique:users,email|required|email',
                'ConfirmEmail' => 'required|same:Email'
            ));
            if ($appPersonalValidate->fails()) {
                $errors = true;
            }
			
			if ($errors) {
                $appPersoanlErrorMsg = '';
                
                if ($appPersonalValidate->messages())
                    $appPersoanlErrorMsg = $appPersonalValidate->messages();
                
                
               
				Session::flash('error', 'There are errors on this page. Please review them!');
                return Redirect::back()->withInput($request->input())->with('appPersoanlErrors', $appPersoanlErrorMsg);
               
            } else {
				$user->email = $email;
                $user->save();
               
                    Session::flash('success', 'Your email has been reset. You can now login with your new email');
					return Redirect::back();			
					
                } 
                
         
            
       
    }
    
    public function forgotPassword(Request $request)
    {
       if ($request->isMethod('get')) {
            return view('forgot-password');
        } else {
            $email     = $request->input('email');
            $input     = array(
                'Email' => $email
            );
            $validator = Validator::make($input, array(
                'Email' => 'required|email'
            ));
            if ($validator->fails()) {
                $errors = $validator->messages();
                return Redirect::back()->withErrors($errors);
            } else {
                $find = User::where('email', '=', $email)->first();
                if ($find) {
                    
                                
					$randString = $this->random_str(60);
                    
                    $find->valid         = '0';
                    $find->reset_profile = $randString;
                    $find->save();
                    
                    Mail::send('emails.auth.resetPassword', array(
                       'user' => $find
                   ), function($message) use ($find)
                    {
                        $message->to($find->email, 'Gazebo Tv')->subject('Gazebo Password Reset');
                    });
                    
					
					
					Session::flash('success', 'An email has been sent to you, which will allow you to reset your password');
                    return Redirect::back();
					
                } else {
                    Session::flash('error', 'Sorry we were not able to find ( ' . $email . ')record in our database.');
                    return Redirect::back();
                }
            }
        }
    }
	
	 public function delAccount(Request $request)
    {
       if ($request->isMethod('get')) {
            return view('delete-account');
        } else {
				if(Auth::check() && Auth::user()->user_type =='0')
			{	
				$id     = Auth::user()->id;
				$find = User::where('id', '=', $id)->first();
				$find->valid='0';
				$find->save();
				//Session::flash('success', 'Your Account is Deleted on Your Request , Now Redirecting to Home');
                return redirect()->route('logout');
				
			}
			
			}
    }
    

public function resetPassword(Request $request,$val)
    {
     
	
	$user = User::where('reset_profile', '=', $val)->first();
    if ($request->isMethod('get')) {
            
                   
        if ($find) {
                return view('reset-password',compact('user'));
            } else {
                Session::flash('error', 'That URL does not exist');
                 return redirect()->route('forgot-password');
				//return Redirect::back();
				//return redirect()->route('jobseekers');
            }
        } else {
            //save the reset password
            $errors      = false;
            $errorMsg    = array();
            //print_r(Input::all());
           
			
			
			
			$password    =  $request->input('password');
            $reenterpass = $request->input('passwordConfirm');
            
            
            $applicantMainInfo = array(
                'Password' => $password,
                'ConfirmPassword' => $reenterpass
            );
            
            $appInfoValidate = Validator::make($applicantMainInfo, array(
                'Password' => 'required|min:5|max:60',
                'ConfirmPassword' => 'required|same:Password'
            ));
            if ($appInfoValidate->fails()) {
                $errors = true;
            }
            if ($errors) {
                
                Session::flash('error', 'There are errors on this page. Please review them');
                return Redirect::back()->withErrors($appInfoValidate);
            } else {
               
               
			   
                $user = User::where('reset_profile', '=', $val)->first();
                
				
                               
                if ($user) {
                    $user->password = Hash::make($password);
                    $user->reset_profile = '';
                    $user->valid         = '1';
                    $user->save();
                    
					
					
                    Session::flash('success', 'Your password has been reset. You can now login with your new password');
                 	return redirect()->route('/');
					
                } else {
                    Session::flash('error', 'Something went wrong. Please try again. ');
                    return redirect()->route('forgot-password');
                }
            }
            
        }
    }



public function random_str($length, $keyspace = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ')
{
    $str = '';
    $max = mb_strlen($keyspace, '8bit') - 1;
    for ($i = 0; $i < $length; ++$i) {
        $str .= $keyspace[random_int(0, $max)];
    }
    return $str;
}




}

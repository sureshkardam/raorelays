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

class ActivityController extends Controller
{
    
   
	public function __construct()
    {
        $this->middleware('auth');
    }
	
	public static function save($data)
    {
      $activity=Activity::create($data);
	  
    }
	
	
	public function list(Request $request)
    {
      $activities=Activity::all();
	  return view('admin.activity.list', compact('activities'));
	  
	  
	  
    }
	
	public function userlist(Request $request)
    {
      $activities=Activity::where('module','=','user')->get();
	  return view('admin.activity.user-list', compact('activities'));
	  
	  
	  
    }
	public function productlist(Request $request)
    {
      $activities=Activity::where('module','=','product')->get();
	  return view('admin.activity.product-list', compact('activities'));
	  
	  
	  
    }
	public function orderlist(Request $request)
    {
      $activities=Activity::where('module','=','order')->get();
	  return view('admin.activity.order-list', compact('activities'));
	  
	  
	  
    }
	
	
	
	

}

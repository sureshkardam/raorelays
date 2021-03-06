<?php
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

class SalesUserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('sales-user.index');
    }
	
	
	public function orderList()
    {
        return view('sales-user.index');
    }
	
	public function createOrder()
    {
        return view('sales-user.index');
    }
	
	
	public function editOrder()
    {
        return view('sales-user.index');
    }
	
}

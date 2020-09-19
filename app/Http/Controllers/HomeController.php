<?php
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use Hash;
use Auth;
use DB;
use Session;
use App\User;
use App\Userpersonal;



use App\State;
use App\Order;

use App\Option;
use App\Product;

use App\Category;

use App\OptionValue;

use App\OrderStatus;
use App\OrderProduct;
use App\CategoryPath;
use App\ProductOption;

use App\ProductToCategory;
use App\Customer;
use App\Activity;




use App\MaterialProduct;
use App\MaterialProductOption;
use App\MaterialCategory;
use App\MaterialCategoryPath;
use App\MaterialProductToCategory;
use App\MaterialOption;
use App\MaterialOptionValue;



class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    
	/*
	
	public function __construct()
    {
        $this->middleware('auth');
    }
	
	*/

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
		
    }
	
	public function logoutUser()
    {
        if (Auth::check()) {
          
		  	
			Session::flush();
		    Auth::logout();
			
            return redirect()->route('home');
        
        }
    }
	
	
	public function deleteRecord(Request $request){ 
			
			
			$type = $request->input('type');
			$id = $request->input('id');
			
			
	
			switch($type)
				{
				

                    case 'product' :

                                 //$products = OrderProduct::where('product_id','=',$id)->get();
                           
                          // if($products->count() > 0)
                            // return response()->json(array('error' => 0, 'msg' => 'Could Not Delete,This Product is in the Order list!'));

					                           
							  
                              $product=Product::where('id',$id)->first();


                            
                              //ProductSerialType::where('product_id',$id)->delete();

                             
                             $product->getOptions()->delete();
                             $product->getOptionValues()->delete();
                             $product->getCategories()->delete();
                             $product->delete();

								   return response()->json(array('success' => 1, 'msg' => 'Successfully Deleted!'));
						            
						            break;	

                    case 'category' :


                                 if($id==1 || $id==2)
                                 return response()->json(array('error' => 0, 'msg' => 'Root Category deletion not allowed!'));
			                     
                                   $productExist=ProductToCategory::where('category_id','=',$id)->get();
		                           if($productExist->count() > 0)
		                           return response()->json(array('error' => 0, 'msg' => 'Sorry!, Product are associated with this category!'));

		                          CategoryPath::where('category_id',$id)->delete();
			                      Category::where('id',$id)->delete();
                                  
                  
								   return response()->json(array('success' => 1, 'msg' => 'Successfully Deleted!'));
						            
						            break;	
                    

                   case 'option-main' :


                              $options = ProductOption::where('option_id','=',$id)->get();

                           if($options->count() > 0)
                             return response()->json(array('error' => 0, 'msg' => 'Could Not Delete,There Are Option Associated With Product!'));

					                           
							  
                              OptionValue::where('option_id',$id)->delete();
                              Option::where('id',$id)->delete();

								   return response()->json(array('success' => 1, 'msg' => 'Successfully Deleted!'));
						            
						            break;	
					//material code
					
					case 'material-product' :

                                 //$products = OrderProduct::where('product_id','=',$id)->get();
                           
                          // if($products->count() > 0)
                            // return response()->json(array('error' => 0, 'msg' => 'Could Not Delete,This Product is in the Order list!'));

					                           
							  
                              $product=MaterialProduct::where('id',$id)->first();


                            
                              //ProductSerialType::where('product_id',$id)->delete();

                             
                             $product->getOptions()->delete();
                             $product->getOptionValues()->delete();
                             $product->getCategories()->delete();
                             $product->delete();

								   return response()->json(array('success' => 1, 'msg' => 'Successfully Deleted!'));
						            
						            break;	

                    case 'material-category' :


                                 if($id==1 || $id==2)
                                 return response()->json(array('error' => 0, 'msg' => 'Root Category deletion not allowed!'));
			                     
                                   $productExist=MaterialProductToCategory::where('category_id','=',$id)->get();
		                           if($productExist->count() > 0)
		                           return response()->json(array('error' => 0, 'msg' => 'Sorry!, Product are associated with this category!'));

		                          MaterialCategoryPath::where('category_id',$id)->delete();
			                      MaterialCategory::where('id',$id)->delete();
                                  
                  
								   return response()->json(array('success' => 1, 'msg' => 'Successfully Deleted!'));
						            
						            break;	
                    

                   case 'material-option-main' :


                              $options = MaterialProductOption::where('option_id','=',$id)->get();

                           if($options->count() > 0)
                             return response()->json(array('error' => 0, 'msg' => 'Could Not Delete,There Are Option Associated With Product!'));

					                           
							  
                              MaterialOptionValue::where('option_id',$id)->delete();
                              MaterialOption::where('id',$id)->delete();

								   return response()->json(array('success' => 1, 'msg' => 'Successfully Deleted!'));
						            
						            break;
					
					// end of material code


                     case 'customer' :


                           
       
                            Customer::where('id',$id)->delete();

						    return response()->json(array('success' => 1, 'msg' => 'Successfully Deleted!'));
						            
						            break;

                    
                    case 'user' :
					                           
									

					           	$user = User::where('id',$id)->first();

                                $user->delete();  

									return response()->json(array('success' => 1, 'msg' => 'Successfully Deleted!'));
						            
						            break;    

                    
                      case 'support' :
					                           
										//code here

 					                  SupportComment::where('support_id',$id)->delete();
                                      Support::where('id',$id)->delete();

									return response()->json(array('success' => 1, 'msg' => 'Successfully Deleted!'));
						            
						            break;   

                    

				     case 'banner' :
					                           
										//code here

 					           
                                     Banner::where('id',$id)->delete();
                                     
									return response()->json(array('success' => 1, 'msg' => 'Successfully Deleted!'));
						            
						            break;	



						            	            
				     case 'order-status' :
					                           
										//code here

 					           
                                     OrderStatus::where('id',$id)->delete();
                                     
									return response()->json(array('success' => 1, 'msg' => 'Successfully Deleted!'));
						            
						            break;	

                     
					
					default :


						break;


						
				}
	
	
	
	}
	
	
}

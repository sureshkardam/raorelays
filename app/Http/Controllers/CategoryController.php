<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;
use App\CategoryPath;
use DB;
use Validator;
use Auth;
use App\ProductToCategory;
use App\Activity;


class CategoryController extends Controller
{

    public function showCategory(){
        $data['categories']=Category::getMainCategory();

         return view('admin.category.list',$data);    
    }

public function showSubCategory(){
        $data['categories']=Category::getChildCategory();

         return view('admin.category.list-sub',$data);    
    }
	
	
public function subCategory(Request $request,$id){
		
		
		
		$data['categories'] = Category::where('parent_id',$id)->where('status','=',1)->get();
		
		

         return view('admin.category.list-sub',$data);    
    }


    public function CreateCategory(Request $request){

            
            
            $data['categories']=Category::getCategory();
            
            
             if ($request->isMethod('post')) { 


               

               $errors      = false;
               $errorMsg    = array();
         
         
         $name = $request->input('name');
         $description = $request->input('description');
         $sort_order = $request->input('sort_order');
         $status = $request->input('status');
		 $parent_id = $request->input('parent_id');
		 $code = $request->input('code');
        
         
         
             $applicantMainInfo = array(
                'Name' => $name,
                'Description' => $description,
				 'Code' => $code,
                'Status' => $status,

            );





                $appInfoValidate =  Validator::make($applicantMainInfo, array(
                'Name' =>  'unique:category|required|string|min:1|max:250',
                'Description' => 'required',
				'Code' => 'required',
               
                   ));


      if ($appInfoValidate->fails()) {
                $errors = true;
            }
           
           
            if ($errors) {


              
                $appInfoErrorMsg='';
                 if ($appInfoValidate->messages())
                    $appInfoErrorMsg = $appInfoValidate->messages();
                    session()->flash('error', 'Please check the form values!');
return redirect()->back()->withInput($request->input())->with('CategoryCreateErrors', $appInfoErrorMsg);

            }
           
            else {


                   $categories= Category::create(array('name'=>$name,
                         'created_by'=>Auth::user()->id,
                         'parent_id'=>($parent_id ? $parent_id : '0'),
						 'code'=>$code,
						 'description'=>$description,
                         'sort_order'=>$sort_order,
                         'status'=>$status
                               
                          ));







                      


                    if($categories->id){
                            $level = 0;
                            $category_paths=CategoryPath::where('category_id',$request->parent_id)->orderBy('level', 'ASC')->get();
                            foreach ($category_paths as $key => $category) {
                                $insert_cat_path=[
                                    'category_id'=>$categories->id,
                                    'path_id'=>$category->path_id,
                                    'category_name'=>$category->category_name,
                                    'level'=>$level,
                                ];

                                $cat_path1=CategoryPath::create($insert_cat_path);
                                $level++;
                            }

                            $insert_cat_path1=[
                                    'category_id'=>$categories->id,
                                    'path_id'=>$categories->id,
                                    'category_name'=>$categories['name'],
                                    'level'=>$level,
                                ];

                                $cat_path2=CategoryPath::create($insert_cat_path1);
                    }

                  }
               
              return redirect()->route('admin.category.list')->with('success', 'Product Created!');

              }else{

                
                return view('admin.category.create',$data);         
              }

        
    }
	public function createSubCategory(Request $request){

            
            
            $data['categories']=Category::getMainCategory();
            
            
             if ($request->isMethod('post')) { 


               

               $errors      = false;
               $errorMsg    = array();
         
         
         $name = $request->input('name');
         $description = $request->input('description');
         $sort_order = $request->input('sort_order');
         $status = $request->input('status');
		 $parent_id = $request->input('parent_id');
		 $code = $request->input('code');
        
         
         
             $applicantMainInfo = array(
                'Name' => $name,
                'Description' => $description,
				 'Code' => $code,
                'Status' => $status,

            );





                $appInfoValidate =  Validator::make($applicantMainInfo, array(
                'Name' =>  'unique:category|required|string|min:1|max:250',
                'Description' => 'required',
				'Code' => 'required',
               
                   ));


      if ($appInfoValidate->fails()) {
                $errors = true;
            }
           
           
            if ($errors) {


              
                $appInfoErrorMsg='';
                 if ($appInfoValidate->messages())
                    $appInfoErrorMsg = $appInfoValidate->messages();
                    session()->flash('error', 'Please check the form values!');
return redirect()->back()->withInput($request->input())->with('CategoryCreateErrors', $appInfoErrorMsg);

            }
           
            else {


                   $categories= Category::create(array('name'=>$name,
                         'created_by'=>Auth::user()->id,
                         'parent_id'=>($parent_id ? $parent_id : '0'),
						 'code'=>$code,
						 'description'=>$description,
                         'sort_order'=>$sort_order,
                         'status'=>$status
                               
                          ));







                      


                    if($categories->id){
                            $level = 0;
                            $category_paths=CategoryPath::where('category_id',$request->parent_id)->orderBy('level', 'ASC')->get();
                            foreach ($category_paths as $key => $category) {
                                $insert_cat_path=[
                                    'category_id'=>$categories->id,
                                    'path_id'=>$category->path_id,
                                    'category_name'=>$category->category_name,
                                    'level'=>$level,
                                ];

                                $cat_path1=CategoryPath::create($insert_cat_path);
                                $level++;
                            }

                            $insert_cat_path1=[
                                    'category_id'=>$categories->id,
                                    'path_id'=>$categories->id,
                                    'category_name'=>$categories['name'],
                                    'level'=>$level,
                                ];

                                $cat_path2=CategoryPath::create($insert_cat_path1);
                    }

                  }
               
              return redirect()->route('admin.category.list')->with('success', 'Product Created!');

              }else{

                
                return view('admin.category.create-sub',$data);         
              }

        
    }

   public function editCategory(Request $request,$id){
        $data['categories']=Category::getCategory();
        $data['category_data']=Category::find($id);
		
		
		/*echo '<pre>';
		print_r($data['category_data']->image);
		exit;*/



        if ($request->isMethod('post')) { 

          
			         $errors      = false;
               $errorMsg    = array();
			   
			   
			   $name = $request->input('name');
			   $description = $request->input('description');
			   $sort_order = $request->input('sort_order');
			   $status = $request->input('status');
			   $parent_id = $request->input('parent_id');
			   $code = $request->input('code');
			   $applicantMainInfo = array(
                'Name' => $name,
                'Description' => $description,
				'Code' => $code,
                 );
			
			
			
			$appInfoValidate =  Validator::make($applicantMainInfo, array(

                'Name' =>    'required|string|min:1|max:250',
                'Description' => 'required',
				'Code' => 'required',
                
            )); 
			
			
			
			
			if ($appInfoValidate->fails()) {
                $errors = true;
            }
           
           
            if ($errors) {


              
                $appInfoErrorMsg='';
if ($appInfoValidate->messages())
                    $appInfoErrorMsg = $appInfoValidate->messages();
                    session()->flash('error', 'Please check the form values!');
return redirect()->back()->withInput($request->input())->with('CategoryeditErrors', $appInfoErrorMsg);

            }
           
            else {
			               
			 

				$data['category_data']->name = $name;
				$data['category_data']->parent_id =($parent_id ? $parent_id : '0');
				$data['category_data']->code =$code;
				$data['category_data']->description = $description;
				$data['category_data']->sort_order = $sort_order;
               	$data['category_data']->status = $status;


        
				
				$data['category_data']->save();
				
				// added for edit category name
				$checkPath=CategoryPath::where('path_id',$id)->first();
				
				$change="Update category_path SET category_name = '" .$name . "' where level='" .$checkPath->level . "' and path_id = '" .$id . "' ";
				
				$ddd=DB::select( DB::raw($change));
				// end of code
		

                $category_paths=CategoryPath::where('path_id',$id)->orderBy('level', 'ASC')->get();
				
                 if(count($category_paths)>0){
                    foreach ($category_paths as $category_path) {
                        CategoryPath::where('category_id',$id)->where('level','<',$category_path->level)->delete();
                        $path = array();
                        $cat_paths=CategoryPath::where('category_id',$data['category_data']['parent_id'])->orderBy('level', 'ASC')->get();
                        
						
						foreach ($cat_paths as $key => $cat_path) {
                            $path[]=[
                                'path_id'=>$cat_path->path_id,
                               'category_name'=>$cat_path->category_name,
							   							   
                            ];
                        }

                        $cat_paths1=CategoryPath::where('category_id',$category_path['category_id'])->orderBy('level', 'ASC')->get();
                       

						

					   foreach ($cat_paths1 as $key => $cat_path1) {
                            
							$path[]=[
                              'path_id'=>$cat_path1->path_id,
                              'category_name'=>$cat_path1->category_name,
							  
							 
                            ];
                        }

                        $level = 0;
                        foreach ($path as $paths) {
                            
                            $sql="REPLACE INTO category_path SET category_id = '" . (int)$category_path['category_id'] . "', path_id = '" . (int)$paths['path_id'] . "', category_name='".$paths['category_name']."',level = '" . (int)$level . "', created_at=NOW(),updated_at=NOW() ";
                          
							$categorydb=DB::select( DB::raw($sql));
                            $level++;
                        }
						
							
                    }
					
					

                }else{
					
					
					
                     CategoryPath::where('category_id',$id)->delete();
                     $level = 0;
                     $cat_paths=CategoryPath::where('category_id',$data['category_data']['parent_id'])->orderBy('level', 'ASC')->get();
                    foreach ($cat_paths as $key => $cat_path) {
                        $insert_cat_path1=[
                                    'category_id'=>$id,
                                    'path_id'=>$cat_path['path_id'],
                                    'category_name'=>$cat_path['category_name'],
                                    'level'=>$level,
                                ];

                                $cat_path2=CategoryPath::create($insert_cat_path1);

                                $level++;
                    }
                    $sql="REPLACE INTO category_path SET category_id = '" . (int)$id . "', path_id = '" . (int)$id . "', category_name='".$data['category_data']['name']."', level = '" . (int)$level . "', created_at=NOW(), updated_at=NOW()";
                            $categorydb=DB::select( DB::raw($sql));
                            $level++;

                }



                return redirect()->route('admin.category.list')->with('success', 'Successfully Updated!');
			}

        }else{
            return view('admin.category.edit',$data); 
        }


    }

      public  function deleteCategory($id){

         
		   $productExist=ProductToCategory::where('category_id','=',$id)->get();
		   if($productExist)
		   {
			   return redirect()->back()->with('error', 'Sorry!, Product are associated with this category!');
		   }
		   
		   Category::where('id',$id)->delete();
           CategoryPath::where('category_id',$id)->delete();
           return redirect()->back()->with('success', 'Successfully Deleted!');
		  
		  

            }    


public function getSubCategory(Request $request)

	{
	$cat_id = $request->cat_id;
	$sub_cat = Category::where('parent_id', '=',$cat_id)->get();
	echo json_encode($sub_cat);
	}

 
}

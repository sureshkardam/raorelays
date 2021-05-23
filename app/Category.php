<?php
namespace App;
use Searchable;

use Illuminate\Database\Eloquent\Model;
use DB;
use App\Product;
use App\MaterialProduct;
use App\ProductToCategory;

class Category extends Model
{

	protected $fillable = array('name',
		                                                    'parent_id',
															'code',
															'description',
															'sort_order',
															 'status',
															 'created_at',
															 'updated_at'

														);

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'category';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array();

	public static function getCategory(){
	
		$sql = "SELECT cp.category_id AS category_id, GROUP_CONCAT(cp.category_name ORDER BY cp.level SEPARATOR ' > ') AS name FROM category_path cp LEFT JOIN category c1 ON (cp.category_id = c1.id) LEFT JOIN category c2 ON (cp.path_id = c2.id) GROUP BY cp.category_id";
	
		
		$category=DB::select( DB::raw($sql) );
		

		if($category){
			return $category;
		}else{

			return $category=[];
		}
		
	}

	public static function getCategoryStatus($id){
		$data=self::where('id',$id)->first();
		if(!empty($data)){
			return $data->status;
		}

	}
	
	public static function getName($id)
	{
	
	$category=Self::find($id);
	if($category)
	{
		return $category->name;
	}else
		
		{
		
		return false;
		}
	
	}
	public static function getSortOrder($id)
	{
	
	$category=Self::find($id);
	if($category)
	{
		return $category->sort_order;
	}else
		
		{
		
		return false;
		}
	
	}


public static function getCreated($id)
	{
	
	$category=Self::find($id);
	if($category)
	{
		return $category->created_at;
	}else
		
		{
		
		return false;
		}
	
	}


	public static function getRow($id)
	{
	
	$category=Self::find($id);
	if($category)
	{
		return $category;
	}else
		
		{
		
		return false;
		}
	
	}

	public static function getProfile($id)
	{
	
	$category=Product_to_Category::find($id);
	if($category)
	{
		return $category->name;
	}else
		
		{
		
		return false;
		}
	
	}
	
	
	public static function getRootCategory()
	{
	
	$category=Self::where('parent_id','=',0)->get();
	if($category)
	{
		return json_encode($category);
	}else
		
		{
		
		return false;
		}
	
	}
	
	public static function getMainCategory()
	{
	
	$category=Self::where('parent_id','=',0)->get();
	if($category)
	{
		return $category;
	}else
		
		{
		
		return false;
		}
	
	}
	
	public static function getChildCategory()
	{
	
	$category=Self::where('parent_id','<>',0)->get();
	if($category)
	{
		return $category;
	}else
		
		{
		
		return false;
		}
	
	}
	
	
	
	public function parent() {
		return $this->belongsTo(self::class, 'parent_id');
	}

	public function children() {
		return $this->hasMany(self::class, 'parent_id','id');
	}
	
	public static function getProducts($cat_id)
    {
       
	   
	   //$data=[];
		//$products =$this->hasMany('\App\ProductToCategory','category_id','id');
		$products =ProductToCategory::where('category_id','=',$cat_id)->get();
		$result=[];
		if($products)
		{
					foreach($products as $product)
					{
						
						$result[]=Product::where('id','=',$product->product_id)->first();
						
						//$data['product'] =$result; 
						
						
					}
					
					return $result;
		 }else
		{
					return false;

		}
		
		
		
    }
	
	public static function getMaterialProducts($cat_id)
    {
       
	   
	   //$data=[];
		//$products =$this->hasMany('\App\ProductToCategory','category_id','id');
		$products =ProductToCategory::where('category_id','=',$cat_id)->get();
		$result=[];
		if($products)
		{
					foreach($products as $product)
					{
						
						$result[]=MaterialProduct::where('id','=',$product->product_id)->first();
						
						//$data['product'] =$result; 
						
						
					}
					
					return $result;
		 }else
		{
					return false;

		}
		
		
		
    }
	
	
	
	
	
}

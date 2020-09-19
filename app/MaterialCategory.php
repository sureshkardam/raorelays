<?php
namespace App;
use Searchable;

use Illuminate\Database\Eloquent\Model;
use DB;
use App\MaterialProduct;
use App\MaterialProductToCategory;

class MaterialCategory extends Model
{

	protected $fillable = array('name',
		                                                    'parent_id',
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
	protected $table = 'material_category';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array();

	public static function getCategory(){
	
		$sql = "SELECT cp.category_id AS category_id, GROUP_CONCAT(cp.category_name ORDER BY cp.level SEPARATOR ' > ') AS name FROM material_category_path cp LEFT JOIN material_category c1 ON (cp.category_id = c1.id) LEFT JOIN material_category c2 ON (cp.path_id = c2.id) GROUP BY cp.category_id";
	
		
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




	public static function getProfile($id)
	{
	
	$category=MaterialProductToCategory::find($id);
	if($category)
	{
		return $category->name;
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
		$products =MaterialProductToCategory::where('category_id','=',$cat_id)->get();
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

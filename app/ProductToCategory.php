<?php
namespace App;
use Searchable;
use App\Product;
use App\Category;

use Illuminate\Database\Eloquent\Model;

class ProductToCategory extends Model
{

	protected $fillable = array('product_id',
															'category_id'
														);

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'product_to_category';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array();
	
	public static function getProductCategoryByID($product_id)
    {
	
		$category=Self::where('product_id','=',$product_id)->first();
		if($category)
		{
		return Category::getName($category->category_id);
		}else
			
			{
				return false;
			}
		
	}
	
	
	
}

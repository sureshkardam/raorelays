<?php
namespace App;
use Searchable;

use Illuminate\Database\Eloquent\Model;

class MaterialProductOptionValue extends Model
{

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'material_product_option_value';
	protected $guarded = [];
	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array();
	
	
	
	public static function getValues($product_id,$option_id)
	{
		$values=Self::where('product_id','=',$product_id)
					->where('option_id','=',$option_id)
					->get();
		
		
		
		
		if($values)
		{
			return $values;
		}else
			
			{
				return false;
			}
		
		
	}
}

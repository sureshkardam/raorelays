<?php
namespace App;
use Searchable;

use Illuminate\Database\Eloquent\Model;

class MaterialOptionValue extends Model
{

	protected $fillable = array('id','option_id',
															'name',
															// 'image',
															'sort_order',
															 'created_at',
															'updated_at'														
														);

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'material_option_value';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array();
	
	
	public static function getName($id)
	{
		$option=Self::find($id);
		if($option)
		{
			return $option->name;
		}else
			
			{
				return false;
			}
		
		
	}


}

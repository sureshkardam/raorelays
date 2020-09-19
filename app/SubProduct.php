<?php
namespace App;
use Searchable;

use Illuminate\Database\Eloquent\Model;

class SubProduct extends Model
{

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'sub_product';
	protected $guarded = [];
	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array();
	
	
	
	
	
	public static function getCode($id)
		{
		
						$state=Self::find($id);
						if($state)
						{
							return $state->code;
						}else
							
							{
							
							return false;
							}
		
		}
}

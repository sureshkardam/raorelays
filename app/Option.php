<?php
namespace App;
use Searchable;

use Illuminate\Database\Eloquent\Model;

class Option extends Model
{

	protected $fillable = array('id','name',
															'type',
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
	protected $table = 'option';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array();


	public function getValues()
	{
		return $this->hasMany('App\OptionValue','option_id');
		
	}
	
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
	
	public static function getType($id)
	{
		$option=Self::find($id);
		if($option)
		{
			return $option->type;
		}else
			
			{
				return false;
			}
		
		
	}
	
	
	    public function scopeBetweenDates($query,$from,$to)
		{
			if (( ! is_null($from)) && ( ! is_null($to))) {
				return $query->whereBetween('created_at',[\Carbon\Carbon::parse($from),\Carbon\Carbon::parse($to)]);
			}
		}



}

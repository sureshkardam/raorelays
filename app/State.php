<?php
namespace App;
use Searchable;

use Illuminate\Database\Eloquent\Model;

class State extends Model
{

	protected $fillable = array('name',
															'country_id',
															'status',
															'updated_at', 
															 'created_at'
														);

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'states';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array();

	public static function getName($id)
		{
		
						$state=Self::find($id);
						if($state)
						{
							return $state->name;
						}else
							
							{
							
							return false;
							}
		
		}

		public static function getCode($name)
		{
		
						$state=Self::where('name',$name)->orWhere('id',$name)->first();
						if($state)
						{
							return $state->code;
						}else
							
							{
							
							return false;
							}
		
		}
		
		
		public static function getCodeByID($id)
		{
		
						$state=Self::where('id',$id)->first();
						if($state)
						{
							return $state->code;
						}else
							
							{
							
							return false;
							}
		
		}
		
		public static function getTaxRate($id)
		{
		
						$state=Self::find($id);
						if($state)
						{
							return $state->tax;
						}else
							
							{
							
							return false;
							}
		
		}
		
		
		// public function scopeSearch($query,$key)
		// {
		// 	if ( ! is_null($key)) {
		// 		return $query->where('name', 'like', '%'.$key.'%');
		// 	}
		// }
		
		// public function scopeStatus($query)
  //   {
        
  //           return $query->where('status', '=', 1);
        
  //   }
		
}

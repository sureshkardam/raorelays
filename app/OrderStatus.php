<?php
namespace App;
use Searchable;

use Illuminate\Database\Eloquent\Model;

class OrderStatus extends Model
{

	protected $fillable = array('name',
		                                                   'status',
															'created_at',
															 'updated_at'
														);

	
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'order_status';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	 
	 public static function getName($id)
		{
		
						$status=Self::find($id);
						if($status)
						{
							return $status->name;
						}else
							
							{
							
							return false;
							}
		
		}
	
}

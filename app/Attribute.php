<?php
namespace App;
use Searchable;

use Illuminate\Database\Eloquent\Model;

class Attribute extends Model
{

	protected $fillable = array('name',
															'sort_order',
															'status',
															'updated_at', 
															 'created_at'
														);

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'attribute';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array();


}

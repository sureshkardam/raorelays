<?php
namespace App;
use Searchable;

use Illuminate\Database\Eloquent\Model;

class MaterialProductOption extends Model
{

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'material_product_option';
	protected $guarded = [];
	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array();
}

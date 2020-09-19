<?php
namespace App;
use Searchable;

use Illuminate\Database\Eloquent\Model;

class MaterialProductToCategory extends Model
{

	protected $fillable = array('product_id',
															'category_id'
														);

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'material_product_to_category';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array();
}

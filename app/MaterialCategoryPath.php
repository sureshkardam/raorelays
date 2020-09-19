<?php
namespace App;
use Searchable;

use Illuminate\Database\Eloquent\Model;

class MaterialCategoryPath extends Model
{

	protected $fillable = array('category_id',
															'path_id',
															'category_name',
															'level',
															'created_at',
															'updated_at'

														);

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'material_category_path';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array();
}

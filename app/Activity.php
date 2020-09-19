<?php
namespace App;
use Searchable;

use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{

	protected $table = 'activity_history';
	protected $guarded = [];
	protected $hidden = array();



}

<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Auth;

class Userpersonal extends Model
{
	protected $fillable = array('user_id',
															'first_name', 
															 'last_name',  
															 'employee_id', 
															 'telephone', 
                                                           	 'updated_at', 
															 'created_at'
														);

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users_overview';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array();
    
    
}

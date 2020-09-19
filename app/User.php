<?php
	
namespace App;
use Searchable;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Auth;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    
	
	
	protected $fillable = array('name',
															'email',
															'password',
															'newsletter',
															'valid',
															'status',
															'user_type',
															'activate_code',
															'remember_token',
															'api_token',
															'reset_profile',
															'updated_at',
															'created_at'
														);
	
	
	
	
	
    protected $hidden = [
        'password', 'remember_token',
    ];
	
	protected $table = 'users';
	
	
	
	public static  function getName($id){


				$username = Self::find($id);
				if ($username) {
					return $username->name;
				}else{
					return false;
				}

		}

	
	
	public function apPersonal() {
		return $this->hasOne('App\Userpersonal', 'user_id');
	}
	
}

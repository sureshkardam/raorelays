<?php
namespace App;
use Searchable;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{

	protected $table = 'customer';
	protected $guarded = [];
	protected $hidden = array();


	
	
	
	public static  function getCustomer($id){


				$username = Self::find($id);
				if ($username) {
					return $username;
				}else{
					return false;
				}

		}
	
	
	public static  function getName($id){


				$username = Self::find($id);
				if ($username) {
					return $username->contact_name;
				}else{
					return false;
				}

		}
		
		
		
		
		public static  function getEmail($id){


				$username = Self::find($id);
				if ($username) {
					return $username->email;
				}else{
					return false;
				}

		}
		
		
		public static  function getContact($id){


				$username = Self::find($id);
				if ($username) {
					return $username->telephone;
				}else{
					return false;
				}

		}
	
	
	
}

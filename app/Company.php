<?php
namespace App;
use Searchable;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{

	protected $table = 'company';
	protected $guarded = [];
	protected $hidden = array();


	
	
	public static  function getName($id){


				$company = Self::find($id);
				if ($company) {
					return $company->company_name;
				}else{
					return false;
				}

		}
	
	
	
}

<?php
namespace App;
use Searchable;

use Illuminate\Database\Eloquent\Model;

class Plant extends Model
{

	protected $table = 'plant';
	protected $guarded = [];
	protected $hidden = array();


	
	
	public static  function getName($id){


				$plant = Self::find($id);
				if ($plant) {
					return $plant->plant_name;
				}else{
					return false;
				}

		}
		
		
		public static  function getAddress($id){


				$plant = Self::find($id);
				if ($plant) {
					return $plant->registered_address;
				}else{
					return false;
				}

		}
		
		
		public static  function getContact($id){


				$plant = Self::find($id);
				if ($plant) {
					return $plant->telephone;
				}else{
					return false;
				}

		}
		
		public static  function getPlantId($id){


				$plant = Self::find($id);
				if ($plant) {
					return $plant->plant_id;
				}else{
					return false;
				}

		}
	
	
	
}

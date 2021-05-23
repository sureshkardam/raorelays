<?php
namespace App;
use Searchable;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{

	protected $table = 'supplier';
	protected $guarded = [];
	protected $hidden = array();


	
	
	public static  function getName($id){


				$supplier = Self::find($id);
				if ($supplier) {
					return $supplier->supplier_name;
				}else{
					return false;
				}

		}
		
		
		public static  function getAddress($id){


				$supplier = Self::find($id);
				if ($supplier) {
					return $supplier->registered_address;
				}else{
					return false;
				}

		}
		
		
		public static  function getContact($id){


				$supplier = Self::find($id);
				if ($supplier) {
					return $supplier->telephone;
				}else{
					return false;
				}

		}
		
		
		
	public function getPurchaseOrder(){

        return $this->HasMany('App\PurchaseOrder', 'supplier_id');

		}
		
		
	
	
	
}

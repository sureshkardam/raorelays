<?php
namespace App;
use Searchable;

use Illuminate\Database\Eloquent\Model;

class PurchaseOrderProductRecieve extends Model
{

	protected $table = 'purchase_order_product_recieve';
	protected $guarded = [];
	protected $hidden = array();


   
  public static function exists($id){


				$record = Self::where('purchase_order_id','=',$id)->first();
				if ($record) {
					return true;
				}else{
					return false;
				}

		}

public static function getQty($id,$product_id){


				$record = Self::where('purchase_order_id','=',$id)->where('product_id','=',$product_id)->sum('qty');
				if ($record) {
					return $record;
				}else{
					return false;
				}

		} 		
    
     
   
}

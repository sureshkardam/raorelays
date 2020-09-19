<?php
namespace App;
use Searchable;

use Illuminate\Database\Eloquent\Model;

class OrderHistory extends Model
{

	protected $table = 'order_history';
	protected $guarded = [];
	protected $hidden = array();


	public static function getOrderStatus($orderId,$productId,$orderType,$orderStatus=NULL){
				$row=Self::where('order_id','=', $orderId)
					->where('product_id','=', $productId)
					->where('order_type','=', $orderType)
					//->where('order_status_id','=', $orderStatus)
					->latest('id')->first();
				
			if($row->order_status_id==4){
				return true;
			}else{
				return false;
			}

		/*if (count($row)==0) {
			return false;
		}else{
			return true;
		}*/

	}
	
}

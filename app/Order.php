<?php
namespace App;
use Searchable;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{

	protected $table = 'orders';
	protected $guarded = [];
	protected $hidden = array();


	   



	        public function scopeBetweenDates($query,$from,$to)
		{
			if (( ! is_null($from)) && ( ! is_null($to))) {
				return $query->whereBetween('created_at',[\Carbon\Carbon::parse($from),\Carbon\Carbon::parse($to)]);
			}
		}


		public function scopeOrderID($query,$key)
		{
			if ( ! is_null($key)) {
				//return $query->where('status', 'like', '%'.$key.'%');
				return $query->where('id', '=',$key);
			}
		}

		

		public function scopeCreatedDate($query,$key)
		{
			if ( ! is_null($key)) {
				//return $query->where('status', 'like', '%'.$key.'%');
				return $query->where('created_at', '=',\Carbon\Carbon::parse($key));
			}
		}


	public function scopeCoupon($query,$key)
			{
				if ( ! is_null($key)) {
					//return $query->where('status', 'like', '%'.$key.'%');
					return $query->where('coupon_code', '=',$key);
				}
			}


		public function scopeOrderStatus($query,$key)
		{
			if ( ! is_null($key)) {
				//return $query->where('status', 'like', '%'.$key.'%');
				return $query->where('order_status_id', '=',$key);
			}
		}

	public function getHistory() {

        return $this->HasMany('App\OrderHistory', 'order_id');

    }
	
	public static function getHistoryByProduct($order_id,$product_id) {

         $history=OrderHistory::where('order_id','=',$order_id)
					->where('product_id','=',$product_id)
					->get();
					
		if ($history) {
				return $history;
				}else{
				return false;
				}

    }
	
	
    
    public function getProducts() {

        return $this->HasMany('App\OrderProduct', 'order_id');

    }
     
   
    
     
    public function getOptions() {

        return $this->HasMany('App\OrderOption', 'order_id');

    }
	
	public function getRequest() {

        return $this->HasMany('App\OrderRequest', 'order_id');

    }

}

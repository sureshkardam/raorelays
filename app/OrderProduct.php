<?php
namespace App;
use Searchable;
use App\OrderOption;

use Illuminate\Database\Eloquent\Model;

class OrderProduct extends Model
{

	protected $table = 'order_product';
	protected $guarded = [];
	protected $hidden = array();
	
	
	
	 public static function getOptions($order_id,$product_id) {

        $options=OrderOption::where('order_id','=',$order_id)
					->where('product_id','=',$product_id)
					->get();
					
		if ($options) {
				return $options;
				}else{
				return false;
				}

    }
	
	public static function getRow($order_id,$product_id) {

        $record=Self::where('order_id','=',$order_id)
					->where('product_id','=',$product_id)
					->first();
					
		if ($record) {
				return $record;
				}else{
				return false;
				}

    }

      public function getParent() {

        return $this->belongsTo('App\Order', 'order_id');

    }

    public static function getOrderTypeName($id){
    	if($id==0){
    		return 'Rental';

    		
    	}elseif($id==1){
    			return   'Sale';

    		}else{

    			return false;
    		}


    }
    
	
}

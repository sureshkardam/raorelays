<?php
namespace App;
use Searchable;

use Illuminate\Database\Eloquent\Model;

class PurchaseOrder extends Model
{

	protected $table = 'purchase_order';
	protected $guarded = [];
	protected $hidden = array();


    public function getProducts() {

        return $this->HasMany('App\PurchaseOrderProduct', 'purchase_order_id');

    }
     
   
    
     
   
}

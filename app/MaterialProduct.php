<?php
namespace App;
use Searchable;

use Illuminate\Database\Eloquent\Model;
use App\MaterialProductToCategory;


class MaterialProduct extends Model
{
	
	protected $guarded = [];
	
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'material_product';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array();

	public static function getName($id)
	{
	
	$attr=Self::find($id);
	if($attr)
	{
		return $attr->name;
	}else
		
		{
		
		return false;
	 	}
	
	 }

	

	public function getOptions()
	{
		
		return $this->hasMany('\App\MaterialProductOption','product_id');
		
		
	}
	
	
	public static function getOptionDetailsByProduct($id)
	{
		
		//return $this->hasMany('\App\ProductOption','product_id');
		
		
	}
	
	
	public function getOptionValues()
	{
		
		return $this->hasMany('\App\MaterialProductOptionValue','product_id');
		
	}

	public static function getDetail($id)
    {
    
    $product=Self::where('id','=',$id)->first();
    if($product)
    {
        return $product;
    }else
        
        {
        
        return false;
        }
    
     }
	
	
	public function getCategories()
	{
		
		return $this->hasMany('\App\MaterialProductToCategory','product_id');
		
	}

	
	
	    public function scopeBetweenDates($query,$from,$to)
		{
			if (( ! is_null($from)) && ( ! is_null($to))) {
				return $query->whereBetween('created_at',[\Carbon\Carbon::parse($from),\Carbon\Carbon::parse($to)]);
			}
		}

	
	
}

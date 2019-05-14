<?php

namespace App;
use App\Product;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $table = "cart";
    protected $fillable = ['uniqueid', 'title', 'product_id', 'quantity','size', 'cost'];
    public $timestamps = false;

    public function products()
    {
    	 return $this->belongsTo('App\Product','product_id');
    }
}

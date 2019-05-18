<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Address extends Model
{
	use SoftDeletes;

	/**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'address';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
    	'user_id',
    	'full_name', 
    	'mobile',
    	'phone_number',
    	'postalcode',
    	'city',
    	'state',
    	'house_number',
    	'area',
    	'landmark'
    ];
}

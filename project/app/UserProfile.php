<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class UserProfile extends Authenticatable
{
    use Notifiable;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    public $table = "user_profiles";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 
        'gender', 
        'email', 
        'phone', 
        'password',
        'fax', 
        'address', 
        'city', 
        'zip', 
        'status', 
        'created_at', 
        'updated_at'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
    ];

    /**
     * Get the orders for user.
     */
    public function orders()
    {
        return $this->hasMany('App\Order', 'customerid');
    }

    /**
     * Get the wishlist for user.
     *
     * May have many in wishlist
     */
    public function wishlist()
    {
        return $this->hasMany('App\Wishlist', 'user_id');
    }

    /**
     * Get the addresses for user.
     *
     * May have many in addresses
     */
    public function getAddress()
    {
        return $this->hasMany('App\Address', 'user_id');
    }

    /**
     * Atrribute to return Full Address of User
     * 
     * return string|null
     */
    public function getFullAddressAttribute()
    {   
        # Get the Name of User
        $name = $this->name ? $this->name.', ' : '';

        # Get the address of User
        $address = $this->address ? $this->address.', ' : '';

         # Get the city of User
        $city = $this->city ? $this->city.', ' : '';

         # Get the zip of User
        $zip = $this->zip ? $this->zip.', ' : '';

        return $name.$address.$city.$zip;
    }

    /**
     *
     * Get All the Addresses of Authenticated User
     *
     */
    public function getAllAddressesAttribute()
    {
        return $this->getAddress;
    }
    
}

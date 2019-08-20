<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;
    protected $table = "users_tukang";
    protected $primaryKey = "tukang_id";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'is_active', 'is_complete', 'last_name', 'dob', 'address', 'province', 'city', 'district', 'price_per_hour', 'price_per_day' 
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    public function getProvince()
    {
        $prov = Provinsi::get();
        return $prov;
    }

    // public function getCity()
    // {
    //     $ch = curl_init(); 

    //     // set url 
    //     curl_setopt($ch, CURLOPT_URL, "http://dev.farizdotid.com/api/daerahindonesia/provinsi"); 

    //     //return the transfer as a string 
    //     curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 

    //     $output = curl_exec($ch); 
    //     $output = json_decode($output);
        
    //     // close curl resource to free up system resources 
    //     curl_close($ch); 
    //     return $output->semuaprovinsi;
    // }

    // public function getDistrict()
    // {
    //     $ch = curl_init(); 

    //     // set url 
    //     curl_setopt($ch, CURLOPT_URL, "http://dev.farizdotid.com/api/daerahindonesia/provinsi"); 

    //     //return the transfer as a string 
    //     curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 

    //     $output = curl_exec($ch); 
    //     $output = json_decode($output);
        
    //     // close curl resource to free up system resources 
    //     curl_close($ch); 
    //     return $output->semuaprovinsi;
    // }

}

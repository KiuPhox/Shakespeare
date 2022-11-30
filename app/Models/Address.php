<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'first_name',
        'last_name',
        'company',
        'address',
        'city',
        'country',
        'district',
        'ward',
        'phone_number',
        'user_id'
        ];

    public function getFullName(){
        return $this->first_name." ".$this->last_name;
    }

    public function getFullCity(){
        return $this->ward.", " .$this->district. ", ".$this->city;
    }
}

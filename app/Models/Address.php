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
        'postal_code',
        'city',
        'country',
        'phone_number',
        'user_id'
        ];

    public function getFullName(){
        return $this->first_name." ".$this->last_name;
    }

    public function getFullCity(){
        return $this->postal_code." ".$this->city;
    }
}

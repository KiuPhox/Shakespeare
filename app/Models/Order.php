<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'full_name',
        'company',
        'address',
        'city',
        'country',
        'phone_number',
        'total',
        'user_id',
        'status',
        ];

    public function getOrderDate(){
        return date_format(date_create($this->created_at), "d/m/Y");
    }

    public function getStatus(){
       if ($this->status === 0){
           return 'Pending';
       }
       return 'Confirmed';
    }
}

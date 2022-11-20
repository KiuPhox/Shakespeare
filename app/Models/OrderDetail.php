<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'order_id',
        'product_id',
        'amount',
        ];

    public function getBook(){
        return Book::query()->find($this->product_id);
    }

    public function getSubTotal(){
        $book = Book::query()->find($this->product_id);
        return $book->price * $this->amount;
    }
}

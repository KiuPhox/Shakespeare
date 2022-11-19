<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'author',
        'description',
        'image',
        'price',
        'publisher_id',
        'publication_date',
        'quantity',
        'page_quantity',
        'isbn'
    ];

    public function getPublicationDate(){
        return date_format(date_create($this->publication_date), 'Y-m-d');
    }

    public function publisher()
    {
        return Publisher::find($this->publisher_id)->name;
    }

    public function getSummaryDescription(){
        if ($this->description != null) {
            return substr($this->description, 0, 100).'...';
        }
        return $this->description;
    }
}

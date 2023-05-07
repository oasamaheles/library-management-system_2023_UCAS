<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'author',
        'description',
        'price',
        'image',
        'stock',
        'classification_id',
    ];

    public function classification()
    {
        return $this->belongsTo(Classification::class);
    }

    public function purchases()
    {
        return $this->hasMany(Purchase::class);
    }
}

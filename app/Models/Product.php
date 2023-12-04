<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'name',
        'description',
        'price',
        'quantity',
        'image',
        "category_id"
        // Otras propiedades que puedan ser relevantes para tus productos
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
}


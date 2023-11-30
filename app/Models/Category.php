<?php


// Ejemplo de modelo de Categoría
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['name', 'id']; // Atributos de la categoría

    public function products()
    {
        return $this->hasMany(Product::class); // Relación con productos
    }
}

<?php

namespace App\DAO;

use App\Models\Product;
use Illuminate\Database\Eloquent\Model; // Asegúrate de importar la clase Model


class ProductDAO extends Model
{
    protected $table = 'products';
    public function getAllProducts()
    {
        $products = Product::all();

        // Agregar la URL de la imagen a cada producto
        foreach ($products as $product) {
            $product->image_url = asset('storage/images/' . $product->image); // Asume que 'image' es el nombre del campo en la base de datos
        }
    
        return $products;
    }

    public function getProductById($id)
    {
        return Product::find($id);
    }

    public function createProduct($data)
    {


        return Product::create([
            'name' => $data['name'],
            'description' => $data['description'],
            'price' => $data['price'],
            'quantity' => $data['quantity'],
            'image' => $data['image'],
            'category_id' => (int)$data['category_id'], // Asignar la categoría directamente,
            'category' => (int)$data['category_id'], // Asignar la categoría directamente,
            // Otros campos si los hay
        ]);
    }

    public function updateProduct($id, $data)
    {
        $product = Product::find($id);
        if ($product) {
            $product->update($data);
            return $product;
        }
        return null;
    }

    public function deleteProduct($id)
    {
        $product = Product::find($id);
        if ($product) {
            $product->delete();
            return true;
        }
        return false;
    }
}
